sudo apt-get update

# Add Swap partition
sudo swapon --show
    > Check Memory Space
        free -h
    > Check HDD Space
        df -h
    > Create swap file
        sudo fallocate -l 2G /swapfile
        > varify it with
            ls -lh /swapfile
        > enable swap file
            sudo chmod 600 /swapfile
            sudo mkswap /swapfile
            sudo swapon /swapfile
    > Make swap file permenant
        sudo cp /etc/fstab /etc/fstab.bak
        echo '/swapfile none swap sw 0 0' | sudo tee -a /etc/fstab
> Set swappiness to 10 and Cache Pressure to 10
    sudo nano /etc/sysctl.conf
    > add line to it :
        vm.swappiness=10
        vm.vfs_cache_pressure=50

# Setup /var/www/html rights for ubuntu user

sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/nginx
sudo add-apt-repository ppa:ondrej/php
sudo apt update

sudo apt-get install nginx

/etc/nginx/nginx.conf
/etc/nginx/sites-available

sudo usermod -aG www-data ubuntu
sudo chown -R www-data:www-data /var/www
sudo chmod -R 775 /var/www

sudo reboot

sudo apt install mysql-server
sudo mysql_secure_installation

sudo mysql
SELECT user,authentication_string,plugin,host FROM mysql.user;
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'McdK6n##6P7YGzsWxy';
FLUSH PRIVILEGES;

cd /var/www/
mkdir martialartszen
cd martialartszen

git config --global user.name "chintan"
git config --global user.email "chintan.adatiya@gmail.com"
ssh-keygen -t ed25519 -C "chintan.adatiya@gmail.com"
cat ~/.ssh/id_rsa.pub

git init .
git remote add -t \* -f origin git@103.250.188.226:maz/martialartszen.git
git checkout -f master

sudo systemctl restart nginx

sudo apt install php8.1 
sudo apt install php8.1-fpm
sudo apt install php8.1-mbstring php8.1-curl php8.1-gd php8.1-xml php8.1-mysql php8.1-zip php-pear

sudo nano /etc/nginx/sites-available/default

root /var/www/html/martialartszen/public;

# Add index.php to the list if you are using PHP
index index.php index.html index.htm index.nginx-debian.html;

server_name adhdme.care www.adhdme.care;

location / {
    # First attempt to serve request as file, then
    # as directory, then fall back to displaying a 404.
    # try_files $uri $uri/ =404;
    try_files $uri $uri/ /index.php?$args;
}

location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
}

pear config-set php_ini /etc/php/8.1/fpm/php.ini
pecl config-set php_ini /etc/php/8.1/fpm/php.ini

nano .bash_profile
alias php='php -c /etc/php/8.1/fpm/php.ini'


sudo wget https://files.phpmyadmin.net/snapshots/phpMyAdmin-5.2+snapshot-english.tar.gz
tar -zxvf phpMyAdmin-5.2+snapshot-english.tar.gz
rm -rf phpMyAdmin-5.2+snapshot-english.tar.gz
mv phpMyAdmin-5.2+snapshot-english phpmyadmin

sudo systemctl restart nginx

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer

sudo apt install zip unzip

composer install

sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

cd /var/www/html/martialartszen/
sudo apt-get install supervisor
sudo cp /var/www/html/martialartszen/laravel-worker.conf /etc/supervisor/conf.d/
sudo nano /etc/supervisor/conf.d/laravel-worker.conf
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
sudo supervisorctl restart laravel-worker:*


# Permission restore for /var/www/html
sudo usermod -aG www-data ubuntu
sudo adduser ubuntu www-data

sudo chown -R www-data:www-data /var/www
sudo chmod -R 775 /var/www

sudo find . -type d -exec chmod 0775 {} \;
sudo find . -type f -exec chmod 0644 {} \;

sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache


sudo chown -R www-data:www-data /var/www/

sudo chmod g+w .git -R
sudo find /var/www/ -type d -exec chmod 775 {} \;
sudo find /var/www/ -type f -exec chmod 644 {} \;

# Nginx help
Pela nginx aa blog par thi install karvanu normally
https://www.digitalocean.com/community/tutorials/how-to-install-nginx-on-ubuntu-20-04

Pachi thoda steps che fine tune karva mate e aama thi
https://hostadvice.com/how-to/how-to-tune-and-optimize-performance-of-nginx-web-server/

sudo apt install nginx
sudo systemctl start nginx
sudo nano /etc/nginx/sites-available/

# PPA CAVEATS:
1. If you are using php-gearman, you need to add ppa:ondrej/pkg-gearman
2. If you are using apache2, you are advised to add ppa:ondrej/apache2
3. If you are using nginx, you are advised to add ppa:ondrej/nginx-mainline
   or ppa:ondrej/nginx