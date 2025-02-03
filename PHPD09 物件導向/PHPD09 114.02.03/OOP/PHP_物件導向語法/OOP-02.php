<?php
 
$obj = new Canimal();
$obj->makeNoise();
 
class CAnimal {
 
    function __construct($weightValue = 0) {
        echo "Object Created.<br>";
    }
 
    private $_weight = 1;
 
    public function makeNoise() {
        echo "Animal: ...<br />";
    }
 
    public function setWeight($value)
    {
        if ($value >= 0)
            $this->_weight = $value;
    }
   
    public function getWeight()
    {
        return $this->_weight;
    }
 
}