# Use a imagem oficial do PHP para Laravel com Apache, versão 8.2
FROM php:8.2-apache

# Atualiza os pacotes do sistema e instala dependências
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia os arquivos do Laravel para o contêiner
COPY . /var/www/html

# Configurações adicionais do Apache
RUN a2enmod rewrite
