<?php
 
$obj = new Canimal();
$obj->makeNoise();
$obj->weight = 5;
echo $obj->weight, "<br />";
$obj->place = "TaiChung";
echo $obj->place, "<br />";
 
class CAnimal {
 
    // private $weight = 1;
    public $weight = 1;
 
    public function makeNoise() {
        echo "Animal: ...<br />";
    }
 
}
 