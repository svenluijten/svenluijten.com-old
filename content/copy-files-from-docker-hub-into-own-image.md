---
title: Copying files from Docker Hub into your own image
date: 2020-01-22
excerpt: | 
    Here's how you can copy files from any image on Docker Hub into your own
    Docker image with just a single line in your Dockerfile.
---

Did you know you can copy files from an image hosted on Docker Hub directly from your very own `Dockerfile`? In this
post, I will use PHP's dependency manager [Composer](https://getcomposer.org) to show you how.

First, let me show you how you would do it *without* the method I am about to show you. Installing Composer
programmatically can be quite arduous, and most people will likely do it this way in their `Dockerfile`:

```dockerfile
FROM php:7

RUN apt-get update && apt-get -y install zip unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === file_get_contents('https://composer.github.io/installer.sig')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

# ...
```

Looks pretty decent, right? Well, what if I told you you could remove *all* those `RUN` statements, and replace them
with a single `COPY` statement? It would end up looking like this:

```dockerfile
FROM php:7

COPY --from=composer:2 /usr/bin/composer /usr/local/bin

# ...
```

Instead of installing the `zip` and `unzip` binaries, downloading the installer from [getcomposer.org](https://getcomposer.org),
checking the file hash, running and removing the installer, and eventually moving the `composer.phar` to the `/usr/local/bin`
directory, this single `COPY` statement copies the *already built* `composer` binary out of
[the official Composer Docker image](https://github.com/composer/docker), and moves it to `/usr/local/bin` in your container.

You can of course do this with any other Docker container available on Docker Hub. To do this, replace `composer:2` from
the snippet above with the name and tag of the image you want to copy out of.

[The official Docker documentation](https://docs.docker.com/engine/reference/builder/#copy) does mention this feature, but
it appears as though not a lot of people know about it (yet). I hope this post has helped you slim down your `Dockerfile`!
