

### Passo a passo
por ssh 
```sh
git clone git@github.com:denison/Laravel-10--com-php-8.git app-laravel
```


```sh
cd app-laravel
```

Entrar na Branch Correta
```sh
git checkout development
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```
APP_NAME=NomeApp
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Fora do container pode ser preciso rodar
to usando o node 16.20.1
```sh
npm install 
npm run dev
```

Importar o banco que esta na raiz do projeto


Acesse o projeto
[http://localhost](http://localhost)
