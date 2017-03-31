<?php
namespace App\Models;
use App\Database\DB as DB;

/**
 * Algorithm model class that provides a "dummy" data source
 * that will usually be comprised of accessing a database.
 *
 * @author dplante
 *
 */
class Companies
{
	public $name;
	public $est;
	public $ceo;
	public $loc;
	public $id;

	public function __construct($id, $name, $est, $ceo, $loc){
		$this->name = $name;
		$this->est = $est;
		$this->ceo = $ceo;
		$this->loc = $loc;
		$this->id = $id;
	}
	/**
	 * Return all of the stored data
	 *
	 * @return number[][]|string[][]
	 */
	public static function addCompany()
	{
		$sql = "INSERT INTO companies (name, established, ceo, location) VALUES (:companyname, :established, :ceo, :location)";
		$stmt = DB::prepare($sql);
		$companyname = filter_input(INPUT_GET,'companyname');
		$est = filter_input(INPUT_GET,'established');
		$ceo = filter_input(INPUT_GET,'ceo');
		$loc = filter_input(INPUT_GET,'location');
		$stmt->bindParam(':companyname', $companyname, PDO::PARAM_STR);
		$stmt->bindParam(':established', $est, PDO::PARAM_STR);
		$stmt->bindParam(':ceo',$ceo, PDO::PARAM_STR);
		$stmt->bindParam(':location',$loc, PDO::PARAM_STR);
		$stmt->execute();
	}
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
	       * Access only a single "record" of data for the given id (or index)
	 */
	public static function find($id)
	{
		$id = intval($id);
		$sql = "SELECT * FROM companies WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id' => $id));
		$row = $stmt->fetch();
		return new Companies($row['id'],$row['name'], $row['established'],$row['ceo'],$row['location']);
//new Companies($company['name'],$company['established'], $company['ceo'],$company['location']);
	}
	public static function updateCompany()
	{

	}
	public static function deleteCompany()
	{

	}
}

