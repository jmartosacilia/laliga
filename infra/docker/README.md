## Instalación de Infraestructura

Copiar `dist.env` a `.env` y modificar los valores necesarios.

Hacer build de los contenedores
```
docker-compose build
```

Levantar los contenedores
```
docker-compose up -d
```

Agregar entrada al /etc/hosts
```
127.0.0.1 laliga-api.loc laliga.loc
```

Ejecutar comandos para crear base de datos y usuarios
```
docker exec -i laliga-api-dbserver mysql -e "CREATE DATABASE laliga;"
docker exec -i laliga-api-dbserver mysql -e "GRANT ALL ON laliga.* TO 'laliga'@'%' IDENTIFIED BY 'laliga';"
docker exec -i laliga-api-dbserver mysql -e "CREATE DATABASE laliga_test;"
docker exec -i laliga-api-dbserver mysql -e "GRANT ALL ON laliga_test.* TO 'laliga'@'%' IDENTIFIED BY 'laliga';"
```

Instalar vendor, configuración y tests
```
docker exec -it laliga-api-php bash
cp app/config/parameters.yml.dist app/config/parameters.yml
cp app/config/parameters_test.yml.dist app/config/parameters_test.yml
composer install
bin/console d:s:c
bin/console d:s:c --env=test

bin/console d:f:l
bin/console d:f:l --env=test

./vendor/bin/simple-phpunit
```

Documentación Backend:
 
Clubs
```
http://laliga-api.loc/api/v1/clubs
```

Players
```
http://laliga-api.loc/api/v1/clubs/1/players
```

Documentación Frontend:

```
http://laliga:3001
```
