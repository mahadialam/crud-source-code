<?php 
	
	Class Database{

		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $dbname = DB_NAME;

		public $link; // Database connection property
		public $error; // Database connection fail property

		public function __construct(){

			$this->connectDB();
		}

		private function connectDB(){

			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

			if (!$this->link) {
				$this->error = "Connection fail.".$this->llink->connect_error;
				return false;
			}
		}

		// Select or Read Data
		public function select($query){
			$result = $this->link->query($query) or die ($this->link->connect_error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}else {
				return false;
			}
		}

		// Create or Insert Data
		public function insert($query){
			$row_insert = $this->link->query($query) or die ($this->link->connect_error.__LINE__);
			if ($row_insert) {
				header("Location: index.php?msg=".urlencode("Data inserted successfully."));
				exit();
			}else{
				die("Error: (".$this->link->connect_errno.")".$this->link->connect_error);
			}
		}

		// Update Data
		public function update($query){
			$row_update = $this->link->query($query) or die ($this->link->connect_error.__LINE__);
			if ($row_update) {
				header("Location: index.php?msg=".urlencode("Data updated successfully."));
				exit();
			}else{
				die("Error: (".$this->link->connect_errno.")".$this->link->connect_error);
			}
		}

		// Delete Data
		public function delete($query){
			$row_delete = $this->link->query($query) or die ($this->link->connect_error.__LINE__);
			if ($row_delete){
				header("Location: index.php?msg_delete=".urlencode("Data deleted successfully"));
				exit();
			}else {
				die("Error: (".$this->link->connect_errno.")".$this->link->connect_error);
			}
		}
	}

?>