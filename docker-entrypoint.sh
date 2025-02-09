#!/bin/sh
# Gera a chave da aplicação (force garante que seja gerada mesmo que já exista uma chave)
php artisan key:generate --force
# Executa o comando passado para o container
exec "$@"