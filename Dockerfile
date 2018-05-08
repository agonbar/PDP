FROM debian

RUN apt update && apt dist-upgrade -y && \
apt install apache2 vim mysql-server php php-pear php-mysql php-intl php-mbstring curl ssh zip -y
RUN useradd -ms /bin/bash iu && echo "iu:iu" | chpasswd && chown iu:iu /var/www/html && chown iu:iu /var/www/html
WORKDIR /var/www/html
USER iu
RUN curl -s https://getcomposer.org/installer | php
RUN php composer.phar create-project --prefer-dist cakephp/app lamorisse | cat -
USER root
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

RUN echo "CREATE USER 'iu'@'localhost' IDENTIFIED BY 'iu';" > db.dump && \
echo "CREATE DATABASE iu;" >> db.dump && \
echo "GRANT ALL PRIVILEGES ON *.* TO 'iu'@'localhost' WITH GRANT OPTION;" >> db.dump && \
/etc/init.d/mysql start && mysql < db.dump

RUN sed -i 's/my_app/iu/g' /var/www/html/lamorisse/config/app.php && \
sed -i 's/secret/iu/g' /var/www/html/lamorisse/config/app.php


EXPOSE 80
EXPOSE 8765
EXPOSE 22

CMD /etc/init.d/ssh start && \
/etc/init.d/apache2 start && \
/etc/init.d/mysql start && \
/var/www/html/lamorisse/bin/cake server -H 0.0.0.0 && \
tail -f /dev/null
