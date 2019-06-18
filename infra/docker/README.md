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
127.0.0.1 laliga-api.loc
```

Entrar a la instancia de MariaDB para crear base de datos y usuarios
```
docker exec -i laliga-api-dbserver mysql -e "CREATE DATABASE laliga_api;"
docker exec -i laliga-api-dbserver mysql -e "GRANT ALL ON laliga_api.* TO 'laliga_api'@'%' IDENTIFIED BY 'laliga_api';"
```

Entrar a la instancia de MariaDB para levantar el dump
```
mv dump.sql ../database
docker exec -it laliga-api-dbserver bash
mysql laliga_api < /var/lib/mysql/dump.sql
rm /var/lib/mysql/dump.sql
```

Instalar vendor y configuración
```
docker exec -it laliga-api-php bash
cd /home/app
cp app/config/parameters.yml.dist app/config/parameters.yml
composer install
```

Documentación: 
```
http://laliga-api.loc
```
