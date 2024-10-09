FROM php:8.2-apache

# Instalar dependências e extensões necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Copiar o código da aplicação para o contêiner
COPY . /var/www/html

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html
