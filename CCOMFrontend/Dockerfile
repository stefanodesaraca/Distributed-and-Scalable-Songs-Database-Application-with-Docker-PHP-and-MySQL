
FROM php:apache


#Work directory inside the container
WORKDIR /var/www/html/

#Copying files from the local device to the container
COPY . /var/www/html/
COPY ./dbdashboard.php /var/www/html/


#To solve the servername problem
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli


EXPOSE 8083



CMD ["apache2-foreground"]






















