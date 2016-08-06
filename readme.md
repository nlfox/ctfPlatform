# Yet Another CTF Platform

![demo](https://s8.postimg.org/hb12at3eb/demo.png)
很惭愧 只是一个微小的CTF平台 

## Installation

### Via Docker (Recommanded)

#### From my docker image
(Assume you have already installed docker)

1. `docker pull nlfox/ctf`
2. `touch database.sqlite`
3. `docker run -p 80:80 -v ~/database.sqlite:/var/www/html/app/database/database.sqlite nlfox/ctf "php artisan migrate"`
4. `docker run -p 80:80 -v ~/database.sqlite:/var/www/html/app/database/database.sqlite nlfox/ctf`

#### Laraedit [Project Home](https://github.com/laraedit/laraedit-docker)
(Assume you have already installed docker)

1. `git clone https://github.com/nlfox/ctfPlatform.git`
2. `cd ctfPlatform`
3. `mv .example.env .env` use sample .env config file
4. `touch database/database.sqlite` create database file 
(if you want to use MySQL instead, modify the .env file)
5. `docker pull laraedit/laraedit` pull
6. `docker run -p 80:80 -v ctfPlatform:/var/www/html/app \
laraedit/laraedit "cd /var/www/html/app && php artisan migrate"`
     do database migrate and new admin password will be displayed.
     




## Security Vulnerabilities

If you discover a security vulnerability, please send an e-mail to Taylor Otwell at nlfox@msn.cn. All security vulnerabilities will be promptly addressed.


## License

The CTF Platform is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
