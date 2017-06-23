# Activate Users plugin for Craft CMS

Plugin that adds "Activate account" permissions so that non-admins can activate users.

## Installation

To install Activate Users, follow these steps:

1. Download & unzip the file and place the `activateusers` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/billythekid/activateusers.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require billythekid/activateusers` from your site root (the same directory your craft folder is in)
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `activateusers` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Activate Users works on Craft 2.4.x and Craft 2.5.x.

## Activate Users Overview

This plugin adds a user permission to allow users to activate users. This is normally done by admin accounts only but sometimes 
you want a "semi-admin" account without full admin privileges to be able to do this. When a user has this permission set and is
viewing another user's dashboard page, the option to activate that user will appear in their "cog" menu. 

## Configuring Activate Users

This plugin has no configuration options. Just install it and give the users (or user groups) that you want to be able to activate
users that permission.

## Using Activate Users

Non-admin accounts with the permission should visit an unverified/not yet activated account in the dashboard. Here they can choose
to activate the user by way of the "cog" menu (at the top right in a full/desktop view)

## Activate Users Roadmap

Some things to do, and ideas for potential features:

* Other admin-only permissions maybe?

Brought to you by [Billy Fagan](https://billyfagan.co.uk)
