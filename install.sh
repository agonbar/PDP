#!/bin/bash

# Clone this repository
git clone https://github.com/agonbar/PDP

# Go into the repository
cd PDP/project

#Gain admin rights
if ! [ $(id -u) = 0 ]; then
  echo "I am not root, run me again"
  su
fi

# Copy contents from the PHP
cp -r lamorisse/* /var/www/html
cp -r lamorisse/.[^.]* /var/www/html
rm /var/www/html/index.html

# Load de Database
mysql -u root -piu < db.sql

# Install server dependency
apt-get update
apt-get install php-intl -y

a2enmod rewrite

rm /etc/apache2/sites-available/000-default.conf
cp PDP/project/000-default.conf /etc/apache2/sites-available/000-default.conf

service apache2 restart

#Install cakephp dependency
cd /var/www/html
wget -O - https://getcomposer.org/installer | php
php composer.phar install