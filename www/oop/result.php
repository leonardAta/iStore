<?php 

	class MYSQLResult {

		protected $sql;
		protected $resultSet;
		protected $query_string;
		protected $conn;
		const FETCH_ASSOC = 1;
		const FETCH_BOTH = 2;
		const FETCH_ARRAY = 3;

		public function __construct($conn, $sql) {
			$this->sql = $sql;
			$this->conn = $conn;
			
		}


			public function fetch($mode=1) {

				if($mode == 1){
					return mysqli_fetch_assoc($this->resultSet);

			}		

				if($mode == 2){
					return mysqli_fetch_array($this->resultSet);

			}		
					
				if($mode == 1){
					return mysqli_fetch_array($this->resultSet, MYSQLI_NUM);

			}

		}


		public function bindParam($format, $value) {

			$this->query_string = str_replace($format, $value, $this->sql);

		}

		public function execute() {

			$this->resultSet =  mysqli_query($this->conn, $this->query_string);

		}
	}


?>