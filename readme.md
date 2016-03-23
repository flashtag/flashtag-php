## Flashtag CMS

Standalone install of Flashtag CMS

### Installation

```
composer create-project "flashtag/cms:dev-master@dev" flashtag --prefer-dist
```

### Dev environment - Homestead

If you have Vagrant installed

1. `vendor/bin/homestead make` and modify `Homestead.yaml` to suit your needs
2. run `vagrant up`
3. run `vagrant ssh` and cd to your project directory and run `php artisan flashtag:install`.

Everything should be good.


### Production

- Clone your project repository and run `composer install`
- Copy `.env.example` to `.env` and set it up as required. Don't forget to change `APP_ENV` to `production` and `APP_DEBUG` to `false`.
- Generate your key `php artisan key:generate`
- Set `JWT_SECRET` to a random string.
- Run the install script. `php artisan flashtag:install`

Everything should be good.
