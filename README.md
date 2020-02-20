# Assistente de Chamadas

Esta aplicação se trata de um assitente de documentação de ligações recebidas.

---

## Conteúdo

- [Conteúdo](#conteúdo)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Utilização](#utilização)
    - [Chamadas Normais](#chamadas-normais)
    - [Chamadas por Engano](#chamadas-por-engano)
    - [Documentação](#documentação)
        - [Informações Completas](#informações-completas)
        - [Informações em Uma Linha](#informações-em-uma-linha)
    - [Finalizar Chamada](#finalizar-chamada)

---

## Requisitos

Aplicação construida com as tecnologias:

- **PHP 7.4.2 (cli)**
- **Laravel Framework 6.15.1**
- **Composer 1.9.3**

Nenhuma extensão específica do PHP é utilizada.

Também não é usado nenhum banco de dados.

---

## Instalação

Após realizar o pull do projeto:

1. Atualizar as dependências.

```sh
composer update
```

---

## Utilização

A aplicação se trata de um formulário de contato, onde são inserido os dados de um contante de uma ligação.

Eles possuem duas seções:

1. **Chamada Normal**: Formulário para as chamadas normais recebidas.
2. **Chamada por Engano**: Formulário para as chamadas por engano recebidas.

No formulário existem `dados selecionaveis`, aqueles que são opcionais na documentação, e os `dados necessários`, aqueles que necessitam de alguma informação.

Após os preenchimento dos dados, existem duas possibilidades:

- **Documentação**
- **Finalização da Chamada**

### Chamadas normais

Os dados selecionaveis das `chamadas normais` incluem:

- **Nome**
- **Empresa**
- **Identificação**
    - ID
    - CNPJ
    - CPF
    - Domínio
    - E-Mail
    - Outros
- **Nùmero de Evento**
- **Número da Ligação**
- **Data da Ligação**

Os dados necessários das `chamadas normais` são:

- **Requisição**
    - RDS
    - IN
    - Transferência
- **Detalhes**

### Chamadas por Engano

Os dados selecionaveis das `chamadas por engano` incluem:

- **Nome**
- **Empresa**
- **Transferência**

Os dados necessários das `chamadas por engano` são:

- **Número da Ligação**
- **Data da Ligação**
- **Requisição**
- **Detalhes**

### Documentação

Após o preenchimento dos dados, é possível unir as informações e compacta-las e dois tipos de informações:

- **Informações Completas**
- **Informações em uma linha**

Ambas podem ser obtidas por botões que copiam o seu conteúdo para a área de transferência.

Na documentação das `chamadas por engano`, existe a opção de abertura de um chamado, no serviço específico para esse tipo de caso.

#### Informações Completas

Estas possuem todos os dados exibidos com quebras de linhas e os detalhes em sua formatação original.

Esses dados, quando copiados para a área de transferência, são exibidos da seguinte maneira:

```
Nome: João.
Empresa: Frutas da Serra.

CPF: 123.456.789-10.
Evento: 123456.

RDS: Desenvolver uma aplicação.

==================================================
Solicitado o desenvolvimento de uma aplicação.

A mesma foi desenvolvida.
==================================================

Nº: (11) 95555-0000.
Data: 01/01/2000 às 00:00.
```

É possível copiar apenas os detalhes, ficando visível da seguinte maneira:

```
Solicitado o desenvolvimento de uma aplicação.

A mesma foi desenvolvida.
```

#### Informações em Uma Linha

A última opção de documentação é resumida em apenas uma linha, onde todos os carácteres de quebra são substituídos por espaços, sendo exibidos da seguinte maneira:

```
- Nome: João. Empresa: Frutas da Serra. CPF: 123.456.789-10. Evento: 123456. RDS: Desenvolver uma aplicação. Solicitado o desenvolvimento de uma aplicação. A mesma foi desenvolvida. Nº: (11) 95555-0000. Data: 01/01/2000 às 00:00.   
```

### Finalizar chamada

Também é possível utilizar a aplicação apenas como guia durante uma ligação.

Para resetar o formulário, existe a opção `Finalizar Chamada`.

Quando escolhida, é exibido uma mensagem perguntando se deseja finalizar a chamada.
