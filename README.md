# National Wedding Show (on [Bedrock](https://roots.io/bedrock/))

## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Installation
1. Install composer dependencies
    ```sh
    $ comoser install
    ```
2. Install yarn packages
    ```sh
    $ yarn install
    ```
3. Build assets
    ```sh
    $ gulp
    ```
    
4. Create your .env 

    ```sh
        $ cp .env.example .env
    ```
    * Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)
    * Generate with [our WordPress salts generator](https://roots.io/salts.html)

5. Run docker environment
```sh
$ cd dev/docker
$ docker-compose up -d
```

## Helpful stuff

Some of steps which if followed during migration to bedrock:

Copy over your existing theme and uploads

```sh
mv existing_site/wp-content/themes/* my-bedrock-project/web/app/themes/
mv existing_site/wp-content/uploads/* my-bedrock-project/web/app/uploads/
```

Import your database and replace old wp-content URLs
```sh
wp import db old-site-dump.sql
wp search-replace 'wp-content' 'app'
```
