# Docker-LEMP-stack-composer

Derived from Docker-LEMP-stack

**LAMP**
- Linux (Docker default)
- Nginx
- MySQL (MariaDB)
- PHP

***

### Install MySQL Workbench
https://www.mysql.com/products/workbench/
Create database - match database name in *docker-compose.yml*

### Install Docker platform
https://www.docker.com/

### Set credentials
Make a copy of src/configs/inc.credentials-example.php to src/configs/inc.credentials.php 

Set credentials to match environment

Run command:
`docker-compose up`

Browse http://127.0.0.1/

### Docker cmds 

*List containers:*
`docker container ls`

*use container to browse filesystem:*
`docker exec -it 'container_name' bash`

like
`docker exec -it 43a6f956cd65 bash`

*remove containers, unused images*
`docker system prune -a`

app/vendor folder is missing, will be created using follow cmd inside php container
`composer update --no-scripts` 


### Use MySQL Workbench to access database

#### How to connect mysql workbench to running mysql inside docker
*https://stackoverflow.com/questions/33827342/how-to-connect-mysql-workbench-to-running-mysql-inside-docker*

Run following commands to get to the bash shell

`docker ps`
`docker exec -it <mysql container name> /bin/bash`

Inside the container, connect to mysql

`mysql -u root -p`

Create new user, set privileges

`CREATE USER 'user'@'%' IDENTIFIED BY 'pass';`
`GRANT ALL PRIVILEGES ON *.* TO 'user'@'%' WITH GRANT OPTION;`
`FLUSH PRIVILEGES;`

Use MySQL Workbench connection details

`SHOW GRANTS FOR 'user'@'localhost';`

### PHP version.
A bug will appear if PHP version is later then 8.1.0
`Return type of Microsoft\Graph\Model\Entity::jsonSerialize() should either be compatible with JsonSerializable::jsonSerialize(): mixed`

Set PHP version 8 in Dockerfil:

*Microsoft\Graph PHP use version 8.0 (PHP 8.1: Serializable deprecated)*

`FROM php:8.0-fpm`
