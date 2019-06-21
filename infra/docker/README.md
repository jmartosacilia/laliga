## Instalación de Infraestructura

Desde el directorio infra/docker

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
docker exec -it laliga-api-dbserver mysql
CREATE DATABASE laliga;
GRANT ALL ON laliga.* TO 'laliga'@'%' IDENTIFIED BY 'laliga';
CREATE DATABASE laliga_test;"
GRANT ALL ON laliga_test.* TO 'laliga'@'%' IDENTIFIED BY 'laliga';
exit;
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
http://laliga-api.loc/api/v1/players
```

Players en un club
```
http://laliga-api.loc/api/v1/clubs/1/players
```

Documentación Frontend:

(Recargar la home si ve la pantalla en blanco, el contener de docker demora en cargar la primera vez)

Home
```
http://laliga.loc:3001
```

