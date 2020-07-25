# 💻 Desafio PHP Pleno ValidHub

> Desafio proposto do processo seletivo de vaga de Analista Dev PHP Pleno, o cliente **Anoreg** (Associação que cuida dos interesses e representa os cartórios 
>em situações judiciais e outrs), atualmente o cliente utiliza Excel para manter a base de cartórios atuliazada, o mesmo 
>recebe um arquivo xml e precisa abrir o arquivo para atualizar o seu excel! Pensando nisso, foi desenvolvido um sistema 
>que faz a leitura do xml para dar carga no banco de dados, deixando apenas o email e o telefone para o usuário atualizar,
>o mesmo podendo também cadastrar um cartório manualmente, ativar e inativar o cartório via listagem, sendo assim, não 
>precisando mais de excel para ter seu controle!

## ⚠ Requisitos:

- PHP >= 7.2.5
- Node.Js >= 12.13.1
- NPM >= 6.13.4
- PostgreSQL >= 12.2

##### Deve ter o ambiente para o laravel configurado:

- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


## 📝 O que foi utilizado?

- Laravel 7.* (última versão)
- PostgreSQL
- Jquery
- Bootstrap
- Jquery Mask
- Jquery Validate
- Jquery BlockUI
- DataTables
- FontAwesome
- Moment
- SweetAlert

## ⚡ Mão na massa: 

> Você pode realizar o clone deste repositório ou baixar o arquivo .zip!

##### Clone este repositório:

````
git clone https://github.com/huriellopes/Desafio-ValidHub.git
````

Para baixar o zip: [https://github.com/huriellopes/Desafio-ValidHub/archive/master.zip](https://github.com/huriellopes/Desafio-ValidHub/archive/master.zip)

## ✔ Executando a aplicação:

##### Na raiz do projeto, execute os comandos:

````
# Para instalar as dependências do Laravel
componser install

# Para instalar as dependecias do node_modules
npm install && npm run dev
```` 

##### Copie e configure as variaveis de ambiente no arquivo .env:

````
# Para copiar o .env.example para .env
copy .env.example .env ou cp .env.example .env

# Para gerar a key do projeto
php artisan key:generate

# configure as seguintes variaveis de ambiente
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Atenção: Deve ser PostgreSQL e lembre-se de criar o schema/banco!
````

##### Depois de configurar as variaveis de ambiente, ainda no raiz do projeto, execute os comandos:

````
# Para rodar as migrates e seeds
php artisan migrate --seed

# Caso queira desafazer
php artisan migrate:rollback

# Para rodar o servidor embutido
php artisan serve

# Irá executar na seguinte url, abra no navegador
http://localhost:8000

# Para acessar o sistema, use as seguintes credenciais
👨 ‍Login: admin@email.com
🔐 Senha: secret

# Para testar a carga dos cartórios pelo xml, utilize o arquivo na pasta: exemplo/cartorios.xml
````

## Créditos

Empresa ValidHub

## 📝 Licença

Esse projeto está sob a licença MIT. Veja aqui [MIT](LICENSE)
