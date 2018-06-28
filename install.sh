# Clone this repository
git clone https://github.com/agonbar/PDP

# Go into the repository
cd PDP/project

#Gain admin rights
su

# Copy contents from the PHP
cp -r lamorisse/* /var/www/html
rm /var/ww/html/index.html

# Load de Database
mysql -u root -piu < db.sql

# Install server dependency
apt-get install php-intl -Y
a2enmod rewrite
service apache2 restart

#Install cakephp dependency
cd /var/ww/html
wget -O - https://getcomposer.org/installer | php
php composer.phar install