(https://user-images.githubusercontent.com/56688615/193772938-ec464bde-ab5e-4636-80e4-54c2d3a1b1b7.PNG)
# Kasmir Cart 🛒

## What is Kasmir Cart![Cartmir]


Kasmir Cart is an e-commerce website built on some of the most popular open source technologies such as Codeigniter and Vanilla JS.

## 💾 Technologies

Programming Languages and Framework:

- CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.
- PHP is an open-source server-side scripting language that many devs use for web development.
- Bootstrap is the most popular CSS Framework for developing responsive and mobile-first websites.
- JavaScript is a scripting or programming language that allows you to implement complex features on web pages
- MySQL is a relational database management system. Databases are the essential data repository for all software applications. 

## Installation
#### Requirements:

- PHP 7.4
- MySQL

#### Configuration:
- Create the .env file:

```
cp env .env
```
- Open the .env file and configure the database access

```
database.default.hostname = localhost
database.default.database = kasmir_ecommerce
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```
- Install packages:

```
composer install
```
- Create database tables (CI4 migrations)

```
php spark migrate
```

- Set up mailtrap.io to use for smtp server

```
go to app\Config\Email.php to configure mailtrap.io
```


- Then run

```
php spark serve
```

## 👨‍💻Contact Me 🚀🔵
- Email - jesther.jc15@gmail.com
- LinkedIn - https://www.linkedin.com/in/jesther-costinar/
- Facebook - https://www.facebook.com/jeestheeer
- Instagram - https://www.instagram.com/kaassmir/
- Twitter - https://twitter.com/kasmir_



