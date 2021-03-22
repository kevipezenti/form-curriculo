
# Formulário de envio de currículo
## Sobre
A aplicação foi desenvolvida com o objetivo simples de enviar os dados do formulário, mais o arquivo para e-mail e persistir também as informações no banco de dados.
Foi desenvolvida em ambiente [*Linux - CentOS 8*](https://www.centos.org/), sobre o servidor web [*Apache 2*](https://www.apache.org/) e tecnologia [*PHP 7.4.15*](https://www.php.net/manual/pt_BR/intro-whatis.php)
## Instalação
**Banco de dados - tabela**
A tabela do projeto se encontra no diretório raiz, na pasta */db*, no arquivo *table.sql*.
> Exemplo para subir no MySQL
> ```bash
> $ mysql -u 'user' --database 'database_name' -p < ./db/table.sql
> ```
> >Obs.:
> >Apenas o script para o mysql está disponível.
> 
**Dependências**
Utilize o gerenciador de pacotes [composer](https://getcomposer.org/) para instalar as dependências da aplicação.

```bash
$ composer install
```
**Configurações**
No diretório *config/app*, renomeie o arquivo de configuração *Config-example.php*  para  *Config.php*.

> Exemplo:
>```bash
>$ mv Config-example.php Config.php
>```
Altere os valores conforme a necessidade do ambiente.
## Uso
Acesse a aplicação na mesma URL fornecida no arquivo de configuração: *Config.php*.
>O padrão é *http://localhost:8080*.


## Contribuições
Solicitações pull são bem-vindas. Para mudanças importantes, abra um problema primeiro para discutir o que você gostaria de mudar.

## License
[MIT](https://choosealicense.com/licenses/mit/)
