# Mr. Press
[![Latest Stable Version](https://poser.pugx.org/salaros/mr-press/v/stable)](https://packagist.org/packages/salaros/mr-press)
[![Dependency Status](https://www.versioneye.com/user/projects/57bfee1d69d9490042f72c31/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/57bfee1d69d9490042f72c31)
[![License](https://poser.pugx.org/salaros/mr-press/license)](https://packagist.org/packages/salaros/mr-press)
[![Gitter](https://badges.gitter.im/Mr-Press/Lobby.svg)](https://gitter.im/Mr-Press/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=body_badge)

[![Join the chat at https://gitter.im/Mr-Press/Lobby](https://badges.gitter.im/Mr-Press/Lobby.svg)](https://gitter.im/Mr-Press/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

**Mr. Press** is a [WordPress](https://wordpress.org/) development stack similar to [Bedrock](https://github.com/roots/bedrock).
Project's main goal is to improve the overall security, portability and deployment process of WordPress, while trying to use the best web development practices.

## Features

* WordPress, its themes and plugins are installed and updated via Composer!
* `wp-content` folder has been relocated, so it won't mess up with WordPress core
* Critical WordPress settings (such as site URL, database credentials etc) are [loaded from the environment variables](http://12factor.net/config)
* [WP Cron is disabled](https://www.lucasrolff.com/wordpress/why-wp-cron-sucks/) by default and there is a ready-to-use cron job to run

### Mr. Press default theme's features

* [Bootstrap](http://getbootstrap.com/) responsive layout
* Clean templates using [Twig](http://getbootstrap.com/) templates via [Timber](http://twig.sensiolabs.org/) plugin
* A lot of customizations can be done directly from code:
    * define menus (links to page, custom links, nested items etc)
    * add / remove custom post types and taxonomies
    * handy access to [Bower](http://bower.io/) and [NPM](https://www.npmjs.com/package/npm-assets) assets
* Integration with [Advanced Custom Fields](http://www.advancedcustomfields.com) plugin (group fields can be registered from theme code) and used via Timber

## Requirements

* [PHP](http://php.net/) >= 5.5 or 7.0
* [Apache](https://httpd.apache.org/) or [NGINX](http://nginx.org/en/) web server
* [MySQL](https://www.mysql.com/) or [MariaDB](https://mariadb.org/) DB server
* [Composer](https://getcomposer.org/) >= 1.0

Make sure that Composer and the rest of the requirements are installed.

## Installation

Just go the web root folder (usually it's `/var/www`) and create your copy of the project:

``` bash
$ cd /var/wwww
$ composer create-project salaros/mr-press my-new-website
```

### Create WordPress tables

Now change to `/var/www/my-new-website` directory and edit the `.env` file and chnage DB connection settings and site URL:

``` bash
$ cd /var/www/my-new-website
$ editor .env
$ composer run-script initialize
```

### Create cron job

Since [WP Cron is disabled](https://www.lucasrolff.com/wordpress/why-wp-cron-sucks/) by default you'd better run the commands below in order to enable a system [cron job](https://en.wikipedia.org/wiki/Cron) which triggers WP Cron every 5 min:

*PLEASE NOTE: `create-cron-job` requires administrator privileges, so you should run it as root ([super user](https://en.wikipedia.org/wiki/Superuser)) or [sudoer user](https://help.ubuntu.com/community/Sudoers).*

``` bash
$ cd /var/www/my-new-website
$ composer run-script create-cron-job
```

## Contributing

1. Fork it: `https://github.com/salaros/mr-press`
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :bear:

## Known bugs

* **Mr. Press** has been tested on Linux and might also work correctly on Mac OS X. Windows compatibility will be implemented later
* Most likely **Mr. Press** is not compatible with WordPress multisie, but this feature has been already added to the RoadMap

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

TODO: Write credits





