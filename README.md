# Car Rental Utility
This project depicts the database management in a PHP web app for a car renting utility. A relational database has been designed in MySQL and interfaced with PHP with a front end design in HTML/CSS/JavaScript.

## Database Design
### Entity Relationship (ER) Diagram
![ER Diagram](https://github.com/saqibahmed515/car-rental/blob/master/Reports/ER%20Diagram.png)
### Information Flow Diagram
![IF Diagram](https://github.com/saqibahmed515/car-rental/blob/master/Reports/Information%20Flow%20Diagram.png)

## Directory Structure

### [src](https://github.com/saqibahmed515/car-rental/tree/master/src)
This folder contains the main source files of the project. It has following sub folders:

##### [main](https://github.com/saqibahmed515/car-rental/tree/master/src/main)
This folder contains all the PHP files and the front end interface of HTML/CSS/JavaScript.
##### [SQL Scripts](https://github.com/saqibahmed515/car-rental/tree/master/src/Sql%20Scripts)
All the sql scripts reside in this folder. [`cre.sql`](https://github.com/saqibahmed515/car-rental/blob/master/src/Sql%20Scripts/cre.sql) is the main file which contains main stored procedures and creation and population queries for all the tables in the database.
### [Reports](https://github.com/saqibahmed515/car-rental/tree/master/Reports)
This directory contains all the design reports including table diagram and DB queries for MYSql.

### [Design Requirements](https://github.com/saqibahmed515/car-rental/blob/master/Design%20Requirements.pdf) 
These are the main design requirments as imposed by the professor. Design of the project is in accordance with the requirements. 

## Installation
### Prerequisites
* Download and Intsall [MySql Server](https://dev.mysql.com/downloads/mysql/), [Apache](https://httpd.apache.org/download.cgi) and [PHP](http://php.net/downloads.php) for your operating system.
##### OR
* Install any web server application or servlet container which has all of the above components. This project has been tested on [WAMP](http://www.wampserver.com/en/). Download and install it if you're on windows. For linux and MAC you can use [XAMPP](https://www.apachefriends.org/download.html)

### How to run?
* Create a database in PHPMyAdmin (in case of WAMP) or from MySql command line. 
* Enter the credentials and database name in the [connection.php](https://github.com/saqibahmed515/car-rental/blob/master/src/main/connection.php) file.
* Import [`cre.sql`](https://github.com/saqibahmed515/car-rental/blob/master/src/Sql%20Scripts/cre.sql) file in your database. 
* After installing the prerequisites above, copy all the files from `/src/main/` to your web directory. For WAMP, default web directory is `C:\wamp\www`. You can access these resources after starting the server.

## Demo
[![Demo](https://github.com/saqibahmed515/car-rental/blob/master/Reports/video.png)](https://www.youtube.com/watch?v=9RB5zvcmkFk&lc=z23kch0hkoriynuvqacdp435dsfkxqouhcrhlwritj1w03c010c)

