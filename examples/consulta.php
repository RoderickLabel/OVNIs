<?php
require_once (__DIR__ . "/../vendor/autoload.php");

use Aura\Cli\CliFactory;
use Aura\Cli\Status;
use League\Csv\Reader;
use Ovni\Ovnis;
use Ovni\CommandHelp;

$ovnis = new Ovnis();
$cli_factory = new CliFactory;

$context = $cli_factory->newContext($GLOBALS);
$stdio = $cli_factory->newStdio();

// define opções e argumentos nomeados através de getopt
$options = ['file,f'];
$getopt = $context->getopt($options);

// obtém o valor do parametro file
$filename = $getopt->get(1);

if (!$filename || !is_file(__DIR__ . $filename)) {
    $stdio->errln("<<red>>Por gentileza indique o caminho de um arquivo válido!<<reset>>");
    exit(Status::USAGE);
}

/** 
 * Seta o caminho do arquivo CSV de acordo com o valor 
 * passado via parametro na app ou o valor default
 */
if ($getopt->get('--file')) {
    // Abre o arquivo especificado no param, parseia CSV, e padroniza para a Classe OVNI
    $csv = Reader::createFromPath(__DIR__ . $filename);
    $res = $csv->setOffset(1)->setLimit(4)->fetchAll();
    $groups = array();
    foreach ($res as $row) {
        $groups[$row[0]] = $row[1];
    }
    // Retorna a resposta ao ecrã
    $answer = $ovnis->unwantedGroup($groups);
    $stdio->outln("<<green>>O grupo que não será levado é o {$answer}<<reset>>");
}

// done!
exit(Status::SUCCESS);