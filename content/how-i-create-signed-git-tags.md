---
title: How I create (signed) tags in Git
date: 2020-01-15
excerpt: |
    I always sign any tag I create in Git with my GPG key. Here is how you can
    do the same.
---

I have a GPG key set up to do most of my Git work. This way, everyone can safely
assume that the commits and tags I am pushing were actually made by me. I have
configured my global `~/.gitconfig` file in such a way that every commit I do is
automagically signed with my GPG key:

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
