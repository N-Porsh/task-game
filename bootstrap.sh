#!/usr/bin/env bash

PROJECT_FOLDER='task'

sudo apt-get update
sudo apt-get -y upgrade
# install apache 2.4
sudo apt-get install -y apache2

sudo mkdir "/var/www/${PROJECT_FOLDER}"
sudo chmod -R 755 /var/www

# install MySQL
#apt-get install mysql-server mysql-client

# install php 5.5.9, by default will be installed also:
# libapache2-mod-php5, php5-cli, php5-common, php5-json, php5-readline AND separately php5-mysql curl, Intl, GD
sudo apt-get install -y php5  php5-curl php5-intl php5-gd #php5-mysql


# setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
    ServerAdmin admin@localhost.com
    DocumentRoot "/var/www/${PROJECT_FOLDER}/public"
    ServerName localhost
    ServerAlias localhost

    #ErrorLog "logs/localhost-error.log"
    #CustomLog "logs/localhost-access.log" combined

    <Directory "/var/www/${PROJECT_FOLDER}/public">
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>

</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/localhost.conf

sudo a2ensite localhost.conf

# enable mod_rewrite
sudo a2enmod rewrite

# restart apache
service apache2 restart

# install other stuff:
sudo apt-get install -y dos2unix
sudo dos2unix /vagrant/init.sh

# Install composer
echo "Installing composer"
curl -sS https://getcomposer.org/installer | sudo -H php -- --install-dir=/usr/local/bin --filename=composer

# Provision services
cd /vagrant
chmod +x *.sh

su vagrant - -c ./init.sh

echo "======================="
echo "= ALL UP AND RUNNING! ="
echo "======================="