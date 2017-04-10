<?php 

namespace Ovni;

class Ovnis 
{

    /**
     * @var @arrLetters array
     */
    private $arrLetters;

    public function __construct()
    {
        $this->setArrLetters(range('A', 'Z'));
    }

    /**
     * @return $arrLetters array
     */
    public function getArrLetters ()
    {
        return $this->arrLetters;
    }

    /**
     * @param $letters array
     */
    public function setArrLetters (array $letters) 
    {
        $this->arrLetters = $letters;
    }

    /**
     * Busca o número correspondente da letra
     * @param $letter char
     * @return int
     */ 
    public function searchLetterNumber($letter) 
    {
        for ($i = 0; $i < count($this->arrLetters); $i++) {
            if ($letter == $this->arrLetters[$i]) {
                return $i + 1;
            }
        }
    }

    /**
     * Converte palavra para inteiro conforme 
     * lógica previamente especificada
     * @param $word string
     * @return $result integer
     */
    public function convertWordToCodeNumber($word) 
    {
        $result = 1;
        for ($i = 0; $i < strlen($word); $i++) {
            $result *= $this->searchLetterNumber($word[$i]);
        }
        return $result;
    }

    /**
     * Retorna true caso o grupo seja desejado
     * @return boolean
     */
    public function isWantedGroup($comet, $group) 
    {
        return ($this->convertWordToCodeNumber($comet) % 45 == $this->convertWordToCodeNumber($group) % 45);
    }

    /**
     * Retorna o Grupo Indesejado
     * @param $groups array
     * @return $group string
     */
    public function unwantedGroup(array $groups) 
    {
        foreach ($groups as $comet => $group) {
            if (!$this->isWantedGroup($comet, $group)) {
                return $group;
            }        
        }
    }

}