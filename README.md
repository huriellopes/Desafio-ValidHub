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
- ViaCep
- DomPDF
- SweetAlert

## ⚒ Funcionalidades:

- Autenticação
- Carga de cartórios via XML
- Cadastro de cartório manualmente
- Atualização de cadastro do cartório
- Ativação e Inativação do cartório
- Relatório de Cartório com geração PDF

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
DB_CONNECTION=pgsql # default = mysql
DB_HOST=127.0.0.1
DB_PORT=5432 # default = 3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Atenção: Deve ser PostgreSQL e lembre-se de criar o schema/banco!
````

> Obs.: Caso queira utilizar docker, gá um docker-compose na raiz do projeto para startar dois containers,
>o do php e o do banco de dados, antes de startar, configure as credenciais do banco de dados!

````
environment:
 POSTGRES_USER: "postgres" ou "nome_user_desejado"
 POSTGRES_PASSWORD: "senha_desejada"
 POSTGRES_DB: "nome_banco"

# O banco de dados está isolado, apenas a aplicação acessa!
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

# Caso queira utilizar outro arquivo para dar carga no banco de dados pelo sistema, deve seguir o seguinte padrão de campos:

nome
razao
tipo_documento # 1 = Pessoa Física ou 2 = Pessoa Jurídica
documento
cep
endereco
bairro
cidade
uf
tabeliao
ativo # 1 = ativo ou 0 = inativo

# Exemplo abaixo:
<cartorios>
	<cartorio>
		<nome>Cartório 1</nome>
		<razao>Cartório da esquina</razao>
		<tipo_documento>2</tipo_documento>
		<documento>04470118000134</documento>
		<cep>35430313</cep>
		<endereco>Rua Rosa Maria Guimarães</endereco>
		<bairro>Rasa</bairro>
		<cidade>Ponte Nova</cidade>
		<uf>MG</uf>
		<tabeliao>Fulano de tal</tabeliao>
		<ativo>1</ativo>
	</cartorio>
<cartorios>
````

## Créditos

Empresa Valid - Pelo desafio proposto

Fabio Jânio - Pelas imagens que estão no docker-compose!

## 📝 Licença

Esse projeto está sob a licença MIT. Veja aqui [MIT](LICENSE)
