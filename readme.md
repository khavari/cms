## CMS

#### This CMS .

#### Server Requirements
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

#### Local Requirements
- Git version 2.12.2
- Composer version 1.4.1
- npm version 5.5.1
- node version 8.9.1
- MySQl 5.7
- PHP >= 7.0.0

#### Installation
```
git clone git@github.com:khavari/cms.git
composer install
php artisan key:generate
npm install
npm run production
php artisan migrate
php artisan setup:settings
php artisan setup:widgets

exif extetion
```
