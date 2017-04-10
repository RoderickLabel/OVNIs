# Desafio dos OVNIs
Teste para Desenvolvedor na Fundação Casper Líbero, foi escolhido o Desafio dos OVNIS, trata-se de uma simples aplicação CLI.

### Instalação

```
$ git clone https://github.com/RoderickLabel/OVNIs.git
```

### Dependências
  - [Aura/Cli](https://github.com/auraphp/Aura.Cli)
  - [League/Csv](https://github.com/thephpleague/csv)
```
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
