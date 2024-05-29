<?php
class Secret{
	
	public function id($id){

		$btk=explode('$', $id);
		$mid=current($btk);
		$secr=end($btk);
		$mainsecr=base64_decode($secr);
		if($mainsecr != $_SESSION['secret']){
			echo "Oooops You are on a wrong URL";
			die();
		}
		
		else{
			
			return base64_decode($mid);
			
		}
		
	}
}

$secret=new Secret();

?>