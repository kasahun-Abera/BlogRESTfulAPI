## Laravel Blog Rest API
This is a blog rest API project including blog features like category,article,tags using PHP Laravel framework & MySQL database.
Generally this repo is to create a Laravel application with a RESTful API for a blog, including three main entities (Category, Article, and Tags), multiple images associated with categories and articles, image uploads using a job and morph table, real-time communication using Pusher.com, and testing with PHP Unit.
## How to use ?
Follow these steps to get this project live

```
git clone https://github.com/kasahun-Abera/BlogRESTfulAPI.git
cd BlogRESTfulAPI
composer update

```
## Configure your .env file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_username
DB_PASSWORD=db_password

```

## Final steps

```
php artisan migrate
php artisan key:generate
http://127.0.0.1:8000


```

## Thanks