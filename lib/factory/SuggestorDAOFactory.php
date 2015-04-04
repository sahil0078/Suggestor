<?php

class SuggestionDAOFactory{
    private static $instance;
    private $suggestorDAO;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
        }

        return self::$instance;
    }

   public function createDAO($dbname){
	if(empty($this->suggestorDAO)){
		$db = new PDO('mysql:host=localhost;dbname=test_db;charset=utf8', 'root', '123');
    		$this->suggestorDAO = new SuggestorDAO($db);
	}
	return $this->suggestorDAO;
   }	
}
