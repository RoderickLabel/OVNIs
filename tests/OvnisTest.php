<?php 

use PHPUnit\Framework\TestCase;
use Ovni\Ovnis;

class OvnisTest extends TestCase
{

    public function testSearchLetterNumber () 
    {
        $ovnis = new Ovnis();
        $number = $ovnis->searchLetterNumber("A");
        $this->assertEquals(1, $number);
        $number = $ovnis->searchLetterNumber("Z");
        $this->assertEquals(26, $number);
    }

    public function testConvertWordToCodeNumber ()
    {
        $ovnis = new Ovnis();
        $codeNumber = $ovnis->convertWordToCodeNumber("LARANJA");
        $this->assertEquals(30240, $codeNumber);
    }

    public function testIsWantedGroup () 
    {
        $ovnis = new Ovnis();
        $this->assertTrue($ovnis->isWantedGroup("HALLEY", "AMARELO"));
        $this->assertTrue($ovnis->isWantedGroup("WOLF", "PRETO"));
        $this->assertTrue($ovnis->isWantedGroup("KUSHIDA", "AZUL"));
    }

    public function testUnwantedGroup ()
    {
        $ovnis = new Ovnis();
        $groups = array(
            "HALLEY"  => "AMARELO",
            "ENCKE"   => "VERMELHO",
            "WOLF"    => "PRETO",
            "KUSHIDA" => "AZUL"
        );

        $this->assertEquals("VERMELHO", $ovnis->unwantedGroup($groups));
    }

}