# Use uma imagem oficial do PHP com Apache
FROM php:7.4-apache

# Copie os arquivos do Laravel para o contêiner
COPY . /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --optimize-autoloader

# Copie o arquivo de configuração do Apache
COPY docker/apache2.conf /etc/apache2/sites-available/000-default.conf

# Habilitar o módulo de reescrita do Apache
RUN a2enmod rewrite

# Expor a porta 80 para o tráfego web
EXPOSE 80

# Comando de inicialização do Apache
CMD ["apache2-foreground"]
