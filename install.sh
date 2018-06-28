# Clone this repository
git clone https://github.com/agonbar/PDP

# Go into the repository
cd PDP/project

#Gain admin rights
su

# Copy contents from the PHP
cp -r lamorisse/* /var/www/html
rm /var/www/html/index.html

# Load de Database
mysql -u root -piu < db.sql

# Install server dependency
apt-get update
apt-get install php-intl -y
a2enmod rewrite
service apache2 restart

#Install cakephp dependency
cd /var/www/html
wget -O - https://getcomposer.org/installer | php
php composer.phar install
