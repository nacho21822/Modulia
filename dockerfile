FROM php:8.2-apache

# 1. Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    curl \
    openssl \
    && docker-php-ext-install pdo pdo_pgsql

# 2. Instalar Composer (El gestor de paquetes de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Activar módulos de Apache necesarios
RUN a2enmod rewrite ssl

# 4. Configurar Certificado SSL (Autofirmado para local)
RUN mkdir -p /etc/apache2/ssl && \
    openssl req -x509 -nodes -days 365 \
    -newkey rsa:2048 \
    -keyout /etc/apache2/ssl/apache.key \
    -out /etc/apache2/ssl/apache.crt \
    -subj "/C=ES/ST=Valencia/L=Valencia/O=Modulia/CN=localhost"

# 5. Configurar Apache (Copiamos tus archivos)
# Nota: Quitamos el comando 'sed' porque tus archivos .conf ya tienen la ruta correcta
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY docker/apache/ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Activamos el sitio SSL
RUN a2ensite default-ssl

# 6. Copiar los archivos del proyecto
WORKDIR /var/www/html
COPY . .

# 7. CORRECCIÓN IMPORTANTE: Mover páginas de error a la carpeta pública
# Creamos la carpeta errors en public y copiamos los html allí para que Apache los vea
RUN mkdir -p public/errors && \
    cp docker/apache/errors/*.html public/errors/

# 8. Permisos (Usuario www-data de Apache)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# 9. Instalar dependencias de Laravel
# --no-scripts salta los autodiscovery (útil si la DB no está lista aún en el build)
RUN composer install --optimize-autoloader --no-dev --no-scripts

EXPOSE 80
EXPOSE 443