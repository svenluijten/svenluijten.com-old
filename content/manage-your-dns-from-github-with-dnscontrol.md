---
title: Manage your DNS from GitHub with DNSControl
date: 2021-03-05
excerpt: How you can leverage DNSControl and GitHub Actions to make DNS configuration a breeze. 
---

DNS is a pain. Especially with multiple DNS providers and domains scattered all over the place. What if you could edit a JavaScript file with your desired DNS configuration, submit a pull request on GitHub, see a preview of the changes you are about to make, and when you merge it, have those changes be applied completely automatically?

Well, you are in luck. In this post I will walk you through how you can set up [DNSControl](https://stackexchange.github.io/dnscontrol/) in combination with [GitHub Actions](https://github.com/features/actions) to do just that.

## What is DNSControl?
DNSControl is an open source platform to manage your DNS configuration on any of the supported DNS providers such as Cloudflare, DigitalOcean, DNSimple, [and more](https://stackexchange.github.io/dnscontrol/provider-list). It is written in Go, and made by the awesome people over at StackExchange. They use it to manage the DNS all the domains in the Stack Overflow network, it does not get more battle-tested than this! 

A small DNSControl configuration file may look like this:

```js
var REG_NONE = NewRegistrar('none', 'NONE');
var DNS_CLOUDFLARE = NewDnsProvider('cloudflare', 'CLOUDFLAREAPI');

D('svenluijten.com', REG_NONE, DnsProvider(DNS_CLOUDFLARE),
    DefaultTTL('30s'),
    A('@', '127.0.0.1'),
    CNAME('www', '@'),
    GoogleEmail()
);

function GoogleEmail() {
    return [
        MX('@', 1, 'ASPMX.L.GOOGLE.COM.'),
        MX('@', 5, 'ALT1.ASPMX.L.GOOGLE.COM.'),
        MX('@', 5, 'ALT2.ASPMX.L.GOOGLE.COM.'),
        MX('@', 10, 'ALT3.ASPMX.L.GOOGLE.COM.'),
        MX('@', 10, 'ALT4.ASPMX.L.GOOGLE.COM.')
    ];
}
```

For this tutorial, it is helpful to have one provider to host the DNS for all of your domains. I personally spent a few hours pointing all my domains' nameservers to Cloudflare, but you can pick [any of the providers DNSControl supports](https://stackexchange.github.io/dnscontrol/provider-list). For simplicity (and because it is what I use), I will assume Cloudflare as the provider in this post.

## Getting set up
The very first thing you should do is create a new repository on GitHub. This repository can be either public or private, your choice. I have mine set to **private** for extra peace of mind. Add a `README.md`, `creds.json`, and `dnsconfig.js` to the root folder, and 2 files in `.github/workflows/`; `check-and-preview.yml` and `push.yml`. You should end up with a folder structure that looks like this:

```text
├── .github/
│   ├── workflows/
│   │   ├── check-and-preview.yml
│   │   └── push.yml
├── README.md
├── creds.json
└── dnsconfig.js
```

Next, [generate an API token in Cloudflare's control panel](https://dash.cloudflare.com/profile/api-tokens) with the permissions `Zone:Read, Page Rules:Edit, DNS:Edit` that includes **All zones**. Then go to your repository's `Settings -> Secrets -> Actions` screen back on GitHub, and add a repository secret called `CLOUDFLARE_API_TOKEN`. Paste the API key you got previously in the value field, and save.

Edit `creds.json`, and put the secret we just created in there prefixed with `$`:

```json
{
    "cloudflare": {
        "apitoken": "$CLOUDFLARE_API_TOKEN"
    }
}
```

This file will be read by DNSControl to get the API to use when connecting to Cloudflare to read/update your DNS configuration. More information about this can be found in [the DNSControl getting started guide](https://stackexchange.github.io/dnscontrol/getting-started#4-create-the-initial-credsjson).

## Writing the workflows
You could work with DNSControl without setting up GitHub Actions, but I find the idea of pushing code up to GitHub and my DNS updating accordingly absolutely ✨ magical ✨.

### Previewing the changes
We will start with the GitHub Actions workflow that checks the `dnsconfig.js` file for a valid configuration, and gives you a nice preview of your changes in the form of a comment on your pull request. In `.github/workflows/check-and-preview.yml`, put the following:

```yaml
name: Check and Preview DNS changes

on: pull_request

jobs:
  check:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2

      - name: Check DNS configuration
        uses: koenrh/dnscontrol-action@v3
        with:
          args: check

  preview:
    runs-on: ubuntu-latest
    needs: check
    steps:
      - uses: actions/checkout@v2
      - name: Preview DNS changes
        id: preview
        uses: koenrh/dnscontrol-action@v3
        env:
          CLOUDFLARE_API_TOKEN: ${{ secrets.CLOUDFLARE_API_TOKEN }}
        with:
          args: preview
      - name: Comment diff on PR
        uses: unsplash/comment-on-pr@v1.2.0
        env:
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
        with:
          msg: |
            ```
            ${{ steps.preview.outputs.output }}
            ```
          check_for_duplicate_msg: true
```

This workflow will run when you submit a new pull request to change anything in your `dnsconfig.js`, and will comment the changes you are about to make when you merge the pull request.

As you can see, the first job (`check`) does not require the Cloudflare API token because all the `dnscontrol check` command does is make sure your `dnsconfig.js` file does not contain syntax errors.

The next job (`preview`), on the other hand, in a little more involved. We first define that it depends on the previous `check` job, so that we do not make unnecessary API calls to Cloudflare. Then, we invoke DNSControl's `preview` command using [`koenrh/dnscontrol-action`](https://github.com/koenrh/dnscontrol-action), passing in the `CLOUDFLARE_API_TOKEN` we defined earlier in the repository's secrets.

Because we gave this step an `id` of `preview`, we can refer to this in the next step to comment the output of the `dnscontrol preview` command on the pull request using [`unsplash/comment-on-pr`](https://github.com/unsplash/comment-on-pr).

### Pushing the changes to Cloudflare
When you merge the pull request with your DNS changes, you probably want those changes to be pushed up to Cloudflare automatically. So we will work on that next.

Edit the file `.github/workflows/push.yml` and fill it with the following:

```yaml
name: Push DNS changes

on:
  push:
    branches:
      - main

jobs:
  push:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2

      - name: Push DNS changes
        uses: koenrh/dnscontrol-action@v3
        env:
          CLOUDFLARE_API_TOKEN: ${{ secrets.CLOUDFLARE_API_TOKEN }}
        with:
          args: push
```

This is a small workflow with a single job: `push`. It will trigger the moment we push (or merge) anything to the `main` branch, and will use [`koenrh/dnscontrol-action`](https://github.com/koenrh/dnscontrol-action) again, but this time with `args: push` instead of `check` or `preview`. This will push the changes you made up to Cloudflare and update your DNS accordingly.

And that is all there is to it! If you now create a new branch, update `dnsconfig.js`, and submit a pull request, you should see a comment from **github-actions** pop up with a preview of the changes:

```text
******************** Domain: svenluijten.nl
----- Getting nameservers from: cloudflare
----- DNS Provider: cloudflare...3 corrections
#1: DELETE record: svenluijten.com A 1 123.45.67.89 (id=4a2e74dc283c9073a51f5cf95a830e21)
#2: CREATE record: @ CNAME 1 svenluijten.com.
#3: ACTIVATE PROXY for new record @ CNAME 1 svenluijten.com.
----- Registrar: none...0 corrections
******************** Domain: svenluijten.com
----- Getting nameservers from: cloudflare
----- DNS Provider: cloudflare...0 corrections
----- Registrar: none...0 corrections
Done. 3 corrections.
```

When you merge that pull request, GitHub Actions will push those changes up to the DNS provider you set up, and your configuration is now live!

You can also use [my template repository on GitHub](https://github.com/svenluijten/dns-template) as the base of your own single source of truth when it comes to managing your DNS.
