<?php
namespace App\Models;
use App\Database\DB as DB;

class Videogame
{
	public $id;
	public $name;
	public $release;
	public $platform;
	public $genre;
	public $comid;
	public $ratid;

	public function __construct($id, $name, $release, $platform,$genre, $comid, $ratid){
		$this->id = $id;
		$this->name = $name;
		$this->release = $release;
		$this->platform = $platform;
		$this->genre = $genre;
		$this->comid = $comid;
		$this->ratid = $ratid;
	}

	public static function all()
	{
		$list = [];
		$db = DB::prepare('SELECT * FROM videogame');
		$db->execute();
		foreach($db->fetchAll() as $videogame) {
			$list[] = new Videogame($videogame['id'],$videogame['name'], $videogame['release date'], $videogame['Platform'], $videogame['Genre'], $videogame['company_id'],$videogame['rating_id']);
		}
		return $list;
	}

	/**
	 * Access only a single "record" of data for the given id (or index)
	 *
	 * @param int $id
	 * @return number[]|string[]
	 */
	public static function find($id)
	{
		$id = intval($id);
		$sql = "SELECT * FROM videogame WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id' => $id));
		$row = $stmt->fetch();
		return new Videogame($row['id'], $row['name'], $row['release date'], $row['Platform'], $row['Genre'], $row['company_id'], $row['rating_id']);
	}
	public static function insertVG($name, $release, $platform, $genre, $company_id, $rating_id){
		$sql = "INSERT INTO `project3_tierney`.`videogames` (`name`,`release date`, `Platform`, `Genre`, `company_id`,`rating_id`) VALUES(:name, :release, :platform, :genre, :company_id, :rating_id)";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':name'=>$name, ':release'=>$release, ':platform'=>$platform, ':genre'=>$genre, ':company_id'=>$company_id, ":rating_id"=>$rating_id));
	}
}
