---
title: What is a lock file, and why should you care?
date: 2021-02-26
excerpt: Why should you care about lock files, and what could go wrong if you delete them? This post explains!
---

As a PHP or JavaScript developer, you have probably come across `composer.lock`, `package-lock.json`, and/or `yarn.lock`. These files are often committed to version control, but not a lot of people realize what they do, and why they should be handled with care.

In this post, I will show you how things can go wrong without a lock file, and the way lock files protect you against those problems.

## Without a lock file
Assume you are a PHP or JavaScript developer and you just joined a company. This company has the policy to _never_ commit their lock files to version control, and has added them to `.gitignore`. 

Meanwhile, the "blueprint" file (`composer.json` and `package.json` for PHP and JavaScript respectively) has a list of dependencies needed to run the project, for example:

```json
{
    "require": {
        "super-awesome-dependency": "^1.0"
    }
}
```

Everything works fine, and your deployment script runs `install` every time, happily fetching the latest `1.x.y` version every time.

Now, it just so happens that the author of `super-awesome-dependency` accidentally introduced a terrible application-crashing bug in version `1.3.0`, which is going to take a really long time to fix, because they just left for a vacation in the Bahama's.

Your deploy script will _still_ happily install the latest `1.x` version (which just so happens to be `1.3.0`, the one with the bug), every time you deploy the application until you intervene and edit your "blueprint" file:

```json
{
    "require": {
        "super-awesome-dependency": ">= 1.0 < 1.3"
    }
}
```

## With a lock file
Your "blueprint" file looks the same as it does above, but now, you also commit  your lock file, which will look similar to this:

```json
{
    "hash": "8as7d6f98a7s6dfa09w74",
    "packages": [
        {
            "name": "super-awesome-dependency",
            "source": "https://github.com/ghost/super-awesome-dependency.git",
            "sha": "9bdcaa80da69bd7e1fecfbe81319052e4da50844"
            // ...
        }
    ]
}
```

Now, when your deploy script runs the `install` command, Composer/npm/yarn will read this file first, and fetch the commit that was referenced in the lock file for that package instead of trying to resolve the dependency all over again.

## What if I want to update to a new version?
Updating to a newer, later version should always be something you do _manually_, or at least under supervision. This way you can ensure your application does not break after upgrading some faraway dependency.

### Composer
For [Composer](https://getcomposer.org), you can use `composer update` to update everything at once (I would not recommend this), or `composer update <dependency> --with-all-dependencies`. Read [the documentation](https://getcomposer.org/doc/03-cli.md#update-u) to learn more about how `composer update` works.

### npm / Yarn
For [npm](https://npmjs.com) and [Yarn](https://yarnpkg.com), use `npm update <dependency>` and `yarn up`.  See their documentation ([npm](https://docs.npmjs.com/cli/v7/commands/npm-update), [Yarn](https://yarnpkg.com/cli/up)) for more information.

## Conclusion
So, the next time you join a company that has the policy to never commit the lock file, you know what to tell them. Or, better yet, send them a link to this blog post 😉
