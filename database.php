<?php
ob_start(); 

    class Database{
		private $host = "mysql:host=localhost;dbname=reddot";
		private $username = "root";
        private $password = "";
        public $dbcon;

		public function __construct(){
		     // Turn off error reporting for this part
       // error_reporting(0);

			//if(!isset($_SESSION['user_'])){header("Location: AuthLogin"); }
			
			
				//auto logout after system is idle for 15 minutes is added to the construct function in the user class since construct is called automatially if the class is instantiated during login
				
				$timeout = 15; // Set timeout for minutes
$logout_redirect_url = "Logout"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        header("Location: $logout_redirect_url");
    }

}
$_SESSION['start_time'] = time();
$_SESSION['secret']="PRHEMA";
		}
        //get the database connection
        public function getConnection() {

            $this->dbcon = null;

            try{
                $this->dbcon = new PDO($this->host,$this->username,$this->password);
				$this->dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//$this->conn = new PDO(mysql:host=$servername;dbname=myDB,$this->username,$this->password);
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->dbcon;
        }
		
	}
	
	



?>