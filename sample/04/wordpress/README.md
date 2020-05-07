# wordpress

## Run docker compose

```bash
docker-compose up -d
```

The docker-compose.yml in this directory is equal to the following commands.

```bash
docker run --name my-mysql1 -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql:5.7
docker run --name my-wordpress1 -e WORDPRESS_DB_PASSWORD=my-secret-pw --link my-mysql1:mysql -d -p 8888:80 wordpress
```

## Stop docker compose

```bash
docker-compose down
```
