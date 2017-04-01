<?php
namespace App\Models;
use App\Database\DB as DB;

/**
 * Companies model class that provides access to a database.
 *
 * @author TierneyIrwin
 *
 */
class Companies
{
	public $name;
	public $est;
	public $ceo;
	public $loc;
	public $id;

	//Constructs the instance of the row from the database/information given.
	public function __construct($id, $name, $est, $ceo, $loc)
	{
		$this->name = $name;
		$this->est = $est;
		$this->ceo = $ceo;
		$this->loc = $loc;
		$this->id = $id;
	}
	/**
	 * Inserts a new row into the companies table based on the information
	 * given.
	 * 
	 */
	public static function insertCompany($name, $est, $ceo, $loc)
	{
		$sql = "INSERT INTO companies (name, established, ceo, location) VALUES (:companyname, :established, :ceo, :location)";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':companyname'=>$name,':established'=>$est, ':ceo'=>$ceo,':location'=>$loc));
	}
	//Selects all information from the companies table to be instanced and sent into an array.
	//@return $list[]
	public function all(){
		$list = [];
		$db = DB::prepare('SELECT * FROM companies');
		$db->execute();
		foreach($db->fetchAll() as $company){
			$list[] = new Companies($company['id'],$company['name'],$company['established'],$company['ceo'],$company['location']);
		}
		return $list;
	}
	/**
	 * Access only a single "record" of data for the given id (or index)
	 */
	public static function find($id)
	{
		$id = intval($id);
		$sql = "SELECT * FROM companies WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id' => $id));
		$row = $stmt->fetch();
		return new Companies($row['id'],$row['name'], $row['established'],$row['ceo'],$row['location']);
	}
	//Updates the row specified by the id taken in with the parameters taken in
	public static function updateCompany($companyname, $est, $ceo, $location,$id)
	{
		$id=intval($id);
		$sql= "UPDATE companies SET name = :companyname, established = :established, ceo = :ceo, location = :location WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':companyname'=>$companyname, ':established'=>$est, ':ceo'=>$ceo, ':location'=>$location, ':id'=>$id));
	}
	//Deletes the row specified by the id taken in.
	public static function deleteCompany($id)
	{
		$id = intval($id);
		$sql = "DELETE FROM companies WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id'=>$id));
	}
}

