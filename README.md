Clube Envios API
==============

Documentação
------------

Segue a baixo o link com as instruções de consumo da API

- [Documentação API](https://documenter.getpostman.com/view/21977186/2sAY4rEjvF).

Requerimentos
------------
  
>1\. PHP 7.4 ou superior
>2\. Composer
>3\. Banco de Dados MySQL
>4\. Git


Instalação
------------
**1\. Clonar o repositório**
Primeiro, abra o terminal ou prompt de comando e use o comando `git clone` para clonar o repositório.

```console
 git clone --branch producao https://github.com/MatheusOscary/ClubeEnvios.git
```

**2\. Navegue até o repositório clonado**
Após clonar o repositório, entre no diretório do projeto:

```console
 cd ClubeEnvios
```

**3\. Instale as Dependências do Projeto**
Este projeto provavelmente utiliza o Composer para gerenciar suas dependências PHP. Se você já tiver o Composer instalado, execute o seguinte comando no diretório do projeto:

```console
 composer install
```
**4\. Configure o banco de dados**
Extra o arquivo [clubeenvios.sql.zip](clubeenvios.sql.zip) e importe o banco de dados.

Após isso configure sua conexão no [global.php](config/autoload/global.php)

```php
 return [
    'db' => [
        'adapters' => [
            'Database' => [
                'driver' => 'Pdo_Mysql',
                'hostname' => 'localhost',
                'database' => 'clubeenvios',
                'username' => 'root',
                'password' => '',
            ],
        ]
    ]
 ]
```
**7\. Criar pasta de cache**
Caso a pasta `data/chache` no diretório,
crie a mesma.

```console
 mkdir data\cache
```

**6\. Inicie o servidor web**

```console
 php -S localhost:8000 -t public/
```
Caso tenha seguidos todos passos descritos,
a API já estará funcionando, utilize [Documentação API](https://documenter.getpostman.com/view/21977186/2sAY4rEjvF) para se orientar sobre o consumo da mesma.