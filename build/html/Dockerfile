FROM php:8.1-apache

# Configurer l'utilisateur et le groupe www-data
RUN getent group www-data || groupadd -g 33 www-data && \
    getent passwd www-data || useradd -u 33 -g www-data -d /var/www -s /usr/sbin/nologin www-data

# Copier les fichiers de l'application
COPY . /var/www/html/

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Appliquer les permissions
RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;

RUN chmod -R 750 private
RUN chown -R root:www-data private

# Activer le module rewrite d'Apache si nécessaire
RUN a2enmod rewrite

# Exposer le port HTTP
EXPOSE 80
