# docker notes

## Hello Docker

The following command is the first step to confirm docker.

```bash
docker run hello-world
```

---

## Pull image from remote registry

```bash
docker pull centos:7
```

### Confirm images

```bash
docker image ls -a
```

### Run container with interactive shell

#### Centos

```bash
docker run -it --name my-centos1 centos:7 bash
```

#### Ubuntu

```bash
docker run -it --name my-ubuntu1 ubuntu:latest bash
```

### Confirm container

```bash
docker container ls -a
```

### Remove container

```bash
docker container rm my-centos1
```

### Start stopped container

```bash
docker start my-ubuntu1
```

### Attach to stopped container

```bash
docker exec -it my-ubuntu1 bash
```

---

## Build custom image

### Build interactively

#### Inside contaier 

```bash
apt-get update && apt-get install -y iputils-ping net-tools iproute2 dnsutils curl
```

#### Outside container

```bash
docker commit my-ubuntu1 my-ubuntu:0.1
```

### Build from Dockerfile

#### Build image

```bash
docker build -t practical-lab/docker-hello/sample03:1.0 .
```

#### Run container

```bash
docker run practical-lab/docker-hello/sample03:1.0
```

---

## Network

### Create network

```bash
docker network create my-network
```

### Confirm network

```bash
docker network ls
```

### Attach container to custom network

```bash
docker run -d --name webserver1 --network my-network nginx:latest
```

### Test custom network from container

```bash
docker run -it --rm --name net-tool --network my-network my-ubuntu:0.1 bash
```

#### check

```bash
nslookup webserver1
```

```bash
curl http://webserver1
```

### Test out of the box network from container

```bash
docker run -it --rm --name net-tool --network bridge my-ubuntu:0.1 bash
```

### Expose port to external network

```bash
docker run -d --name webserver1 -p 8080:80 nginx:latest
```

### Colaborate with AP and DB containers

#### Create network

```bash
docker network create apl-net
```

#### Launch MySQL

```bash
docker run -d --name mysql --network apl-net -e MYSQL_ROOT_PASSWORD=mysql57 mysql:5.7
```

#### Build custom php application image

```bash
docker build -t php-apl:0.1 .
```

#### Launch php applicatioin

```bash
docker run -d --name php --network apl-net -p 8081:80 -e MYSQL_USER=root -e MYSQL_PASSWORD=mysql57 php-apl:0.1
```

