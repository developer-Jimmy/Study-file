<?php

interface IDrive {
	public function addSpeed($value);
	public function getSpeed();
}

interface IMonitor {
	public function getHistoryData();
}

class CMachine {
	
}

class CCar extends CMachine implements IDrive, IMonitor {
	private $_speed = 0;
	
	public function addSpeed($value) {
		$this->_speed += $value;
	}
	
	public function getSpeed() {
		return $this->_speed;		
	}
	
	public function getHistoryData() {
		return "test data";
	}
}

class CHobby {

}

// class Copier implements IScan, IPrint{

// }

class CGame extends CHobby implements IDrive {
	private $_speed = 0;

	public function addSpeed($value) {
		$this->_speed += $value * 10;
	}

	public function getSpeed() {
		return $this->_speed;
	}
}


$objCar = new CCar();
// $obj->addSpeed(5);
// echo "Car speed = ", $obj->getSpeed(), "<br>";

$objGame = new CGame();
// $obj->addSpeed(5);
// echo "Game speed = ", $obj->getSpeed(), "<br>";

function Drive($objImplDriveInterface) {
    $objImplDriveInterface->addSpeed(5);
    echo "Lab speed = ", $objImplDriveInterface->getSpeed(), "<br>";
}
 
Drive($objGame);

?>
