<?php
 
class CAnimal
{
   
    public function makeNoise()
    {
        echo "CAnimal: makeNoise";
    }
}
 
class LiveStuff
{
   
    public function makeNoise()
    {
        echo "LiveStuff: ...............";
    }
}
 
// $ctrlName = 'LiveStuff';
$ctrlName = 'CAnimal';
$obj = new $ctrlName;
$obj->makeNoise();