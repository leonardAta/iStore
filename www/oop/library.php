<?php
	
	class MYSQLConn {
		const db_host = "localhost";
		const db_name = "iBook";
		const user = "root";
		const db_pass = "THINKandflyy"; 
		protected $mysqli;
		protected $result;

	//open a connection to the database
		public function __construct() {
			$this->mysqli = new mysqli(self::db_host, self::user, self::db_pass, self::db_name);

			return $this->mysqli;

		}

		public function prepare($sql) {
			$this->result = new MYSQLResult($this->mysqli, $sql);

			return $this->result;
		}

	}

?>