<?php
 
$obj = new CDog(5, 500);
$obj->makeNoise();
echo $obj->getWeight(), "<br>";
echo $obj->getPrice(), "<br>";
 
class CAnimal {
 
    function __construct($weightValue = 0) {
        echo "Object Created.<br>";
        $this->setWeight($weightValue);
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
 
 
// extends parent::
class CDog extends CAnimal {
    function __construct($weightValue = 0, $priceValue = 0) {
        parent::__construct($weightValue);
        $this->setPrice($priceValue);
    }
 
    private $_price = 0;
    public function setPrice($value)
    {
        if ($value >= 0)
            $this->_price = $value;
    }
    public function getPrice()
    {
        return $this->_price;
    }
 
    public function makeNoise() {
        parent::makeNoise();
        echo "Dog: Wan! Wan!<br />";
    }
}
 