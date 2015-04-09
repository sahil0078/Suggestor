<?php

class Suggestor{
	public function getSuggestions($query){
		$suggestionDAO = SuggestionDAOFactory::getInstance()->createDAO('test_db');
		$result = $suggestionDAO->getSuggestions($query);
		$suggestionArr = array();
		foreach($result as $key => $tuple){
		$categoryName = $suggestionDAO->getCategoryName($tuple['catId']);
			if(!empty($categoryName)){
				array_push($suggestionArr, array('name' => $tuple['cname'],'category' => $categoryName[0]['cname']));
			}
                 }
		return $suggestionArr;
	}
}
