<?php 

namespace Ovni;

/**
 * @author Rodrigo Ruotolo <roderickruotolo@gmail.com>
 */
class Group {

    /**
     * @param string $comet
     */
    private $comet;

    /**
     * @param string $group
     */
    private $group;
    
    /**
     * @param string $comet
     * @param string $group
     */
    public function __construct($comet, $group)
    {
        $this->comet = $comet;
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getComet()
    {
        return $this->comet;
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

}
