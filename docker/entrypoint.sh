#!/bin/sh

# Ajustar permissões sempre que o container sobe
echo "🔧 Ajustando permissões..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Espera o banco ficar disponível
echo "⏳ Aguardando banco de dados..."
until nc -z -v -w30 db 3306
do
  echo "Banco ainda não disponível, tentando novamente..."
  sleep 5
done

# Rodar migrations (sem derrubar o container se falhar)
echo "📦 Rodando migrations..."
if php artisan migrate --force; then
  echo "✅ Migrations aplicadas com sucesso"
else
  echo "⚠️ Erro ao rodar migrations, continuando mesmo assim..."
fi

# Gerar caches (também não derruba se falhar)
echo "⚡ Gerando caches..."
php artisan config:cache || true
php artisan route:cache || true

# Iniciar PHP-FPM
echo "🚀 Iniciando PHP-FPM..."
exec php-fpm