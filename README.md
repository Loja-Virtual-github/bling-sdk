# Introdução

Esta SDK foi desenvolvida com intuito de facilitar a integração de alguns módulos do Bling.
Você pode acessar a documentação oficial do Bling neste [link](https://ajuda.bling.com.br/hc/pt-br/categories/360002186394-API-para-Desenvolvedores).

## Índice

- [Instalação](#instalação)
- [Configuração](#configuração)
- [Limites](#limites)
- [Funcionalidades](#funcionalidades)
    - [Campos customizados](#campos-customizados)
    - [Categoria](#categoria)
    - [Categoria loja](#categoria-loja)
    - [Contato](#contato)
    - [Depósito](#depósito)
    - [Nota fiscal](#nota-fiscal)
    - [Pedido](#pedido)
    - [Produto](#produto)
    - [Produto loja](#produto-loja)
    - [Situação](#situação)

## Instalação

Para instalar a SDK você pode usar o comando

`composer require pablosanches/bling-sdk`

ou você pode adicionar diretamente no seu composer.json
```json
require": {  
  "pablosanches/bling-sdk": "*"
},
```

## Configuração

Para incluir a biblioteca em seu projeto, basta fazer o seguinte:

```php
<?php
require('vendor/autoload.php');

$bling = new PabloSanches\Bling::client('seu-token');
```

Caso você queria fazer as integrações de multiloja do Bling, você pode inicializar a biblioteca da seguinte forma:

```php
<?php
require('vendor/autoload.php');

$bling = new PabloSanches\Bling::client('seu-token', 'id-da-loja-fornecido-pelo-bling');
```

E então, você pode poderá utilizar o cliente para fazer requisições ao Pagar.me, como nos exemplos abaixo.

## Limites

Esta SDK segue todos os limites impostos pelo Bling de acordo com a documentação abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046302394-Limites).

Esta SDK também já consta com um sistema de paginação transparente, logo não é preciso se preocupar, todos os endpoints que utilizam o método GET já contém um sistema de paginação automático que retornará todos os registros de forma uniforma e transparente.

## Funcionalidades

### Campos customizados

Nesta seção será explicado como utilizar os campos customizados do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360008209553-Campo-Customizado-API-para-desenvolvedores).

#### Criando um campo customizado

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->campo_customizado()
		->insert($payload);
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Atualizando um campo customizado

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->campo_customizado()
		->update($payload);
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Deletando um campo customizado

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->campo_customizado($idCampoCustomizado)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```


#### Retornando todos os campos customizados de um determinado módulo

Para retornar todos os campos customizados de um módulo em específico, basta seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047001693-GET-camposcustomizados-m%C3%B3dulo-).

```php
<?php
try {
	$modulo = 'Vendas';
	$retorno = $bling
		->campo_customizado($modulo)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Retornando todos os campos customizados

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->campo_customizado()
		->fetchAll();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

### Categoria

Nesta seção será explicado como utilizar as categorias do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360006764773-Categoria-API-para-desenvolvedores).

#### Criando uma nova categoria

Para criar uma nova categoria do bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047063493-POST-categoria).

```php
<?php
try {
	$payload = array(); // Dados da categoria
	$retorno = $bling
		->categoria()
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando uma categoria

Para atualizar uma categoria do bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047063513-PUT-categoria-idCategoria-).

```php
<?php
try {
	$payload = array(); // Dados da categoria
	$idCategoria = 123;
	$retorno = $bling
		->categoria($idCategoria)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```
#### Deletando uma categoria

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->categoria($idCategoria)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```


#### Retornando todos as categorias

Para retornar todas as categorias do bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047063293-GET-categorias).

```php
<?php
try {
	$retorno = $bling
		->categoria()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Retornando uma categoria em específico

Para retornar os dados de uma categoria em específico no bling, basta para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047063413-GET-categoria-idCategoria-).

```php
<?php
try {
	$idCategoria = 123;
	$retorno = $bling
		->categoria($idCategoria)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Categoria Loja

Nesta seção será explicado como utilizar os vínculos de multilojas de categorias do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360006764633-Categorias-Loja-API-para-desenvolvedores).

Para trabalhar com funcionalidades "multiloja", você precisa configurar seu cliente da SDK com o token e o id da loja fornecido pela configuração de integrações do Bling.

```php
<?php
require('vendor/autoload.php');

$token = 'seu-token';
$idLojaVinculo = 123123;
$bling = new PabloSanches\Bling::client($token, $idLojaVinculo);
```

#### Criando um novo vínculo de categorias

Para criar um novo vínculo de categoria, basta seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046424014-POST-categoriasLoja-idLoja-).

```php
<?php
try {
	$idCategoria = 123;
	$payload = array();
	$retorno = $bling
		->categoria_loja($idCategoria)
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando um vínculo de categorias

Para atualizar um vínculo de categoria basta você seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047064553-PUT-categoriasLoja-idLoja-idCategoria-).

```php
<?php
try {
	$idCategoria = 123;
	$payload = array();
	$retorno = $bling
		->categoria_loja($idCategoria)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Deletando um vínculo de categorias

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->categoria_loja($idCategoria)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todos os vínculos de categoria

Para buscar todos os vínculos de categoria criados no bling, basta seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046423874-GET-categoriasLoja-idLoja-).

```php
<?php
try {
	$retorno = $bling
		->categoria_loja()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando um vínculos em específico de categoria

Para buscar um vínculo específico de categoria no bling, basta seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046423874-GET-categoriasLoja-idLoja-).

```php
<?php
try {
	$idCategoria = 123;
	$retorno = $bling
		->categoria_loja($idCategoria)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Contato

Nesta seção será explicado como utilizar a funcionalidade de contatos do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360008209633-Contatos-API-para-desenvolvedores).

#### Criando um novo contato

Para criar um novo contato no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046378614-POST-contato).
```php
<?php
try {
	$payload = array(); // Dados do contato
	$retorno = $bling
		->contato()
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando um contato

Para atualizar um contato no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046378874-PUT-contato-id-).

```php
<?php
try {
	$idContato = 123;
	$payload = array(); // Dados do contato
	$retorno = $bling
		->contato($idContato)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Deletando um contato

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->contato($idContato)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todos os contatos cadastrados no Bling

Para buscar todos os contatos cadastrados no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047013853-GET-contatos).

```php
<?php
try {
	$retorno = $bling
		->contato()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando um contato em específico no Bling

Para buscar um contato em específico no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046378234-GET-contato-identificador-).

```php
<?php
try {
	$retorno = $bling
		->contato($idContato)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Depósito

Nesta seção será explicado como utilizar a funcionalidade de depósitos do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360006764753-Dep%C3%B3sitos-API-para-desenvolvedores).

#### Criando um novo contato

Para criar um novo depósito no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046423614-POST-deposito).

```php
<?php
try {
	$payload = array(); // Dados do depósito
	$retorno = $bling
		->deposito()
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando um depósito

Para criar um novo depósito no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046423674-PUT-deposito-idDeposito-).

```php
<?php
try {
	$idDeposito = 123;
	$payload = array(); // Dados do depósito
	$retorno = $bling
		->deposito($idDeposito)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Deletando um depósito

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->deposito($idDeposito)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todos os depósitos cadastrados no Bling

Para buscar todos os depósitos cadastrados no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046423574-GET-depositos).

```php
<?php
try {
	$retorno = $bling
		->deposito()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando um depósito em específico no Bling

Para buscar um contato em específico no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047063813-GET-deposito-idDeposito-).

```php
<?php
try {
	$retorno = $bling
		->deposito($idDeposito)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Nota Fiscal

Nesta seção será explicado como utilizar a funcionalidade de nota fiscal do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360008117354-Notas-fiscais-API-para-desenvolvedores).

#### Criando uma nova nota fiscal

Para inserir uma nota fiscal no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047015633-POST-notafiscal).

```php
<?php
try {
	$payload = array(); // Dados da nota fiscal
	$retorno = $bling
		->nota_fiscal()
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando uma nota fiscal

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->nota_fiscal($idNotaFiscal)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Deletando uma nota fiscal

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->nota_fiscal($idNotaFiscal)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todas as notas fiscais cadastradas no Bling

Para buscar todos os depósitos cadastrados no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046379394-GET-notasfiscais).

```php
<?php
try {
	$retorno = $bling
		->nota_fiscal()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando uma nota fiscal específica no bling

Para buscar um contato em específico no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046379674-GET-notafiscal-numero-serie-).

```php
<?php
try {
	$numero = 123;
	$serie = 1;
	$retorno = $bling
		->nota_fiscal($numero, $serie)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Pedido

Nesta seção será explicado como utilizar a funcionalidade de pedidos do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360008117394-Pedidos-API-para-desenvolvedores).

#### Criando um novo pedido

Para criar um novo pedido no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047064693-POST-pedido).

```php
<?php
try {
	$payload = array(); // Dados do pedido
	$retorno = $bling
		->pedido()
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando um pedido

Para atualizar um pedido no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047064653-PUT-pedido-numero-).

```php
<?php
try {
	$idPedido = 123;
	$payload = array(); // Dados do pedido
	$retorno = $bling
		->pedido($idDeposito)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Deletando um pedido

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->pedido($idPedido)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todos os pedidos cadastrados no Bling

Para buscar todos os pedidos cadastrados no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046424094-GET-pedidos).

```php
<?php
try {
	$retorno = $bling
		->pedido()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando um pedido em específico no Bling

Para buscar um pedido em específico no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047064633-GET-pedido-numero-).

```php
<?php
try {
	$retorno = $bling
		->pedido($idPedido)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Produto

Nesta seção será explicado como utilizar a funcionalidade de produtos do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360008117414-Produtos-API-para-desenvolvedores).

#### Criando um novo produto

Para criar um novo produto no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046422774-POST-produto).

```php
<?php
try {
	$payload = array(); // Dados do produto
	$retorno = $bling
		->produto()
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando um produto

Para atualizar um produto no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046422994-POST-produto-codigo-).

```php
<?php
try {
	$idProduto = 123;
	$payload = array(); // Dados do produto
	$retorno = $bling
		->produto($idProduto)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Deletando um produto

Para atualizar um produto no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047062873-DELETE-produto).
```php
<?php
try {
	$idProduto = 123;
	$retorno = $bling
		->produto($idProduto)
		->delete();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando todos os produtos cadastrados no Bling

Para buscar todos os produtos cadastrados no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046422714-GET-produtos).

>Caso o cliente desta SDK tenha cido inicializada com os dados de multiloja, automaticamente todos os produtos retornaram com seus vínculos caso existam.

```php
<?php
try {
	$retorno = $bling
		->produto()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando um produto em específico no Bling

Para buscar um pedido em específico no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046422734-GET-produto-codigo-).
```php
<?php
try {
	$retorno = $bling
		->produto($idProduto)
		->fetch();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

### Produto Loja

Nesta seção será explicado como utilizar os vínculos de multilojas de produtos do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360006733314-Produto-Loja-API-para-desenvolvedores).

Para trabalhar com funcionalidades "multiloja", você precisa configurar seu cliente da SDK com o token e o id da loja fornecido pela configuração de integrações do Bling.

```php
<?php
require('vendor/autoload.php');

$token = 'seu-token';
$idLojaVinculo = 123123;
$bling = new PabloSanches\Bling::client($token, $idLojaVinculo);
```

#### Criando um novo vínculo de produto

Para criar um novo vínculo de categoria, basta seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360047062813-POST-produtoLoja-idLoja-codigo-).

```php
<?php
try {
	$idProduto = 123;
	$payload = array();
	$retorno = $bling
		->produto_loja($idProduto)
		->insert($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Atualizando um vínculo de produto

Para atualizar um vínculo de produto basta você seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046422594-PUT-produtoLoja-idLoja-codigo-).

```php
<?php
try {
	$idProduto = 123;
	$payload = array();
	$retorno = $bling
		->produto_loja($idProduto)
		->update($payload);
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Deletando um vínculo de produto

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->produto_loja($idProduto)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todos os vínculos de produto

Para buscar todos os vínculos de produto criados no bling, basta seguir o exemplo abaixo:
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046422614-GET-produto-codigo-).

```php
<?php
try {
	$retorno = $bling
		->produto_loja()
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando um vínculos em específico de produto

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$retorno = $bling
		->produto_loja()
		->fetchAll();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

### Situação

Nesta seção será explicado como utilizar a funcionalidade de situações do Bling nesta SDK.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/sections/360006733334-Situa%C3%A7%C3%B5es-API-para-desenvolvedores).

#### Criando uma nova situaçao

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$payload = array();
	$retorno = $bling
		->situacao()
		->insert($payload);
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Atualizando uma situação

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$payload = array();
	$retorno = $bling
		->situacao($idSituacao)
		->update($payload);
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Deletando uma situação

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$payload = array();
	$retorno = $bling
		->situacao($idSituacao)
		->delete();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

#### Buscando todos as situações de um módulo

Para buscar todas as situações de um módulo no bling para seguir o exemplo abaixo.
[Link da documentação](https://ajuda.bling.com.br/hc/pt-br/articles/360046304394-GET-situacao-m%C3%B3dulo-).

```php
<?php
try {
	$retorno = $bling
		->situacao('Venda')
		->fetchAll();
} catch (\Exception $e) {
	var_dump($e->getMessage());
}
```

#### Buscando uma situação em específico no Bling

Esta funcionalidade ***não*** foi disponibilizado pela API do Bling, logo quando você tentar executar esta ação você receberá uma ***exception*** dizendo que este endpoint está indisponível.

```php
<?php
try {
	$payload = array();
	$retorno = $bling
		->situacao($idSituacao)
		->fetch();
} catch (InvalidEndpointException $e) {
	var_dump($e->getMessage()); // Esta funcionalidade está indisponível.
}
```

Enjoy it ;)