# Integração API Mercado Livre

## Objetivo

Este projeto realiza a integração com a API do Mercado Livre, permitindo ao usuário cadastrar produtos em uma aplicação criada na plataforma Mercado Livre Developer.


## Funcionalidades desta Aplicação
Todas as funcionalidades exigidas no **enunciado** foram desenvolvidas, inclusive as **funcionalidades bônus.** Abaixo seguem as principais funcionalidades deste projeto:

1. Principais Funcionalidades
    - Formulário para cadastro de um novo produto.
    - Envio das informações do produto para a API do Mercado Livre.
    - Exibição da resposta retornada pela API (se o produto foi criado com sucesso ou se houve algum erro).    

2. Funcionalidades Bônus
    1. Implementação de um sistema de autenticação no Laravel para proteger o acesso ao formulário de cadastro de produtos.
        - Login do Usuário
        - Cadastro de novo Usuário
        - Edição do cadastro do Usuário
        - Recuperação de Senha do Usuário

    - Validação de dados no formulário (ex: preços negativos, descrição vazia, etc.).
    - Utilização de um framework CSS (ex: Bootstrap ou Tailwind) para melhorar a interface.

## Imagem - Formulário de Cadastro de Produtos
Esta é a tela principal do nosso sistema. Nela, temos a criação do nosso token, o cadastro de produtos e as respostas retornadas pela API.

