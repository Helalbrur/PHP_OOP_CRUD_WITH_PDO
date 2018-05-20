<?php
include "main.php";
class Teacher extends Main
{
	protected $table="tbl_Teacher";
	private $name,$dep,$age;
	public function setName($name){
		$this->name=$name;
	}
	public function setDep($dep){
		$this->dep=$dep;
	}
	public function setAge($age){
		$this->age=$age;
	}

	public function insert(){
		$q="insert into $this->table(name,dep,age) values(:name,:dep,:age)";
		$stmt=DB::connection()->prepare($q);
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":dep",$this->dep);
		$stmt->bindParam(":age",$this->age);
		return $stmt->execute();
	}
	public function update($id){
		$q="update $this->table set name=:name , dep=:dep , age=:age where id=:id";
		$stmt=DB::connection()->prepare($q);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':dep',$this->dep);
		$stmt->bindParam(':age',$this->age);
		$stmt->bindParam(':id',$id);
		return $stmt->execute();
	}

	
}


?>