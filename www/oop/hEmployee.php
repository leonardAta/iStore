<?php 

#include 'employee.php';

	class hEmployee extends Employee {
		
		const rate = 5;
		private $expectedHours;
		private $hoursWorked;


		public function __construct($expectedHours, $name, $dept, $hoursWorked) {
			
			$this->expectedHours = $expectedHours;
			$this->name = $name;
			$this->dept = $dept;
			$this->hoursWorked = $hoursWorked;
		}
	
		public function calculateSalary() {

			$overtime = 0;

			if($this->hoursWorked > $this->expectedHours) {
				$overtime = $this->hoursWorked - $this->expectedHours;
				$this->salary = ($overtime * self::rate) + ($this->expectedHours * self::rate);

			} else {
				$this->salary = self::rate * $this->hoursWorked;
			}

			echo "------------------";

			echo "<p>Name: ".$this->getName()."</p>";

			echo "<p>Dept: ".$this->getDept()."</p>";

			echo "<p>Salary: ".$this->getSalary()."</p>";

			echo "------------------";

		}



	}






?> 