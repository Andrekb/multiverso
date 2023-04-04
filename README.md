## Instalação

```bash
git clone https://github.com/andrekb/multiverso multiverso
```

Na pasta do projeto
```bash
composer install
```

Após feito a instalação, criar o arquivo .env (usar o .example para a base)
```bash
mv .env.example .env
```

Gerar a key do projeto
```bash
php artisan key:generate
```

## Configuração
### Banco de dados

Configure os acessos do banco de dados
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multiverso
DB_USERNAME=root
DB_PASSWORD=
```
#### Migration
Após configurado o BD é preciso levantar as migrações utilizando o comando:
```bash
php artisan migrate
```

#### Seed
Com o banco criado é possível pegar dados previamente produzidos.
```bash
php artisan db:seed
```

### JWT (API)
É preciso gerar o jwt:secret para que a api funcione:
```bash
php artisan jwt:secret
```

> Pronto! A aplicação está funcional!



