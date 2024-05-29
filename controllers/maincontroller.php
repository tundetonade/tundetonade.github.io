<?php

    class General{

        private $conn;

        public function __construct($db)
            {
				if(!isset($_SESSION['user_'])){header("Location: AuthLogin"); }
                $this->conn = $db;
					
            }
      
	
	
		
}


?>