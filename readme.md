## Flashtag CMS

Standalone install of Flashtag CMS

### Installation

```
composer create-project flashtag/cms "dev-master@dev" --prefer-dist
```

Now update your database credentials in `.env`, for example:

```
DB_HOST=localhost
DB_DATABASE=db_name
DB_USERNAME=db_username
DB_PASSWORD=password
```

and then run:

```
php artisan migrate
```

### Dev environment - Homestead

- If you have Vagrant installed, you just need to modify Homestead.yaml to suit your needs and then run `vagrant up`.
- Then you will run `vagrant ssh` and cd to your project directory and run `php artisan migrate`.

Everything should be good.


### Production

- Clone your project repository and run `composer install`
- Copy `.env.example` to `.env` and set it up as required. Don't forget to change `APP_ENV` to `production` and `APP_DEBUG` to `false`.
- Generate your key `php artisan key:generate`
- Set `JWT_SECRET` to a random string.
- Migrate the database `php artisan migrate`

Everything should be good.
