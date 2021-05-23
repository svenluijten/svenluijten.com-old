---
extends: _layouts.master
section: content
title: My Package Development Workflow
date: 2018-11-01
edit_url: https://github.com/svenluijten/svenluijten.com/blob/master/source/_posts/my-package-development-workflow.md
---

# My Package Development Workflow
[My GitHub profile](https://github.com/svenluijten) has plenty of packages on it, and I thought
it might be interesting for me to dive into how I go about making a new package. So in this post,
I will detail everything (except the actual development) that went into making 
[my `tls-checker` package](https://github.com/svenluijten/tls-checker).

## Initial Setup
First, we need some boilerplate to help us get going. This is where `svenluijten/package` comes
in:

```bash
$ git clone github:svenluijten/package.git tls-checker
$ cd tls-checker
``` 

This will create a new folder called `tls-checker` for me to do my work in. However, we don't want
the `package` repository's history. So let's re-initialize a git repo:

```bash
$ rm .git/ -rf
$ git init
```
