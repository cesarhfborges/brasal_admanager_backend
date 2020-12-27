<p align="center"><a href="https://brasal.com.br" target="_blank"><img src="https://www.brasal.com.br/inovacao/wp-content/uploads/2019/06/logo_brasal.png" width="400"></a></p>

## Instalar

Instale as dependiencias
```
composer install && npm install
```

Migre o banco
```
php artisan migrate
```

Caso tenha problemas Migre o banco no modo reconstrução
```
php artisan migrate:fresh
```


## Pacotes usados
- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).

## Problemas
Problemas no carregamento dos pacotes
```
composer dump-autoload
```

Problemas de cache
```
php artisan cache:clear
```
