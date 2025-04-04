FROM php:8.4-fpm

# set your user name, ex: user=bernardo
ARG user=AllisonDev
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install Redis extension
RUN pecl install redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP (se houver configurações personalizadas)
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Copy application files (caso tenha arquivos no seu projeto para copiar)
COPY . /var/www

# Set the user for the container
USER $user

# Expose port (caso necessário)
EXPOSE 9000

# Entry point para rodar o PHP-FPM
CMD ["php-fpm"]
