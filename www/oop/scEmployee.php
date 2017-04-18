<?php 
	
	class scEmployee extends Employee{
		const rate = .05;
		private $base;
		private $sales;

		public function __construct($name, $dept, $base, $sales) {

			$this->name = $name;
			$this->dept = $dept;
			$this->base = $base;
			$this->sales = $sales;
		}

		public function calculateSalary() {

			$commission = 0;
			$commission = $this->sales * self::rate;
			$newBase = ($this->base) + ($this->base * .1);
			$this->salary = $commission + $newBase;

			echo "------------------";

			echo "<p>Name: ".$this->getName()."</p>";

			echo "<p>Dept: ".$this->getDept()."</p>";

			echo "<p>Salary: ".$this->getSalary()."</p>";

			echo "------------------";
		}




	}


?>