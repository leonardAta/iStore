<?php 

	class sEmployee extends Employee {

		private $weeklySalary;
	
		public function __construct($name, $dept, $weeklySalary) {

			$this->name = $name;
			$this->dept = $dept;
			$this->weeklySalary = $weeklySalary;

		}

		public function calculateSalary() {
			
			$this->salary = $this->weeklySalary;

			echo "------------------";

			echo "<p>Name: ".$this->getName()."</p>";

			echo "<p>Dept: ".$this->getDept()."</p>";

			echo "<p>Salary: ".$this->getSalary()."</p>";

			echo "------------------";
		}





	}


?>