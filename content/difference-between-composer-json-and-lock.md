---
title: The difference between composer.json and composer.lock
date: 2021-03-12
excerpt: To figure out what the difference is between the composer.json and composer.lock files, let us take a deep dive into how Composer resolves dependencies.
---

There is quite a lot of confusion about the `composer.json` and the `composer.lock` files out there. Should they both be committed to version control? Why does removing the `vendor/` directory and the `composer.lock` file, and then running `composer install` again fix 95% of the Composer-related errors? This blog post is meant to answer those questions, give you a better understanding of how Composer works, and teach you a reliable way to get out of "dependency hell".

To start off, it is important to know that `composer.json` is a _blueprint_ for your PHP dependencies. We will mainly be taking a look at the `require` (and at the same time `require-dev`) section(s) of this file. Take this basic file for example:

```js
{
    "require": {
        "monolog/monolog": "2.0.0"
    }
}
```

This tells Composer that this project needs _exactly_ version `2.0.0` of the `monolog/monolog` package to function. Now we will run `composer install`. This downloads version `2.0.0` of the `monolog/monolog` library along with its dependencies, and generates a `composer.lock` file.

However, most of the time you will see people specify a version constraint in `composer.json`, instead of a direct reference to a version or commit hash:

```js
{
    "require": {
        "monolog/monolog": ">= 2.0.0 < 3.0.0"
    }
}
```

This means that we require _at least_ version `2.0.0` of the library, but we will also allow anything under `3.0.0`. With that knowledge, let us take a closer look at that `composer.lock` file that was generated before.

```js
{
    // ...

    "packages": [
        {
            "name": "monolog/monolog",
            "version": "2.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/Seldaek/monolog.git",
                "reference": "68545165e19249013afd1d6f7485aecff07a2d22"
            },
            "dist": {...},
            "require": {
                "php": "^7.2",
                "psr/log": "^1.0.1"
            },
            "provide": {...},
            "require-dev": {...},
            "suggest": {...},
            "type": "library",
            "extra": {...},
            "autoload": {...},
            "notification-url": "https://packagist.org/downloads/",
            "license": ["MIT"],
            "authors": [...],
            "description": "Sends your logs to files, sockets, inboxes, databases and various web services",
            "homepage": "http://github.com/Seldaek/monolog",
            "keywords": [...],
            "time": "2019-08-30T09:56:44+00:00"
        },

        // ...
    ],

    // ...
}
```

A lot of these attributes are the same as what is in [Monolog's `composer.json`](https://github.com/Seldaek/monolog/blob/2.0.0/composer.json),
and you can ignore those. I want to bring special attention to the `source` attribute:

```json
"name": "monolog/monolog",
"version": "2.0.0",
"source": {
    "type": "git",
    "url": "https://github.com/Seldaek/monolog.git",
    "reference": "68545165e19249013afd1d6f7485aecff07a2d22"
},
```

This tells Composer that, whenever we run `composer install` again, to download `monolog/monolog` exactly as it was on commit hash `68545165e19249013afd1d6f7485aecff07a2d22`. With our updated version constraint in `composer.json` file, we will now run `composer install` again:

```
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Warning: The lock file is not up to date with the latest changes in composer.json. You may be getting outdated dependencies. Run update to update them.
Nothing to install or update
Generating autoload files
```

See that **Warning:** in the output? This tells us that the `composer.json` file has been updated, and we are not getting the new version of `monolog/monolog`. This is because the `composer.lock` file is read when executing `composer install` if it exists, and `composer.json` is not used at all (except for checking if `composer.lock` is up-to-date).

To persist the changes we made to `composer.json` in `composer.lock` and download the newer version of the library, we
can run `composer update monolog/monolog`:

```
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 0 installs, 1 update, 0 removals
  - Updating monolog/monolog (2.0.0 => 2.0.2): Loading from cache
Writing lock file
Generating autoload files
```

This time, because we ran `composer update`, Composer did _not_ read `composer.lock`, but instead read `composer.json`, saw our version constraint of `>= 2.0.0 < 3.0.0`, knew there was a newer version available than what we had previously installed, and downloaded the latest version possible. After that, it updated `composer.lock` ("Writing lock file") with the new commit hash:

```js
"name": "monolog/monolog",
"version": "2.0.2",
"source": {
    "type": "git",
    "url": "https://github.com/Seldaek/monolog.git",
    "reference": "c861fcba2ca29404dc9e617eedd9eff4616986b8"
},
```

So now we can run `composer install` all we want, Composer will always download version 2.0.2 of `monolog/monolog` (at commit hash `c861fcba2ca29404dc9e617eedd9eff4616986b8`).
