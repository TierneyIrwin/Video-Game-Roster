<?php
namespace App\Models;
use App\Database\DB as DB;
/*
	Videogame model class the provides access to the database.
	@author TierneyIrwin
*/
class Videogame
{
	public $id;
	public $name;
	public $release;
	public $platform;
	public $genre;
	public $comid;
	public $ratid;

	//Constructs a new instance of the videogame class based on the information provided.
	public function __construct($id, $name, $release, $platform,$genre, $comid, $ratid){
		$this->id = $id;
		$this->name = $name;
		$this->release = $release;
		$this->platform = $platform;
		$this->genre = $genre;
		$this->comid = $comid;
		$this->ratid = $ratid;
	}
	
	//Joins all the tables together to be given to the controller.
	//@return []
	public static function joins(){
		$list = [];
		$db = DB::prepare('SELECT vg_name,release_date,platform,genre,companies.name,companies.location, rating.website, rating.rating,videogame.id  from videogame INNER JOIN companies ON companies.id = videogame.company_id INNER JOIN rating ON rating.id = videogame.rating_id');
		$db->execute();
		foreach($db->fetchAll() as $joins){
			$list[] = array($joins['vg_name'],$joins['release_date'],$joins['platform'],$joins['genre'],$joins['name'],$joins['location'],$joins['website'],$joins['rating'], $joins['id']);
		}	
		return $list;
	}
	
	//Takes all information in the videogame class to be given to the controller.
	//@return []
	public static function all()
	{
		$list = [];
		$db = DB::prepare('SELECT * FROM videogame');
		$db->execute();
		foreach($db->fetchAll() as $videogame) {
			$list[] = new Videogame($videogame['id'],$videogame['vg_name'], $videogame['release_date'], $videogame['platform'], $videogame['genre'], $videogame['company_id'],$videogame['rating_id']);
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
		return new Videogame($row['id'], $row['vg_name'], $row['release_date'], $row['platform'], $row['genre'], $row['company_id'], $row['rating_id']);
	}

	//Inserts the information provided into a new row in the table.
	public static function insertVG($name, $release, $platform, $genre, $company_id, $rating_id)
	{
		$sqlCompany = "SELECT * FROM companies WHERE name = :name";
		$stmtC = DB::prepare($sqlCompany);
		$exec = $stmtC->execute(array(':name'=>$company_id));
		$row = $stmtC->fetch();
		$row1 = intval($row['id']);
		var_dump($row1);
		$sqlRating = "SELECT * FROM rating WHERE website = :website and rating = :rating";
		$stmtR = DB::prepare($sqlRating);
		$ratepieces = explode("-", $rating_id);
		$stmtR->execute(array(':website'=>$ratepieces[0], ':rating'=>$ratepieces[1]));
		$col = $stmtR->fetch();
		$col1 = intval($col['id']);
		var_dump($col1);
		$sql = "INSERT INTO `project3_tierney`.`videogame` (`vg_name`,`release_date`, `platform`, `genre`, `company_id`,`rating_id`) VALUES(:name, :release_date, :platform, :genre, :company_id, :rating_id)";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':name'=>$name, ':release_date'=>$release, ':platform'=>$platform, ':genre'=>$genre, ':company_id'=>$row1, ":rating_id"=>$col1));
	}

	//Updates the specified row with the information provided.
	public static function updateVG($name, $release, $platform, $genre, $company_id, $rating_id, $id)
	{
		$sqlC = "SELECT * FROM companies WHERE name = :name";
		$stmtC = DB::prepare($sqlC);
		$stmtC->execute(array(':name'=>$company_id));
		$row = $stmtC->fetch();
		$row1 = intval($row['id']);

		$sqlR = "SELECT * FROM rating WHERE website = :website and rating = :rating";
		$stmtR = DB::prepare($sqlR);
		$ratepieces = explode("-", $rating_id);
		$stmtR->execute(array(':website'=>$ratepieces[0], ':rating'=>$ratepieces[1]));
		$col = $stmtR->fetch();
		$col1 = intval($col['id']);

		$id=intval($id);
		$sql= "UPDATE videogame SET vg_name = :name, release_date = :release_date, platform = :platform, genre = :genre, company_id = :company_id, rating_id = :rating_id WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':name'=>$name, ':release_date'=>$release, ':platform'=>$platform, ':genre'=>$genre, ':company_id'=>$row1, ':rating_id'=>$col1, ':id'=>$id));
	}

	//Deletes the specified row from the table.
	public static function deleteVG($id)
	{
		$id = intval($id);
		$sql = "DELETE FROM videogame WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id'=>$id));
	}
}
