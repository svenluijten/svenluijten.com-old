---
extends: _layouts.master
section: content
title: Introducing Artisan Shortcuts
date: 201901-10
edit_url: https://github.com/svenluijten/svenluijten.com/edit/master/source/_posts/introducing-artisan-shortcuts.md
---

# Introducing Artisan Shortcuts
In this blog post, I thought I would introduce a new package I have been 
working on. It is called Artisan Shortcuts, and it can be found on GitHub right 
[here](https://github.com/svenluijten/artisan-shortcuts).

In short, the package does not add any new commands, but it does give you the possibility
to define your own _shortcuts_ to commonly used Artisan commands. How often have you
executed `php artisan config:clear` and `php artisan view:clear` and `php artisan cache:clear`?
This package can condense that down into one simple `php artisan clear` command!

To install Artisan Shortcuts in your Laravel applications, require it with Composer and
publish the configuration file:

```bash
$ composer require sven/artisan-shortcuts
$ php artisan vendor:publish --provider="Sven\ArtisanShortcuts\ServiceProvider"
```

## Using Artisan Shortcuts
Artisan Shortcuts allows you to define these so-called _shortcuts_ in a config file at 
`config/shortcuts.php`, which might look like this: 

```php
<?php

return [
    'clear' => [
        'config:clear',
        'view:clear',
        'cache:clear',        
    ],
];
``` 

With this new `clear` command configured, you can execute `php artisan clear` and the three commands
I mentioned earlier on will be executed in the order you configure them.

## Just add an alias
You could of course "just add an alias". And if that works for you, go right ahead. If you work together 
with a bigger team though, and you want to make sure these commands are all executed in the right order, 
or make sure someone does not skip over any, it helps saving shortcuts or aliases with the source code.

## Just use Composer scripts
Composer scripts are another great way to avoid using this package, and if they fulfill your needs, I highly
recommend using them. However, if you use Composer scripts, you will end up with yet another way to interface 
with your application. Putting shortcuts in Artisan means there is just one way to "talk" to your application: 
via Artisan, which is what most of us Laravel developers will be used to.

## In closing
So, if this package looks interesting to you, require it into your project and play around with it. If it has
already proven useful to you, why not help spread the word and star the repository on GitHub? 
