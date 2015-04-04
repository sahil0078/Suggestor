<?php
class SuggestorDAO{
	private $db;
	public function __construct($db){
		$this->db = $db;
	}
	
	public function getSuggestions($query){
		try{
			$suggestionArr = array();
			$sql = "select pname from product where pname like '%$query%' limit 5";
			$stmt = $this->db->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($result as $key => $tuple){
				array_push($suggestionArr, $tuple['pname']);
			}
		}catch(Exception $e){
			file_put_contents('/tmp/suggestorError'.date('Y-m-d'),$e->getMessage(),FILE_APPEND);
		}
		return $suggestionArr;
	}
}
