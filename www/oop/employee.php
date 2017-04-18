<?php 

abstract class Employee {

	protected $name;
	protected $dept;
	protected $salary;

	public function getName() {

		return $this->name;
	}

	public function setName($empName) {
		
		$this->name = $empName;

	}

	public function getDept() {

		return $this->dept;
	}

	public function setDept($deptName) {

		$this->name = $deptName;
	}

	public function getSalary() {

		return $this->salary;
	}

	abstract public function calculateSalary();
}




?>