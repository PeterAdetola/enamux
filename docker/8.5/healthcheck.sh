#!/bin/bash
# Check if nginx and php-fpm are running

if ! pgrep -x "nginx" > /dev/null; then
    echo "ERROR: Nginx is not running"
    exit 1
fi

if ! pgrep -x "php-fpm8.5" > /dev/null; then
    echo "ERROR: PHP-FPM is not running"
    exit 1
fi

# Check if socket exists
if [ ! -S /var/run/php/php8.5-fpm.sock ]; then
    echo "ERROR: PHP-FPM socket does not exist"
    exit 1
fi

# Check socket permissions
if [ ! -r /var/run/php/php8.5-fpm.sock ] || [ ! -w /var/run/php/php8.5-fpm.sock ]; then
    echo "WARNING: PHP-FPM socket permissions may be incorrect"
fi

echo "✅ All services healthy"
exit 0
