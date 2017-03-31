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
class Rating
{
	public $author;
	public $date;
	public $website;
	public $rating;
	public $id;

	public function __construct($id,$author,$date,$website,$rating){
		$this->id = $id;
		$this->author = $author;
		$this->date = $date;
		$this->website = $website;
		$this->rating = $rating;
	}
	/**
	 * Return all of the stored data
	 *
	 * @return number[][]|string[][]
	 */
	public static function all()
	{
		$list = [];
		$db = DB::prepare('SELECT * FROM rating');
		$db->execute();
		foreach($db->fetchAll() as $rating){
			$list[] = new Rating($rating['id'],$rating['author'],$rating['date'],$rating['website'],$rating['rating']);
		}
		return $list;
	}

	/**
	       * Access only a single "record" of data for the given id (or index)
	 */
	public static function find($id)
	{
		$id = intval($id);
		$sql = "SELECT * FROM rating WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id' => $id));
		$row = $stmt->fetch();
		return new Rating($row['id'],$row['author'],$row['date'],$row['website'],$row['rating']);
	}

	public static function insertRating($author,$date,$website,$rating){
		$sql = "INSERT INTO `project3_tierney`.`rating` (`author`, `date`, `website`, `rating`) VALUES (:author, :date, :website, :rating)";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':author'=>$author, ':date'=>$date,':website'=>$website,':rating'=>$rating));

	}
	public static function updateRating($author, $date, $website, $rating,$id)
	{
		$id=intval($id);
		$sql= "UPDATE rating SET author = :author, date = :date, website = :website, rating = :rating WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':author'=>$author, ':date'=>$date, ':website'=>$website, ':rating'=>$rating, ':id'=>$id));
	}
	public static function deleteRating($id){
		$id = intval($id);
		$sql = "DELETE FROM rating WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->execute(array(':id'=>$id));
	}
}

