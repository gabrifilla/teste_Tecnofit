# Dockerfile
FROM php:8.1-fpm

# Instala dependências do sistema e extensões PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev

# Instala extensões PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instala o Composer (usando a imagem oficial do Composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia os arquivos da aplicação para o container
COPY . .

# Instala as dependências do Composer
RUN composer install

# Expõe a porta padrão do PHP-FPM
EXPOSE 9000

# Comando para iniciar o PHP-FPM
CMD ["php-fpm"]