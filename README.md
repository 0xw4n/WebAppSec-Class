# WebAppSec-Class
This is the repo where you can see the source code of the website that is used in my Web App Security and Hacking class on 27th may 2023. Feel free to use it to find vulnerability in the challenges that i gave. You can also use this file to host it on your local machine using docker. Just make sure you have docker and docker-compose installed. Below is the command that you can use to setup this website.

Setting up the website

`docker-compose up`

Setting up database

`docker exec -u 0 -it db /bin/bash`

`mysql -u root -p workshop`

Enter password `rootuser`

Then create the table with

`create table users (username VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL);`

`create table usersession (username VARCHAR(255) NOT NULL, session VARCHAR(255) NOT NULL);`

Open browser and type in the url `http://localhost`

