# define php version
FROM php:7.4-apache
#install php and docker lib
RUN apt-get update && apt-get install -y git libzip-dev libicu-dev libpng-dev zlib1g-dev 
RUN docker-php-ext-configure intl \
    && docker-php-ext-install mysqli pdo pdo_mysql zip intl gd \
    && docker-php-ext-enable pdo_mysql
RUN a2enmod rewrite

COPY . /var/www/html

#install and run composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer
RUN composer update && composer install

#install and run npm 
RUN apt-get install -y \
    software-properties-common \
    npm
RUN npm install npm@latest -g && \
    npm install n -g && \
    n latest
RUN npm install

#install and run grunt
RUN npm install -g grunt-cli
RUN apt-get install -y ruby-dev
RUN npm install grunt-contrib-sass --save-dev
RUN gem install sass
RUN npm install --save-dev sass
RUN apt-get install -y ca-certificates fonts-liberation libappindicator3-1 libasound2 libatk-bridge2.0-0 libatk1.0-0 libc6 libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgbm1 libgcc1 libglib2.0-0 libgtk-3-0 libnspr4 libnss3 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 lsb-release wget xdg-utils
# vérifier pour les erreurs de connexion
RUN grunt --force

# RUN curl https://datan.fr/assets/dataset_backup/general/20221001.sql --output latest.sql
# COPY latest.sql /docker-entrypoint-initdb.d/init.sql

