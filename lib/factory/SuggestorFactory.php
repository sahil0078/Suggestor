<?php

class SuggestorFactory
{
    protected static $instance;
    private $suggestor;

    protected function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
        }

        return self::$instance;
    }

    public function getSuggestor() {
    	if(empty($this->suggestor)){
		$this->suggestor = new Suggestor();
 	}
        return $this->suggestor; 
    }
}

