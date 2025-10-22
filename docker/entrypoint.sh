#!/bin/sh

echo "🔧 Ajustando permissões..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "⏳ Aguardando banco de dados..."
until nc -z -v -w30 db 3306
do
  echo "Banco ainda não disponível, tentando novamente..."
  sleep 5
done

php artisan migrate --seed --force

echo "⚡ Gerando caches..."
php artisan config:cache || true
php artisan route:cache || true

echo "🚀 Iniciando PHP-FPM..."
exec php-fpm