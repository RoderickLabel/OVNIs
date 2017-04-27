<?php
require_once (__DIR__ . "/../vendor/autoload.php");

use Aura\Cli\CliFactory;
use Aura\Cli\Status;
use League\Csv\Reader;
use Ovni\Group;
use Ovni\Ovnis;

$ovnis = new Ovnis();
$cli_factory = new CliFactory;

// Define opções para AuraCli.
$context = $cli_factory->newContext($GLOBALS);
$stdio = $cli_factory->newStdio();
$options = ['file,f'];
$getopt = $context->getopt($options);

// Obtém o valor do parametro filename e interrompe com msg caso este faltar.
$filename = $getopt->get(1);
if (!$filename || !is_file(__DIR__ . $filename)) {
    $stdio->errln("<<red>>Por gentileza indique o caminho de um arquivo válido!<<reset>>");
    exit(Status::USAGE);
}

/** 
 * Seta o caminho do arquivo CSV de acordo com parametro, parseia CSV, 
 * popula objetos Groups para a Classe OVNI, e retorna a resposta ao ecrã.
 */
if ($getopt->get('--file')) {
    
    $csv = Reader::createFromPath(__DIR__ . $filename);
    $res = $csv->setOffset(1)->setLimit(4)->fetchAll();

    foreach ($res as $row) {
        list($comet, $group) = $row;
        $ovnis->addGroup(new Group($comet, $group));
    }

    $answer = $ovnis->unwantedGroup($ovnis->getGroups());
    $stdio->outln("<<green>>O grupo que não será levado é o {$answer->getGroup()}.<<reset>>");
}

// done!
exit(Status::SUCCESS);