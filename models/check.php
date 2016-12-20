<?php 

	class Check{

    	public $identifiant;
    	public $password;


    	public function __construct($identifiant, $password) {
      $this->identifiant = $identifiant;
      $this->password = $password;
    }

	public function login($identifiant) {
		$list=[];
	    $db = Db::getInstance();

	      	$req = pg_query_params($db,'SELECT password FROM electeur WHERE  identifiant= $1',array($identifiant));
	      	foreach(pg_fetch_all($req) as $result){
	      		$list[] = new Check($identifiant, $result['password']);
	      	}
	     return $list;
	    }

	public function save($key, $password){
		$db = Db::getInstance();
		$req = pg_query_params($db,'INSERT INTO login (logkey, crypted_password) VALUES ($1,$2)',array($key, $password));
	}

	public function clean($key){
		$db = Db::getInstance();
		$req = pg_query_params($db,'DELETE FROM login WHERE logkey = $1',array($key));
	}

	public function verify($key){
		$db = Db::getInstance();
		$req = pg_query_params($db,'SELECT crypted_password FROM login WHERE logkey = $1',array($key));
		$result = pg_fetch_result($req,0,0);
		return $result;
	}


	public function get_password($identifiant, $category){
		$db = Db::getInstance();
		if ($category='school') $req = pg_query_params($db,'SELECT school_password FROM school WHERE  school_mail= $1',array($mail));
	    if ($category='student') $req = pg_query_params($db,'SELECT student_password FROM student WHERE  student_mail= $1',array($mail));
	    if ($category='teacher') $req = pg_query_params($db,'SELECT teacher_password FROM teacher WHERE  school_teacher= $1',array($mail));
	    $result = pg_fetch_result($req);
	    return $result;
	}
}
?>