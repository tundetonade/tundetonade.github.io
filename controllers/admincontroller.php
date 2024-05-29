<?php

    class Admin{

        private $conn;

        public function __construct($db)
            {
				if(!isset($_SESSION['user_'])){header("Location: AuthLogin"); }
                $this->conn = $db;
					
            }
      
		
        public function insert($table, $parameters) 
            {
				
				$par=implode(',',array_keys($parameters));
				$parz=':'.implode(',:',array_keys($parameters));
				$query = $this->conn->prepare("INSERT INTO $table ($par) VALUES ($parz)");
				foreach($parameters as $key => $value){
				$query->bindValue(':'.$key, $value);
				}

        try{
                   return $query->execute();
						
					 }
					
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }
			
			
			//Fetch all products between date range
    public function selectAll($table, $startdate, $enddate){
		
		$query = $this->conn->prepare("select * from {$table} WHERE datetime BETWEEN '$startdate' and '$enddate' order by id desc");
		
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   	
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	public function selectAllGroupBy($table, $field){
    $query = $this->conn->prepare("SELECT MAX(id) AS id, $field FROM {$table} GROUP BY $field ORDER BY id DESC");
    try {
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

//Dynamic Select By ID Query Function
   /** public function selectById($table, $parameter, $id){
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
	**/
	
	//Dynamic Select By ID Query Function
public function selectById($table, $parameterOrConditions, $id = null){
    // Check if $parameterOrConditions is an associative array
    if (is_array($parameterOrConditions)) {
        // Construct the WHERE clause with multiple conditions
        $whereClause = '';
        foreach ($parameterOrConditions as $parameter => $value) {
            $whereClause .= "$parameter = '$value' AND ";
        }
        $whereClause = rtrim($whereClause, "AND "); // Remove the last "AND"
    } else {
        // Use the provided parameter and id as a single condition
        $parameter = $parameterOrConditions;
        $whereClause = "$parameter = '$id'";
    }

    // Prepare and execute the query
    $query = $this->conn->prepare("SELECT * FROM $table WHERE $whereClause");
    try {
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

	
	//Dynamic Select All By ID Query Function
    public function selectAllById($table, $parameter, $id){
	
		$query = $this->conn->prepare("select * from {$table} WHERE $parameter='$id' order by id desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   	
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	
	public function grandTotal($table, $field, $parameter, $id) {
    try {
        $query = $this->conn->prepare("SELECT SUM($field) AS total FROM {$table} WHERE $parameter = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)['total'];
    } catch(PDOException $e) {
        // Log or handle the exception appropriately
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function totalAmount($table, $field) {
    try {
        $query = $this->conn->prepare("SELECT SUM($field) AS total FROM {$table}");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)['total'];
    } catch(PDOException $e) {
        // Log or handle the exception appropriately
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/**
public function updateDynamic($table, $updates, $idField, $idValue) {
    $fields = array_keys($updates);
    $setStatements = implode('=?, ', $fields) . '=?';
    $query = $this->conn->prepare("UPDATE $table SET $setStatements WHERE $idField=?");

    // Bind parameters
    $i = 1;
    foreach ($updates as $value) {
        $query->bindValue($i++, $value);
    }
    $query->bindValue($i, $idValue);

    try {
        return $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
**/

public function updateDynamic($table, $updates, $conditionsOrField, $idOrValue = null) {
    // Check if $conditionsOrField is an associative array
    if (is_array($conditionsOrField)) {
        // Construct the WHERE clause with multiple conditions
        $whereClause = '';
        foreach ($conditionsOrField as $parameter => $value) {
            $whereClause .= "$parameter = ? AND ";
        }
        $whereClause = rtrim($whereClause, "AND "); // Remove the last "AND"
    } else {
        // Use the provided field and value as a single condition
        $whereClause = "$conditionsOrField = ?";
        $conditionsOrField = [$conditionsOrField => $idOrValue];
    }

    // Construct the SET statements
    $fields = array_keys($updates);
    $setStatements = implode('=?, ', $fields) . '=?';

    // Construct the full query
    $query = $this->conn->prepare("UPDATE $table SET $setStatements WHERE $whereClause");

    // Bind parameters for SET statements
    $i = 1;
    foreach ($updates as $value) {
        $query->bindValue($i++, $value);
    }

    // Bind parameters for WHERE clause
    foreach ($conditionsOrField as $value) {
        $query->bindValue($i++, $value);
    }

    try {
        return $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



	
			//Dynamic Select By ID Query Function
    public function selectProductAmount($table, $parameter, $id){
		
		$query = $this->conn->prepare("select * from products WHERE product_name='$id'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   //var_dump($fetchadmin);
					//die();
				    			
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
	
	//Fetch all products between date range
    public function allProducts($table, $startdate, $enddate){
		
		//$query = $this->conn->prepare("select * from {$table} WHERE product_name='Hivorex HD FL 7000' && datetime BETWEEN '$startdate' and '$enddate' order by id desc");
		//$query = $this->conn->prepare("select * from {$table} WHERE product_name='Hivorex HD FL 7000'||product_name='Exceed 1018' && datetime BETWEEN '$startdate' and '$enddate' order by id desc");
		$query = $this->conn->prepare("select * from {$table} WHERE datetime BETWEEN '$startdate' and '$enddate' order by id desc");
		
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   	
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
		
			
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
	

//generate wallet balance
    public function walletBalance($table, $email){
		$query = $this->conn->prepare("select * from {$table}");
		 try{
                   $query->execute();
				   return $fetch=$query->fetch(PDO::FETCH_ASSOC);
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	

//total remittance
    public function remittance($table, $email){
	$year=date('Y-01-01');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select sum(amount) as remit from $table WHERE status='Paid'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
    
    
    //total help requested
    public function requestHelp($table, $email){
	$year=date('Y-01-01');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select sum(amount) as help from $table WHERE type='Paid'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	

//total paye demand
    public function payeDemand($table, $email){
		$query = $this->conn->prepare("select sum(anual_tax) as payedemand from {$table} where email='$email' && payment_status='Pending'");
		 try{
                   $query->execute();
				   return $fetch=$query->fetch(PDO::FETCH_ASSOC);
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }		
		
//total transaction demand
    public function transactionDemand($table, $email){
		$query = $this->conn->prepare("select sum(amount) as transdemand from {$table} where email='$email' && status='Pending'");
		 try{
                   $query->execute();
				   return $fetch=$query->fetch(PDO::FETCH_ASSOC);
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	

//total transaction count
    public function transactionCount($table, $email){
		$query = $this->conn->prepare("select * from {$table}");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
    //Dynamic Select All Query Function
    public function selectExtraDocument($table, $email){
		$query = $this->conn->prepare("select * from {$table} where email='$email' order by id desc");
		 try{
                   $query->execute();
				   return $fetch=$query->fetchAll(PDO::FETCH_ASSOC);
				   //return $fetch=$query->fetch();
				    }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    } 
    
    //total transaction count
    public function totalApplicants($table){
		$query = $this->conn->prepare("select * from {$table}");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
    
    //total assignees count
    public function totalAssignees($table, $email, $startdate, $enddate){
		$query = $this->conn->prepare("select * from {$table} where email='$email' AND datetime BETWEEN '$startdate' and '$enddate'");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
    
     //total assignees count for today
    public function todayAssignees($table, $email, $startdate, $enddate){
        $today=date('Y-m-d');
		$query = $this->conn->prepare("select * from {$table} where email='$email' AND datetime='$today'");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
    
    
    //this month Assignees
    public function monthAssignees($table, $email, $startdate, $enddate){
		$month=date('Y-m-01');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select * from $table WHERE datetime BETWEEN '$month' and '$currentdate'");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
    
    	//this year Assignees
    public function yearAssignees($table, $email, $startdate, $enddate){
		$year=date('Y-01-01');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select * from $table WHERE datetime BETWEEN '$year' and '$currentdate'");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
 
 public function byAdmins($table, $startdate, $enddate){
$query = $this->conn->prepare("SELECT * FROM $table WHERE datetime BETWEEN '$startdate' and '$enddate'order by id desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}   

public function myAssignees($table, $startdate, $enddate, $email){
$query = $this->conn->prepare("SELECT * FROM $table WHERE email='$email' AND datetime BETWEEN '$startdate' and '$enddate'order by id desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}   
    
    //total transaction count
    public function requestCount($table, $email){
		$query = $this->conn->prepare("select * from {$table} where type='requesthelp'");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
    
    
	
	//Consultan't Pending Request COunt
    public function consultantPending($table){
		$query = $this->conn->prepare("select * from {$table} where usertype='consultant' && (consultant_status='requested'||consultant_status='pending')");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
	
	//Consultan't Pending Request COunt
    public function consultantObjection($table){
		$query = $this->conn->prepare("select * from {$table} where objection !=''");
		 try{
                   $query->execute();
				   return $query->rowCount();
				   }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
//Today's transactons
    public function todayTransactions($table, $email){
		$today=date('Y-m-d');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select sum(amount) as Today from $table WHERE datetime BETWEEN '$today' and '$currentdate' && status='Paid'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }

//this month transactions
    public function monthTransactions($table, $email){
		$month=date('Y-m-01');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select sum(amount) as Month from $table WHERE datetime BETWEEN '$month' and '$currentdate' && status='Paid'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	
	//this year transactons
    public function yearTransactions($table, $email){
		$year=date('Y-01-01');
		$currentdate=date('Y-m-d');
		$query = $this->conn->prepare("select sum(amount) as Year from $table WHERE datetime BETWEEN '$year' and '$currentdate' && status='Paid'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	
	
	
	//insert paye calculator
	 public function payeCalculator($table, $taxableIncome, $month, $parameters) 
            {
				 if($taxableIncome <= 300000) {
      $PAYE = 0.07 * $taxableIncome;
    } elseif ($taxableIncome <= 600000) {
      $taxableIncomeRemainder = $taxableIncome - 300000;
      $PAYE = (0.07 * 300000) + (0.11 * $taxableIncomeRemainder);
    } elseif ($taxableIncome <= 1100000) {
      $taxableIncomeRemainder = $taxableIncome - 600000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * $taxableIncomeRemainder);
    } elseif ($taxableIncome <= 1600000) {
      $taxableIncomeRemainder = $taxableIncome - 1100000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * 500000) + (0.19 * $taxableIncomeRemainder);
    } elseif ($taxableIncome <= 3200000) {
      $taxableIncomeRemainder = $taxableIncome - 1600000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * 500000) + (0.19 * 500000) + (0.21 * $taxableIncomeRemainder);
    } else {
      $taxableIncomeRemainder = $taxableIncome - 3200000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * 500000) + (0.19 * 500000) + (0.21 * 1600000) + (0.24 * $taxableIncomeRemainder);
    }
	$anual_tax = $PAYE;
	$monthly_tax=$anual_tax / $month;
	$parameters['anual_tax'] = $anual_tax;
	$parameters['monthly_tax'] = $monthly_tax;
	$emailx=$parameters['email'];
	$user_id=$parameters['user_id'];
	$query = $this->conn->prepare("delete from $table where user_id='$user_id' && email='$emailx'");
	$query->execute();
	
				$par=implode(',',array_keys($parameters));
				$parz=':'.implode(',:',array_keys($parameters));
				$query = $this->conn->prepare("INSERT INTO $table ($par) VALUES ($parz)");
				foreach($parameters as $key => $value){
				$query->bindValue(':'.$key, $value);
				}
		$query->execute();	
		$query = $this->conn->prepare("select * from {$table} where user_id='$user_id' && email='$emailx'");
        try{
                   $query->execute();
				   return $fetch=$query->fetch(PDO::FETCH_ASSOC);
				    }
					
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }
	
		
	
		//Dynamic Select By ID Query Function
   public function selectAssignedStatus($table, $id, $stageid){
    //var_dump($id);
    //die();

    $query = $this->conn->prepare("SELECT COUNT(*) as rowCount FROM $table WHERE applicant_email = :id AND stage = :stageid AND status='0'");
    $query->bindParam(':id', $id);
    $query->bindParam(':stageid', $stageid);

    try {
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        // Return the number of rows
        return $result['rowCount'];
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

     public function selectAssignedStatusx($table, $id, $stageid){
		//var_dump($id);
		//die();
		$query = $this->conn->prepare("select * from $table WHERE applicant_email ='$id' && stage=$stageid");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				  }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
    
    public function selectAssignedStatusAdmin($table, $id, $stageid, $email){
    try {
        $query = $this->conn->prepare("SELECT COUNT(*) as rowCount FROM $table WHERE applicant_email = :id AND stage = :stageid AND email = :email AND status = '0'");
        $query->bindParam(':id', $id);
        $query->bindParam(':stageid', $stageid);
        $query->bindParam(':email', $email);

        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Return the row count
        return $result['rowCount'];
    } catch(PDOException $e) {
        // Log the error instead of echoing
        error_log($e->getMessage());
        // Return an appropriate value or throw an exception if needed
        return -1; // Replace with an appropriate default value
    }
}

 public function selectAssignedStatusAdminx($table, $id, $stageid, $email){
    try {
        $query = $this->conn->prepare("SELECT * FROM $table WHERE applicant_email = :id AND stage = :stageid AND email = :email AND status = '0'");
        $query->bindParam(':id', $id);
        $query->bindParam(':stageid', $stageid);
        $query->bindParam(':email', $email);

        $query->execute();
      return  $result = $query->fetch(PDO::FETCH_ASSOC);

       
    } catch(PDOException $e) {
        // Log the error instead of echoing
        error_log($e->getMessage());
        // Return an appropriate value or throw an exception if needed
        return -1; // Replace with an appropriate default value
    }
}

	
	
//direct assessment
 public function insertDirectAssessment($table, $taxableIncome, $parameters) 
            {
				
				if($taxableIncome <= 300000) {
      $PAYE = 0.07 * $taxableIncome;
    } elseif ($taxableIncome <= 600000) {
      $taxableIncomeRemainder = $taxableIncome - 300000;
      $PAYE = (0.07 * 300000) + (0.11 * $taxableIncomeRemainder);
    } elseif ($taxableIncome <= 1100000) {
      $taxableIncomeRemainder = $taxableIncome - 600000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * $taxableIncomeRemainder);
    } elseif ($taxableIncome <= 1600000) {
      $taxableIncomeRemainder = $taxableIncome - 1100000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * 500000) + (0.19 * $taxableIncomeRemainder);
    } elseif ($taxableIncome <= 3200000) {
      $taxableIncomeRemainder = $taxableIncome - 1600000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * 500000) + (0.19 * 500000) + (0.21 * $taxableIncomeRemainder);
    } else {
      $taxableIncomeRemainder = $taxableIncome - 3200000;
      $PAYE = (0.07 * 300000) + (0.11 * 300000) + (0.15 * 500000) + (0.19 * 500000) + (0.21 * 1600000) + (0.24 * $taxableIncomeRemainder);
    }
 
   // return $PAYE;
	$annual_tax = $PAYE;
	//var_dump($annual_tax);
				//die();
	//$monthly_tax=$anual_tax / $month;
	$parameters['annual_tax'] = $annual_tax;
	$emailx=$parameters['email'];
	$user_id=$parameters['user_id'];
	$query = $this->conn->prepare("delete from $table where user_id='$user_id' && email='$emailx'");
	$query->execute();
				$par=implode(',',array_keys($parameters));
				$parz=':'.implode(',:',array_keys($parameters));
				$query = $this->conn->prepare("INSERT INTO $table ($par) VALUES ($parz)");
				foreach($parameters as $key => $value){
				$query->bindValue(':'.$key, $value);
				}

        try{
                   return $query->execute();
						
					 }
					
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }
	
	//Dynamic Select By ID Query Function
    public function payStatus($table, $parameter, $id){
		
		$query = $this->conn->prepare("select payment_status from {$table} WHERE $parameter='$id' LIMIT 1");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   //var_dump($fetchadmin);
					//die();
				    			
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	//Dynamic Select By ID Query Function
    public function selectById2($table, $parameter, $parameter2, $id, $id2){
		
		$query = $this->conn->prepare("select * from {$table} WHERE $parameter='$id' || $parameter2='$id2'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   //var_dump($fetchadmin);
					//die();
				    			
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }


public function updateMain($table, $field, $value, $id, $parameter){
	//var_dump($parameter);
	//die();
		$query = $this->conn->prepare("update $table set $field='$value' WHERE $id='$parameter'");
		 try{
                 return  $query->execute();
				    	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	
//Dynamic Select All Company PAYE By ID Query Function
    public function allPAYE($table, $parameter, $id){
		
		$query = $this->conn->prepare("select * from {$table} WHERE $parameter='$id'");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   	
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
	
	//Dynamic Select All Company PAYE By ID Query Function
    public function allTransactions($table, $startdate, $enddate, $parameter, $id){
		
		$query = $this->conn->prepare("select * from {$table} WHERE datetime BETWEEN '$startdate' and '$enddate'&& $parameter='$id' && status='Paid' order by id desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   	
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }	
	
	
	//function to search any parameter
    public function searchResult($table, $search){
		$query = $this->conn->prepare("select * from {$table} WHERE name RLIKE '[[:<:]]" . $search  . "[[:>:]]' or phone RLIKE '[[:<:]]" . $search  . "[[:>:]]' or email RLIKE '[[:<:]]" . $search  . "[[:>:]]'");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   //var_dump($fetchadmin);
					//die();
				    			
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	
	//Update Function
    public function update($table, $id_column, $id_value, $parameters){
        $new_array = array_map(function ($key, $val){
            return $key." = '".$val."'" ;
        }, 
		
		array_keys($parameters), array_values($parameters));
        $query= sprintf(
            'update %s set %s where %s',
            $table,
            implode(', ', $new_array),
            $id_column.' = '.$id_value);
			$statement = $this->conn->prepare($query);
			//$statement = $this->pdo->prepare($sql);
			try{
                   return $statement->execute();
				   		}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
       
    }
	
	//Update Function
    public function updatex($table, $id_column, $id_value, $parameters){
		
		//var_dump($id_column);
		//die();
        $new_array = array_map(function ($key, $val){
            return $key." = '".$val."'" ;
        }, array_keys($parameters), array_values($parameters));
       
		$query= sprintf(
            "update %s set %s where %s",
            $table,
            implode(', ', $new_array),
            $id_column.' = '.$id_value);
			// var_dump($id_value);
		//die();
			$statement = $this->conn->prepare($query);
			//$statement = $this->pdo->prepare($sql);
			try{
                   return $statement->execute();
				   		}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
       
    }
	
	//Update Function
    public function update_wallet($table, $id_column, $id_value, $email, $parameters){
		$amount=$parameters['amount'];
        $new_array = array_map(function ($key, $val){
            return $key." = '".$val."'" ;
        }, array_keys($parameters), array_values($parameters));
        $query= sprintf(
            'update %s set %s where %s',
            $table,
            implode(', ', $new_array),
            $id_column.' = '.$id_value);
			$statement = $this->conn->prepare($query);
			$statement->execute();

			$query= $this->conn->prepare("select * from wallet_balance WHERE email='$email'");
			$query->execute();
			$numc=$query->rowCount();
			if($numc < 1){
				$userid=$_SESSION['user_']['user_id'];
				$name=$_SESSION['user_']['name'];
				$name=$_SESSION['user_']['phone'];
				date_default_timezone_set('Africa/Lagos');
				$datetime = date('Y-m-d');
				$date=date("l jS \of F Y h:i:s A");
			$query = $this->conn->prepare("INSERT INTO wallet_balance (user_id, email, name, phone, balance, datetime, date) VALUES ('$userid', '$email', '$name', '$phone', '$amount', '$datetime', '$date')");	
				try{
                   return $query->execute();
				   		}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
			}
			else{
			$query= $this->conn->prepare("select * from wallet_balance WHERE email='$email'");
			$query->execute();
			$fetch=$query->fetch();
			$old_amount=$fetch['balance'];
			$new_amount=$old_amount + $amount;
				$query = $this->conn->prepare("update wallet_balance set balance='$new_amount' where email='$email'");	
				try{
                   return $query->execute();
				   		}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
			}
			    }

//sum of each PAYE
public function sumPAYE($table, $email, $user_id){
$query = $this->conn->prepare("select sum(basic) as basic, sum(housing) as housing, sum(transport) as transport, sum(entertainment) as entertainment, sum(meal) as meal, sum(wardrobe) as wardrobe,
sum(leavex) as leavex, sum(remote) as remote, sum(productivity) as productivity, sum(others) as others, sum(voluntary_pension) as voluntary_pension, sum(life_assurance_premium) as life_assurance_premium, sum(gratuities) as gratuities,
sum(bht) as bht, sum(pension_amount) as pension_amount, sum(nhf_amount) as nhf_amount, sum(nhis_amount) as nhis_amount, sum(total_exemption) as total_exemption, sum(gi) as gi, sum(gi2) as gi2, sum(cra) as cra, sum(chargeable_income) as chargeable_income, 
sum(total_removeable) as total_removeable, sum(taxableIncome) as taxableIncome, sum(anual_tax) as anual_tax, sum(monthly_tax) as monthly_tax from $table WHERE company_email='$email'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
}	

public function sumOutstanding($table, $email, $user_id){
$query = $this->conn->prepare("SELECT state, company_email, sum(outstanding_paye) as tax FROM $table WHERE company_email='$email' GROUP BY state");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}

public function stateGraph($table, $startdate, $enddate){
$query = $this->conn->prepare("SELECT state as state, sum(amount) as amount FROM $table WHERE datetime BETWEEN '$startdate' and '$enddate'  GROUP BY state order by state desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}


public function allStages($table) {
    $stageCounts = array();

    $query = $this->conn->prepare("SELECT depot_name, SUM(quantity) as total_quantity FROM $table GROUP BY depot_name");

    try {
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $depot_name = $row['depot_name'];
            $total_quantity = $row['total_quantity'];
            $stageCounts[$depot_name] = $total_quantity;
        }

        return $stageCounts;
    } catch (PDOException $e) {
        echo "Error executing query: " . $e->getMessage();
        return false; // or handle the error in an appropriate way
    }
}


public function revenueGraph($table, $startdate, $enddate){
$query = $this->conn->prepare("SELECT revenue as revenue, sum(amount) as amount FROM $table WHERE datetime BETWEEN '$startdate' and '$enddate' GROUP BY revenue order by revenue desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}

public function payChannelGraph($table, $startdate, $enddate){
$query = $this->conn->prepare("SELECT payment_channel as paychannel, sum(amount) as amount FROM $table WHERE datetime BETWEEN '$startdate' and '$enddate' GROUP BY payment_channel order by payment_channel desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}

public function sectorGraph($table, $startdate, $enddate){
$query = $this->conn->prepare("SELECT sector as sector, sum(amount) as amount FROM $table WHERE datetime BETWEEN '$startdate' and '$enddate' GROUP BY sector order by sector desc");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}



public function switchPieChart($table){
$query = $this->conn->prepare("SELECT payment_channel as switch, sum(amount) as amount FROM $table GROUP BY payment_channel");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}	
}

 public function insertPAYE($table, $email, $amount, $parameters) 
            {
			//check available balance once more and subtract if there is enough balance
			$query = $this->conn->prepare("select * from wallet_balance where email='$email'");
			$query->execute();
            $fetch=$query->fetch(PDO::FETCH_ASSOC);
			$balance=$fetch['balance'];
			if(($balance > $amount) || ($balance == $amount)){
			$newbalance=$balance - 	$amount;
			$query = $this->conn->prepare("update wallet_balance set balance='$newbalance' where email='$email'");
			$query->execute();
			}
			else{
				return false;
				die();
			}
				
			//update payment status on the calculator	
			$query = $this->conn->prepare("update paye_calculator set payment_status='Paid' where company_email='$email'");
			$query->execute();
			
			function random_usn( $length = 8 ) {
  //  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
      $chars = "01234567890123456789012345678901234567890123456789012345678901234567890123456789";

    $ranusn = substr( str_shuffle( $chars ), 0, $length );
    return $ranusn;
}
$referenceid=random_usn(8);
$parameters['referenceid'] = $referenceid;

				$par=implode(',',array_keys($parameters));
				$parz=':'.implode(',:',array_keys($parameters));
				$query = $this->conn->prepare("INSERT INTO $table ($par) VALUES ($parz)");
				foreach($parameters as $key => $value){
				$query->bindValue(':'.$key, $value);
				}

        try{
                   return $query->execute();
						
					 }
					
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }
			
			//sum of each PAYE
public function payeSum($table, $startdate, $enddate, $revenue, $email){
$query = $this->conn->prepare("select sum(amount) as sumrevenue from $table WHERE datetime BETWEEN '$startdate' and '$enddate' && email='$email' && revenue='$revenue' && status='Paid'");
		 try{
                   $query->execute();
				   return $query->fetch(PDO::FETCH_ASSOC);
				   
				   	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
}
public function totalPayment($table, $startdate, $enddate) {
    $query = $this->conn->prepare("SELECT SUM(amount) as totalPayment FROM $table WHERE datetime BETWEEN :startdate AND :enddate AND status='Paid'");
    
    try {
        $query->bindParam(':startdate', $startdate);
        $query->bindParam(':enddate', $enddate);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


//Dynamic Select All recent transactions by user
    public function allTransactions2($table, $parameter, $id){
		
		$query = $this->conn->prepare("select * from {$table} WHERE $parameter='$id' && status='Paid' order by id desc LIMIT 10");
		 try{
                   $query->execute();
				   return $query->fetchAll(PDO::FETCH_ASSOC);
				   	
						}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }

//Select Revenue
    public function selectRevenue($table, $revenue, $revprice){
		$query = $this->conn->prepare("select $revenue, $revprice from {$table} order by sn desc");
		 try{
                   $query->execute();
				   return $fetch=$query->fetchAll(PDO::FETCH_ASSOC);
				   //$fetchadmin=$query->fetch();
				    }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
    
    //Select Revenue
    public function selectAdmin($table){
		$query = $this->conn->prepare("select * from {$table} where type !='super' AND type IS NOT NULL order by name asc");
		 try{
                   $query->execute();
				   return $fetch=$query->fetchAll(PDO::FETCH_ASSOC);
				   //$fetchadmin=$query->fetch();
				    }
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
	//insert manual assessment
public function insertManualAssessment($table, $parameters) 
            {
			function random_refid( $length = 8 ) {
  //  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
      $chars = "01234567890123456789012345678901234567890123456789012345678901234567890123456789";

    $ranusn = substr( str_shuffle( $chars ), 0, $length );
    return $ranusn;
}
$rand=random_refid(8);

				$query = $this->conn->prepare("SELECT id FROM $table ORDER BY id DESC LIMIT 1");
		
                   $query->execute();
				   
				   $fetchid=$query->fetch();
				  $id=array_values($fetchid)[0];
				  $uniqx=$id.$rand;
				  $uniq=substr("$uniqx",0,8);
				  
				  $parameters['referenceid'] = $uniq;
				 
				
				$par=implode(',',array_keys($parameters));
				$parz=':'.implode(',:',array_keys($parameters));
				$query = $this->conn->prepare("INSERT INTO $table ($par) VALUES ($parz)");
				foreach($parameters as $key => $value){
				$query->bindValue(':'.$key, $value);
				}

        try{
                  $query->execute();
				return  $uniq;
						
					 }
					
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }


//insert withholding tax
public function insertWHT($table, $parameters) 
            {
			function random_refid( $length = 8 ) {
  //  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
      $chars = "01234567890123456789012345678901234567890123456789012345678901234567890123456789";

    $ranusn = substr( str_shuffle( $chars ), 0, $length );
    return $ranusn;
}
$rand=random_refid(8);

				$query = $this->conn->prepare("SELECT id FROM $table ORDER BY id DESC LIMIT 1");
		
                   $query->execute();
				   
				   $fetchid=$query->fetch();
				  $id=array_values($fetchid)[0];
				  $uniqx=$id.$rand;
				  $uniq=substr("$uniqx",0,8);
				  
				  $parameters['referenceid'] = $uniq;
				 
				
				$par=implode(',',array_keys($parameters));
				$parz=':'.implode(',:',array_keys($parameters));
				$query = $this->conn->prepare("INSERT INTO $table ($par) VALUES ($parz)");
				foreach($parameters as $key => $value){
				$query->bindValue(':'.$key, $value);
				}

        try{
                  $query->execute();
				return  $uniq;
						
					 }
					
					 catch(PDOException $e) {
					
                   echo $e->getMessage();
                }
            }

			
	
	public function delete($table, $id){
		$query = $this->conn->prepare("delete from $table WHERE id=$id");
		 try{
                 return  $query->execute();
				    	}
					catch(PDOException $e) {
					echo $e->getMessage();
					}
    }
	
		
}


?>