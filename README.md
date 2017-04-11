# Desafio dos OVNIs
Teste para Desenvolvedor na Fundação Casper Líbero, foi escolhido o [Desafio dos OVNIS](https://bitbucket.org/casperlibero/fcl-dev-test/src/59cec30479ead0e80d3f38bc79475fe3efd6a253/TESTE-3.md), trata-se de uma simples aplicação CLI.

### Instalação

```
$ git clone https://github.com/RoderickLabel/OVNIs.git
```

### Dependências
  - [Aura/Cli](https://github.com/auraphp/Aura.Cli)
  - [League/Csv](https://github.com/thephpleague/csv)

Como as dependências já encontram-se inclusas no arquivo composer.json basta entrar no diretório criado e resolver as dependências via composer rodando os seguintes comandos:
```
$ cd OVNIs/
$ composer update
```

### Rodando os testes
```
$ phpunit --colors  --bootstrap vendor/autoload.php tests
```

### Rodando o cliente cli
```
$ php examples/consulta.php -f /../data/cometas.csv
```
