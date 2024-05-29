<?php
    class Users {

        private $conn;

        public function __construct($db)
            {
                $this->conn = $db;
							
            }
       public function selectById($table, $parameter, $id){
		//var_dump($id);
		//die();
		$query = $this->conn->prepare("select * from $table WHERE $parameter='$id'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				  }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
		
        public function login($email, $password) 
            {
                $query = $this->conn->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
                $query->bindValue(':email', $email);
				$query->bindValue(':password', $password);
				//$query->bindValue(1,$username);

                try{
                    $query->execute();
					$numc=$query->rowCount();
					if($numc < 1){
					return false;	
					}
					else{
                    $data = $query->fetch();
					
					$stored_password = $data['password'];
                    //$user_session = $data['email'];
					$user_session = $data;
					return $user_session;
					
					 }
					 }
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }
            
             public function loginAdmin($email, $password) 
            {
                $query = $this->conn->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
                $query->bindValue(':email', $email);
				$query->bindValue(':password', $password);
				//$query->bindValue(1,$username);

                try{
                    $query->execute();
					$numc=$query->rowCount();
					if($numc < 1){
					return false;	
					}
					else{
                    $data = $query->fetch();
					
					$stored_password = $data['password'];
                    //$user_session = $data['email'];
					$user_session = $data;
					return $user_session;
					
					 }
					 }
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }
            
           /* public function UpdateOTP($otp){
                $query = $this->conn->prepare("UPDATE users SET password_otp='completed' WHERE password_otp='3434343434'");
                //$query->bindValue(':clearedx', 'updated');
				//$query->bindValue(':password_otp', $otp);
		        $query->execute();
		        return true;
            }
            */
            
           public function UpdateOTP($otp) {
    try {
        // Fetch the email from the table where password_otp matches $otp
        $emailQuery = $this->conn->prepare("SELECT email FROM users WHERE password_otp=:otp");
        $emailQuery->bindParam(':otp', $otp);
        $emailQuery->execute();
        $emailResult = $emailQuery->fetch(PDO::FETCH_ASSOC);

        if ($emailResult && isset($emailResult['email'])) {
            // Set the email to $_SESSION['email']
            $_SESSION['email'] = $emailResult['email'];

            // Update password_otp field
            $updateQuery = $this->conn->prepare("UPDATE users SET password_otp='otp_set' WHERE password_otp=:otp");
            $updateQuery->bindParam(':otp', $otp);
            $updateQuery->execute();

            // Check if any rows were affected by the update
            $rowCount = $updateQuery->rowCount();
            if ($rowCount > 0) {
                return true; // Update successful
            } else {
                return false; // No rows affected by the update
            }
        } else {
            return false; // Email not found or incorrect OTP
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}


            
             public function GenerateOTP($email) 
{
    // Check if the user with the provided email exists
    $checkUserQuery = $this->conn->prepare("SELECT * FROM users WHERE email=:email");
    $checkUserQuery->bindValue(':email', $email);

    try {
        $checkUserQuery->execute();
        $numRows = $checkUserQuery->rowCount();

        if ($numRows < 1) {
            // User not found, return false
            return false;
        } else {
            // Generate a unique 6-digit OTP
            $otp = sprintf("%06d", mt_rand(1, 999999));

            // Update the user's record with the generated OTP
            $updateQuery = $this->conn->prepare("UPDATE users SET password_otp=:password_otp WHERE email=:email");
            $updateQuery->bindValue(':email', $email);
            $updateQuery->bindValue(':password_otp', $otp);
            $updateQuery->execute();

            // Return the generated OTP as part of the true response
            return $otp;
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo $e->getMessage();
    }
}

     //Get user details
    public function userData($table, $email){
		$query = $this->conn->prepare("select * from {$table} where email='$email'");
		 try{
                   $query->execute();
				   return $fetch=$query->fetch(PDO::FETCH_ASSOC);
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }       
            
           public function UpdateNewPassword($newpassword, $otp) {
    try {
        $query = $this->conn->prepare("UPDATE users SET password_otp=:status, password=:newpass WHERE password_otp=:otp");
        $query->bindValue(':status', 'completed');
        $query->bindValue(':newpass', $newpassword);
        $query->bindValue(':otp', $otp);
        
        $query->execute();

        $rowCount = $query->rowCount();
        if ($rowCount > 0) {
            return true; // Update successful
        } else {
            return "Error: Failed to update password."; // Update failed
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}

            
			
			public function logout(){
				session_destroy();
				return true;
			}
			
			

      
    }


?>