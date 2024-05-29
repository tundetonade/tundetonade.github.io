<?php

class Request
{
    //Using trim() to remove opening and closing slashes from uri to clean it up
    //so that /about/us/ becomes something like about/us
    //Also parse_url returns just the uri without the query string
    //so that contact?id=3 just returns contact
    public static function uri(){
      return $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
		}

    //determine if it's a get or post request
    public static function type(){
        return $request_type = $_SERVER['REQUEST_METHOD'];
    }
	
	//get the id of every uri
	public function getId($uri){
		$expl=explode('/',$uri);
		$last=end($expl);
		$numba=count($expl);
		$breakagain=explode('@',$last);
		$numberz=count($breakagain);
		$endz=end($breakagain);
		//$id=end($breakagain);
		
		if($numberz>1){
   return $id=$endz;
  }
else{
	return $id='';
	}
	}
	
}
$req=new Request();

