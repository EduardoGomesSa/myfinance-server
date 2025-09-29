set -e

echo "Iniciando setup do projeto Laravel via Docker..."

docker run --rm \
  -v "$(pwd)":/app \
  -w /app \
  php:8.2-cli bash -c "apt-get update && apt-get install -y unzip git && curl -sS https://getcomposer.org/installer | php && php composer.phar install"

echo "Dependências instaladas com sucesso!"
echo "Agora você pode rodar: ./vendor/bin/sail up --build"
