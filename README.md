# Distributed-and-Scalable-Songs-Database-Application-with-Docker-PHP-and-MySQL

This project involved creating a distributable and scalable full stack application which could be deployed on multiple devices with Docker Swarm.<br>
Also, the app should let user access the database and have all the rows (each one containing details about one song) displayed on a dedicated web page.<br>
The application is made of a frontend, a backend and a database.<br>

<li>The frontend is realized with HTML and CSS web page which lets the user insert songs data (like: title, author, duration, etc.) into a MySQL database through a form.</li>
<li>The backend is a PHP script which controls the insertion of the data into the DB.</li>
<li>The database is a simple MySQL relational database.</li>

<br>

The whole application is dockerized with 5 services which integrate necessary and additional functionalities:
<li>mysql (the DBMS)</li>
<li>httpd (Apache HTTP Server)</li>
<li>phpMyAdmin (to access the database manually)</li>
<li>ccombackend (the backend of the application)</li>
<li>ccomfrontend (the frontend of the application)</li>

<br>

Finally, to deploy the app with Docker Swarm I used three XUbuntu virtual machines with Docker daemons installed hosted on my local machine using VirtualBox which simulated three different devices where the app could be distributed.<br>

Each service was scaled to an appropriate number of replicas, but could also be scaled up in case of need.<br>

The Docker containers created for the project are available on Docker Hub at: https://hub.docker.com/u/stefanodesaraca
