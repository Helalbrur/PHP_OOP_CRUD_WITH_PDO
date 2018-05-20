<?php
include "Database.php";
abstract class Main
{
	
	protected $table;

	abstract public function insert();
	abstract public  function update($id);
	public function readById($id){
		$q="select * from $this->table where id=:id";
		$stmt=DB::prepare($q);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		return $stmt->fetch();
	}
	
	public function readAll(){
		$que="select * from $this->table";
		$stmt=DB::connection()->prepare($que);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id){
		$q="delete from $this->table where id=:id";
		$stmt=DB::connection()->prepare($q);
		$stmt->bindParam(':id',$id);
		return $stmt->execute();
	}
	

}

?>