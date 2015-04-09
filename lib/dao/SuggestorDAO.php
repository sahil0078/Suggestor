<?php
class SuggestorDAO{
	private $db;
	public function __construct($db){
		$this->db = $db;
	}
	
	public function getSuggestions($query){
		try{
			$result = array();
		//	$sql = "select pname from product where pname like '%$query%' limit 5";
			$sql = "select * from category where cname like '%$query%' limit 5";
			$stmt = $this->db->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			file_put_contents('/tmp/suggestorError'.date('Y-m-d'),$e->getMessage(),FILE_APPEND);
		}
		return $result;
	}
	
	public function getCategoryName($cid){
		try{
			$cname = "";
//			$sql = "select cname from category where cid = (select parentId from classify where catId = $cid)";
			$sql = "select cname from category where catId in (select parentId from classify where catId = $cid)";
			$stmt = $this->db->query($sql);
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(Exception $e){
			file_put_contents('/tmp/suggestorError'.date('Y-m-d'),$e->getMessage(),FILE_APPEND);
		}
		return $result;
	}
}
