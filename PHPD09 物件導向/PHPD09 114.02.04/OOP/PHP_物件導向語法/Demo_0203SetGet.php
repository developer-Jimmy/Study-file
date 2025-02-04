<?php
 
$obj = new CTest();
$obj->weight = 100;
echo $obj->weight, "<br>";
$obj->place = "TaiChung";
echo $obj->place, "<br>";;
 
class CTest {
    public $weight = 1;
    private $dataBag = array();
 
    public function __set($varName, $varValue)
    {
        echo "__set: ", $varName, ": ", $varValue, "<br>";
        $this->dataBag[$varName] = $varValue;
    }
 
    public function __get($varName)
    {
        echo "__get: ", $varName, "<br>";
        return $this->dataBag[$varName];
    }
}
?>