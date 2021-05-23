---
title: How I git from A to Z
date: 2021-05-24
excerpt: An in-depth look at my git setup and configuration.
---

Excuse the pun in the title, I couldn't resist. In this post I will walk you through my git setup. I recently had to install a new MacBook for work, which included configuring my git setup like new, and I found some interesting tidbits I thought would be worth sharing.

## Installing git
I work from macOS, which has the incredible package manager [Homebrew](https://brew.sh) available. This makes installing git on the command line as simple as 1-2-3:

```sh
$ brew install git
```

And that's git!

## GUI or CLI?
I can be very short on this. I prefer using the CLI, so that's what I'll be covering.

## Configuration
In order to make git as enjoyable as possible to work with, I've accumulated some configuration options over the years:

### Global ignore file
It is good practice to have a "global `.gitignore` file" to make sure certain files or folders are ignored in every single project. The "local" `.gitignore` file in each project will override these settings. I store mine in my home folder:

```sh
$ git config --global core.excludesFile
/Users/sven/.gitignore
```

You can set your own by appending a path to the command from above:

```sh
$ git config --global core.excludesFile $HOME/.gitignore
```

The contents of this file should be user-specific files you want to ignore that have no bearing on the project(s) you work on. This includes folders like `.vscode/` and `.idea/`, but also files such as `.DS_Store`, `.Trashes`, or `.phpunit.result.cache`. Mine looks like this:

```
# JetBrains IDE
.idea/

# PhpUnit
.phpunit.result.cache

# macOS
*.DS_Store
.DocumentRevisions-V100
.fseventsd
.Spotlight-V100
.TemporaryItems
.Trashes
.VolumeIcon.icns
.com.apple.timemachine.donotpresent
```

### Don't let git guess
To avoid possible confusion for some configuration options, I like to set `user.useConfigOnly` to `true`. This way I know that git won't try to "guess" some of my config values from the system, but it always uses whatever is in the `.gitconfig` file (whether it be the global one, or the one in the project I'm working on):

```sh
$ git config --global user.useConfigOnly true
```

### Default branch
Whether you like it or not, `main` as a default branch name is here to stay. You can configure git to name the default branch whatever you want with the `init.defaultBranch` configuration option. Mine will remain `main`.

```sh
$ git config --global init.defaultBranch main
```

### What's the status?
I like the output of `git status` to be nice and short, as well as easy to scan. I've gotten used to seeing it with the options `--short` and `--branch` included, which of course, have configuration options!

```sh
$ git config --global status.short true
$ git config --global status.branch true
```

There's also the option to show _all_ untracked files, even those in new, untracked directories. I'm playing around with this one at the moment, but I'm not sure if I like it yet:

```sh
$ git config --global status.showUntrackedFiles all
```

### Signing things
To make sure other people know it's really **me** who's pushing commits and tags, I try to always sign everything I can with my GPG key. This has the added benefit of my commits getting a nice "Signed!" badge next to them in the GitHub/GitLab UI.

```sh
$ git config --global commit.gpgSign true
$ git config --global gpg.program <path to gpg executable>
$ git config --global user.signingKey <gpg signing key>
```

For more information on—and a guide on how to set up—GPG signing in git, I recommend [GitHub's help articles](https://docs.github.com/en/github/authenticating-to-github/managing-commit-signature-verification).

I also force myself to sign any annotated tag I create (which is all of them) by setting the `tag.forceSignAnnotated` option to `true`:

```sh
$ git config --global tag.forceSignAnnotated true
```

### Making the log pretty
To make sure the output of `git log` is readable, I wrote my own "pretty" formatter, and an alias to make it more accessible:

```sh
$ git config --global alias.lg "log --graph --date=human --pretty=default"
$ git config --global pretty.default "format:%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cd) %C(bold blue)<%an>%Creset"
```

I then use it with `git lg`, which is so embedded into my muscle memory that I barely even think about it anymore 😅

### Aliases
I have a couple of aliases defined. None of them are super groundbreaking, but they're worth sharing.

```sh
# `git st`, because why use many word when few do trick?
$ git config --global alias.st "status"

# `git df` to tell git you're talking about diffing files.
$ git config --global alias.df "diff --"

# `git ap` to "add in patch mode".
$ git config --global alias.ap "add --patch"

# `git nah` for when you're not feeling the changes you made.
$ git config --global alias.nah "\!git reset --hard && git clean -df"

# `git publish` to push a new local branch to the remote and set it as the tracking branch.
$ git config --global alias.publish "\!git push origin \$(git symbolic-ref --short HEAD) -u"

# `git track` to track a remote branch. I use this very rarely because I push new branches with `git publish`.
$ git config --global alias.track "\!git branch --set-upstream-to origin/\$1"
```

## SSH configuration
I use SSH to clone all of my repositories. This allows me to revoke access from certain devices (eg. work MacBook) by removing the SSH key from my GitHub account without  needing to change the password and having to change configuration around on my other devices. Another benefit is that I can "name" certain remotes, saving me on valuable characters and time. My `~/.ssh/config` file looks like this:

```
#
# Add the following SSH keys to the session
#
IdentityFile ~/.ssh/id_ed25519

#
# Personal Connections
#
Host github
  User git
  HostName github.com

Host gitlab
  User git
  HostName gitlab.com

Host *
  IdentityFile ~/.ssh/id_ed25519
  AddKeysToAgent yes
  UseKeychain yes
  PubkeyAuthentication yes
  IdentitiesOnly yes
  UseRoaming no
  Port 22
```

This SSH configuration allows me to clone repositories with `git clone github:<username>/<repo>.git`, so it skips on me having to type out `github.com` every time. It also makes sure the right SSH key is used on every connection (unless explicitly specified), and sets the (undocumented) `UseRoaming` option to `no` for all hosts to mitigate exposure to [CVE-2016-0777](http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-0777) and [CVE-2016-0778](http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-0778).

## Conclusion
I try to stay as close to the "core" of git as possible, so I don't use overly complex aliases or configuration that might be hard to understand. This is because I don't want to have to debug _my own setup_ when I inevitably encounter a rebase that's messing up, or a three-way merge that's failing somewhere. The resulting `~/.gitconfig`, `~/.gitignore`, and `~/.ssh/config` files [are available as a gist](https://gist.github.com/svenluijten/be137ce8bc2f10f043b08f26cf45d71f) if you don't want to manually type out all the commands.

Everybody's git experience is different, and I'd love to know what configuration options you think I'm "missing", or are worth checking out. How do you use git? Do you prefer GUI or CLI? Did this post help out in any way? I'd appreciate it if you could [let me know on Twitter](https://twitter.com/svenluijten)!

I had a blast writing this, and I even discovered some new configuration options I previously had no idea existed. Hopefully this post was helpful to you in some way, and if you're in the mood for more `git config` goodness, I highly recommend you take a look at [the official documentation](https://git-scm.com/docs/git-config).
