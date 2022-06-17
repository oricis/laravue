FROM php:8.1.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
# Include alternative DB driver
# RUN docker-php-ext-install pdo
# RUN docker-php-ext-install pdo_mysql
RUN apt-get update \
    && apt-get install -y sendmail libpng-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libonig-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

# RUN a2enmod rewrite

# * * * * * * * * * setup Apache
RUN chown www-data: /var/www -R && chmod -R 777 /var/www \
&& a2dissite 000-default && a2enmod rewrite

# * * * * * * * * * set server name
RUN echo "ServerName app.local" >> /etc/apache2/apache2.conf

# * * * * * * * * * install composer && nodejs
# RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash - \
&& apt-get install nodejs -y

# * * * * * * * * * prepare directories & clean up
RUN mkdir -p /var/lock/apache2 /var/run/apache2 /var/www \
&& rm -r /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user

# * * * * * * * * * expose ports
EXPOSE 80