![Image](https://github.com/user-attachments/assets/8154caa6-6a33-41f8-abe5-0a06d8f86b7c)

## Informações adicionais
<b>Nesta seção, gostaria de informar alguns detalhes sobre este projeto!</b>

<b>Sistema Operacional</b>: Este projeto foi desenvolvido no Windows 11.

<b>Mercado Livre HTTPS</b>: Durante o desenvolvimento deste projeto, foram identificados alguns empecilhos devido às exigências do Mercado Livre. Por exemplo, o protocolo HTTPS: o Mercado Livre não permite o cadastro de produtos se o parâmetro REDIRECT_URI não utilizar o protocolo HTTPS.

<b>Mercado Livre Imagens</b>: Outra questão é sobre as imagens que você salva no cadastro de produtos. O Mercado Livre não armazena as imagens em seus servidores. Para cadastrar uma imagem no produto, você precisa de um serviço que hospede a imagem e, em seguida, gere a URL que será salva nesse cadastro.<br />

Foi utilizado o serviço de hospedagem do <b>ImgBB</b>, um serviço web para hospedagem de imagens.<br />

<b>nGrok:</b> Qual é o papel desta ferramenta? com o nGrok, esse problema com o protocolo HTTPS foi resolvido, com ele conseguimos criar um <b>Tunnel HTTPS</b> que simula um endereço <b>REAL</b> na internet com o <b>protocolo HTTPS</b>, essa foi a solução mais adequada que encontrei para atender a exigencia do Mercado Livre em usar somente o HTTPS no Cadastro.

<b>Todo esse fluxo foi implementado no sistema. No formulário de cadastro, o usuário escolhe a imagem e envia. Produto cadastrado!</b>

## Ferramentas utilizadas
- Linguagem PHP v8
- Laravel Framework v11
- MySQL v8
- Tailwind CSS v3
- API Mercado Livre 
- nGrok (Ferramenta usada para criar Tunnels com HTTPS)

## Requisitos essenciais
Para executar este projeto em sua máquina, é essencial que você tenha instaladas todas as ferramentas listadas abaixo, pois, sem elas, o projeto pode não funcionar corretamente.
- Servidor Web HTTP(WampServer, Xampp, etc.)
- Linguagem PHP (Se você instalou o WampServer ou Xampp o PHP já vem instalado junto)
- MySQL (Novamente se você instalou o WampServer ou Xampp o MySQL já vem instalado junto)
- nGrok (A necessidade desta ferramenta surgiu por causa das exigências da API do Mercado Livre, que não permite o cadastro de URLs com o protocolo HTTP, somente HTTPS.)    

## Instalação dos requisitos essenciais
<b>Nos links abaixo, você pode realizar o download das ferramentas informadas acima.</b>

WampServer: [Página de Download](https://wampserver.aviatechno.net/)
<br />
Xampp: [Página de Download](https://www.apachefriends.org/pt_br/index.html)
<br />
nGrok: [Página de Download](https://ngrok.com/download)

## Vamos começar? Instalação do projeto
<b>Vamos agora dar início à instalação deste projeto em sua máquina de desenvolvimento. Siga os passos abaixo.</b>

### 1. Clonar o Repositório
```
git@github.com:matheushnogueira/teste-integracao-api-mercado-livre.git
cd /teste-integracao-api-mercado-livre
```

### 2. Instalar Dependências
```
composer install
```

### 3. Configurar o Arquivo `.env`
Crie um arquivo `.env` a partir do `.env.example` e configure as variáveis de ambiente.
```
cp .env.example .env
```
Edite o arquivo `.env` para incluir suas configurações de banco de dados, use este exemplo:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados - para este aplicativo o nome é: db_produtos
DB_USERNAME=seu_usuario - para este aplicativo o usuário é: root
DB_PASSWORD=sua_senha - para este aplicativo a senha é:
```

### 4. Gerar a Chave da Aplicação
```
php artisan key:generate
```

### 5. Criar o Banco de Dados e as Tabelas do Sistema
<b>O comando abaixo deve funcionar tanto no PowerShell quanto no CMD e no Bash do Linux! Ele automatiza a resposta 'yes'.</b>
```
echo "yes" | php artisan migrate
```
>Com a execução deste comando, o banco de dados `db_produtos` é automaticamente criado, assim como a tabela `produto`, que armazena todo o histórico dos produtos cadastrados no sistema.

## Configuração do ambiente .env e Mercado Livre 
<b>Agora que você já executou todos os passos acima, vamos dar início à configuração dos parâmetros obrigatórios do sistema e do Mercado Livre.</b>

### 1. Arquivo `.env`
<b>Neste arquivo, temos 4 parâmetros obrigatórios que devem ser preenchidos. São eles:</b>
```
APP_URL=<URL_GERADA_PELO_NGROK> -> URL Da Aplicação

CLIENT_ID=<SEU_CLIENT_ID_DO_MERCADO_LIVRE>
SECRET_KEY=<SEU_SECRET_KEYS_DO_MERCADO_LIVRE>
REDIRECT_URI=<URL_GERADA_PELO_NGROK>/produto/token
```
> Os parâmetros `<CLIENT_ID>` e `<SECRET_KEY>` podem ser obtidos no painel de controle das suas aplicações criadas no Mercado Livre. No caso do parâmetro `<REDIRECT_URI>`, ele deve ser fornecido no momento em que você está criando uma nova aplicação. Siga as instruções abaixo para obter e fornecer este parâmetro.

<b>Imagens de como obter esses dois parâmetros</b>

### 1. Criar aplicação mercado livre



https://developers.mercadolivre.com.br/pt_br/crie-uma-aplicacao-no-mercado-livre

> Logo depois de seguir o passo a passo, basta editar uma delas e obter esses parâmetros.


### 2. Parametros

![Image](https://github.com/user-attachments/assets/025eda3c-2dfc-493c-ab2a-6bea1790a3c8)

> Aqui você pode ver, marcado em vermelho, os parâmetros mencionados acima. Agora, basta copiá-los e atualizar o seu arquivo `.env` com esses valores.

### Mercado Livre - Parametros
<b>Quais são os parâmetros que devem ser fornecidos no Mercado Livre? Quando você cria uma nova aplicação, o Mercado Livre exige que dois parâmetros sejam informados. São eles: `REDIRECT_URI` (a URL que retorna o usuário para a aplicação após obter o Token de Acesso) e a URL de retorno para as notificações do Mercado Livre (este não é exatamente um parâmetro, mas sim a mesma URL que redireciona o usuário para sua aplicação. Obs: se preferir, pode fornecer outra URL).</b>
> Mais abaixo temos instruções de como preencher esses dois campos, pois para obter este valor precisamos antes executar o nGrok e pegar sua URL

<b>Imagens do formulário da edição de uma aplicação no Mercado Livre</b>
### 1. Formulário de Edição do Parâmetro `REDIRECT_URI`

![Image](https://github.com/user-attachments/assets/1cc19b64-94a9-4a80-9ca1-05153b9b5f1a)

### 2. Formulário de Edição do Campo para a URL de Notificações

![Image](https://github.com/user-attachments/assets/9ba8f1df-51c9-41b1-8931-45c89376551d)

> Esses são os parâmetros obrigatórios que devemos preencher na criação de uma aplicação no Mercado Livre.

## Como obter a URL do sistema e incluí-la no nosso arquivo `.env` e no cadastro de uma nova aplicação no Mercado Livre

<b>Agora vamos executar nossa aplicação, obter sua URL, atualizar o arquivo `.env` e criar uma nova aplicação no Mercado Livre com a URL gerada.</b>

### 1. Executando o Servidor do Laravel
```
composer run dev
```
> Para que tudo corra perfeitamente bem, neste projeto usamos o servidor do próprio Laravel. É nele que o nGrok irá responder às requisições na porta 8000.

### 2. Configurar o Token do nGrok
```
ngrok config add-authtoken <SEU_TOKEN_NGROK>
```

### 3. Executando o nGrok para obter a URL com o HTTPSm
<b>OBS: É importante que o servidor do Laravel esteja em execução antes do nGrok!</b>
```
ngrok http http://localhost:8000
```

Após executar o comando acima, você terá a seguinte saída, temos a nossa URL gerada. Você pode vê-la no destaque em vermelho, veja abaixo:

![Image](https://github.com/user-attachments/assets/726a0283-396b-4efc-ac52-c10556e8bc0e)


Copie essa URL, pois será ela que usaremos para criar a aplicação no Mercado Livre e atualizar nosso arquivo `.env`.

### Atualizando o arquivo `.env`
Agora que você já tem a URL gerada, atualize o arquivo `.env`. Como visto nas instruções acima, atualize os parâmetros.
```
APP_URL=<URL_GERADA_AQUI>
REDIRECT_URI=<URL_GERADA_AQUI>/produto/token
```

### Criar a aplicação no Mercado Livre DevCenter
<b>Acesse o site do Mercado Livre DevCenter [ML DevCenter](https://developers.mercadolivre.com.br/devcenter) e faça login em sua conta. Depois, crie uma nova aplicação. No formulário de cadastro, nos campos 'URIs de redirect' e 'URL de retornos de chamada de notificação', informe a URL que você copiou anteriormente gerada pelo nGrok.</b>

Após criar a aplicação, você terá acesso aos dois parâmetros do Mercado Livre.
```
CLIENT_ID=
SECRET_KEY=
```
> Como você viu nos passos acima, após criar a aplicação, basta copiar esses parâmetros gerados pelo Mercado Livre e atualizar o seu arquivo `.env` com esses valores.

### Finalmente! Executando a Aplicação
<b>Se todos os passos acima foram seguidos corretamente, não teremos nenhum problema para executar nossa aplicação.</b>

Como executar nossa aplicação? Para executar esta aplicação, basta abrir o seu navegador e colar a URL gerada pelo nGrok. Se tudo estiver correto, você verá a seguinte página:

## Imagens

### 1. Página inicial do nGrok:

![Image](https://github.com/user-attachments/assets/efadb4bd-38c8-44e6-866a-6f1a95099b06)

>Se você se deparar com esta página, está tudo bem! Clique no botão 'Visit Site' e você será redirecionado para a página inicial da nossa aplicação.

### 2. Tela de Login da Aplicação:

![Image](https://github.com/user-attachments/assets/03a74e5e-b0b5-4d5e-9d3e-f4ade8370821)

> Essa é a página inicial da nossa aplicação. Caso você não tenha um usuário, clique no link 'Não tem uma conta?'.

### 3. Tela de Cadastro de Usuário da Aplicação:

![Image](https://github.com/user-attachments/assets/71c4aa1f-5d59-4e40-84e4-84e5ddcb5a87)

> Essa é a tela de cadastro de novos usuários.


### 4. Cadastro de Produtos e Obtenção do Token de Acesso à API:
<b>Como você pode ver nesta página, temos um botão para realizar login. Esse login se refere ao Mercado Livre e será através dele que iremos obter o token. Caso o login não seja feito, o formulário de cadastro de produtos não será habilitado, e, com isso, não será possível cadastrar nenhum produto.</b>

![Image](https://github.com/user-attachments/assets/8154caa6-6a33-41f8-abe5-0a06d8f86b7c)

<b>É neste botão que a autenticação via OAuth entra em ação.</b>
> Essa é a tela principal da nossa aplicação. Será aqui que iremos cadastrar os produtos no nosso banco de dados e no Mercado Livre.

## Considerações Finais
<b>Foi realmente muito desafiador criar esta solução, devido às regras do Mercado Livre. Mas boa parte de tudo o que eu expliquei poderia ter sido evitada se houvesse um domínio na web com HTTPS e SSL. Não seria necessária toda essa explicação.</b>

---
### Referências

- **PHP 8.0**  
  [documentação oficial do PHP 8.0](https://www.php.net/releases/8.0/).

- **Laravel 11**  
  [documentação oficial do Laravel](https://laravel.com/docs).


- **nGrok**  
  [nGrok - Docs](https://ngrok.com/docs/).

- **API do Mercado Livre**  
  [Documentação da API do Mercado Livre](https://developers.mercadolivre.com.br/pt_br/itens-e-buscas).

- **Autenticação OAuth Mercado Livre**  
  [Autenticação OAuth](https://developers.mercadolivre.com.br/pt_br/autenticacao-e-autorizacao).
  