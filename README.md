# lbaw2133

## Collaborative News

Gameorama is a web application that provides a place for gamers to post, discuss and rate the latest news on their favorite videogames and topics.

A showcase video can be seen in this [link](https://youtu.be/R5fgyW4efyc).

###  Wiki

The project Artefacts and complete Components can be seen in the [Wiki](https://github.com/andrenasx/Gameorama/wiki)


### Installation

Link to the release with the final version of the source code in the group's git repository:  https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133

To run the project image locally, simply run the following commands:

```
docker run -it -p 8000:80 lbaw2133/lbaw2133
```

#### Run PostgresSQL local server

```
docker-compose up
```

#### Run and seed database

```
php artisan db:seed
```

#### Install Pusher

```
composer require pusher/pusher-php-server
```

#### Run laravel php local server

```
php artisan serve
```



### Usage & Credentials

URL to the product: http://lbaw2133.lbaw-prod.fe.up.pt

#### Administration Credentials

Administration URL: http://lbaw2133.lbaw-prod.fe.up.pt/admin

| Username | Password     |
| -------- | ------------ |
| WanWan   | #Password123 |

#### User Credentials

| Type   | Username              | Password     |
| ------ | --------------------- | ------------ |
| Member | ewyche13@google.co.uk | #Password123 |



### Group Members

GROUP2133

* André Nascimento, up201806461@fe.up.pt
* Caio Nogueira, up201806218@fe.up.pt
* Diogo Almeida, up201806630@fe.up.pt
* Gustavo Sena, up201806078@fe.up.pt
