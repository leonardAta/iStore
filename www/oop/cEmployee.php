<?php 

	class cEmployee extends Employee {
		const rate = .05;
		private $sales;
	
		public function __construct($name, $dept, $sales) {

			$this->name = $name;
			$this->dept = $dept;
			$this->sales = $sales; 
		}

		public function calculateSalary() {

			$this->salary = self::rate * $this->sales;

			echo "------------------";

			echo "<p>Name: ".$this->getName()."</p>";

			echo "<p>Dept: ".$this->getDept()."</p>";

			echo "<p>Salary: ".$this->getSalary()."</p>";

			echo "------------------";
		}






	}



?>