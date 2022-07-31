FROM php:8.1-apache
WORKDIR /var/www/html/demo

COPY README.md README.md
COPY README.cz.md README.cz.md
COPY app app 
COPY cache cache
COPY etc etc
COPY www www
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN  chown www-data /var/www/html/demo/cache/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && a2enmod rewrite &&  service apache2 restart
EXPOSE 80