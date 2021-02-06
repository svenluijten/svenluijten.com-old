---
extends: _layouts.master
section: content
title: How I create (signed) tags in Git
date: 2020-01-15
edit_url: https://github.com/svenluijten/svenluijten.com/edit/master/source/_posts/how-i-create-signed-tags-git.md
---

# How I create (signed) tags in Git
I have a GPG key set up to do most of my Git work. This way, everyone can safely
assume that the commits and tags I’m pushing were actually made by me. I've configured
my global `~/.gitconfig` file in such a way that every commit I do is automagically
signed with my GPG key:

```bash
[commit]
    gpgsign = true
```

However, it is not possible (as far as I know) to automagically sign tags with
my GPG key in this way. So I use the following command to create signed (and
annotated) tags in Git:

```bash
$ git tag -s v3.4.0 -m 'Version 3.4.0'
```

After this, you have to of course push the tags to your remote:

```bash
$ git push --tags
```

And that’s it! 
