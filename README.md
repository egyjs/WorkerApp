<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Garry

Garry is an application with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.

APP_NAME is accessible, powerful, and provides api end-point for large application.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Requires

- [x] **[Laravel](https://github.com/laravel/laravel)**
- [x] **[Passport](https://laravel.com/docs/8.x/passport)**
- [ ] **[laravel-api-key](https://github.com/ejarnutowski/laravel-api-key)**
- [ ] **[laravel-activitylog](https://github.com/spatie/laravel-activitylog)**
- [ ] **[laravel-backup](https://spatie.be/docs/laravel-backup)**
- [x] **[laravel-translatable](https://github.com/spatie/laravel-translatable)**
- [ ] **[twilio](https://www.twilio.com/voice/pricing/us)**
- [ ] **[paypal](https://developer.paypal.com/home)**
- [ ] **[stripe](https://dashboard.stripe.com/login)**
## install


```shell
cmopser update
php artisan migrate --path=database/migrations/* && php artisan migrate
php artisan passport:install
```

# todo
- [x] `add` worker schedule
- [x] `edit` worker schedule
- [ ] `create` issue 
- [ ] `store` issue and **notify the worker** 
- [ ] get another query cache builder
