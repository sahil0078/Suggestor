<?php

class Suggestor{
	public function getSuggestions($query){
		$suggestionDAO = SuggestionDAOFactory::getInstance()->createDAO('test_db');
		$suggestion = $suggestionDAO->getSuggestions($query);
		return $suggestion;
	}
}
