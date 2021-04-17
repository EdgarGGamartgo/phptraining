http://www.localhost/

localhost:80

sudo rm /var/www/your_domain/info.php

/var/www/phptraining/

excelent reference: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04

In ubuntu you can use following command to restart apache services :

sudo /etc/init.d/apache2 restart

When unable to upload files to a given directory from the tmp directory always try to give write permissions with followinf command
sudo chmod 777 /var/www/phptraining/files

# NOTE: When loading files to any folder remember to first confirm if such folder has writing
permission for all users