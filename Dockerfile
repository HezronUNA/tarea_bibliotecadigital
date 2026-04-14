FROM php:8.2-fpm

RUN apt-get update && apt-get install -y nginx && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

RUN chmod +x /var/www/html/start.sh && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 775 /var/www/html/database /var/www/html/cache

COPY nginx.conf /etc/nginx/sites-available/default

RUN ln -sf /dev/stdout /var/log/nginx/access.log && \
    ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 8080

CMD ["/var/www/html/start.sh"]