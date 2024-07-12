# Use the official PHP image with Apache
FROM php:apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the PHP files to the container
COPY uploader.php /var/www/html/index.php
COPY dependency.php /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
