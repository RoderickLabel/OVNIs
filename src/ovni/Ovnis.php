<?php 

namespace Ovni;

use ArrayObject;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
class Ovnis 
{

    /** 
     * @var array $arrLetters 
     */
    private $arrLetters;

    /**
     * @var array $groups
     */
    private $groups;


    public function __construct()
    {
        $this->arrLetters = range('A', 'Z');
        $this->groups = new ArrayObject();
    }

    /**
     * @return array $arrLetters
     */
    public function getArrLetters ()
    {
        return $this->arrLetters;
    }

    /**
     * @return array $groups Retorna um array de objetos Group
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Group $group
     */
    public function addGroup(Group $group)
    {
        $this->groups->append($group);
    }

    /**
     * Busca o número correspondente da letra
     * @param char $letter
     * @return int
     */ 
    public function searchLetterNumber($letter) 
    {
        return array_search($letter, $this->arrLetters) + 1;
    }

    /**
     * Converte palavra para inteiro conforme 
     * lógica previamente especificada
     * @param string $word
     * @return integer $result
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
     * @param ArrayObject $groups 
     * @return string $group
     */
    public function unwantedGroup(ArrayObject $groups) 
    {
        foreach ($groups as $group) {
            if (!$this->isWantedGroup($group->getComet(), $group->getGroup())) {
                return $group;
            }        
        }
    }

}