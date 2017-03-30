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

	/**
	       * Access only a single "record" of data for the given id (or index)
	 */
	public static function searchCompanies()
	{
		$sql = "SELECT * FROM companies";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	public static function find($id)
	{
		$companies = array(
				array(
					'id' => 1,
					'algorithm' => 'Bubble Sort',
					'ranking' => 999
				     ),
				array(
					'id' => 2,
					'algorithm' => 'Insertion Sort',
					'ranking' => 5
				     ),
				array(
					'id' => 3,
					'algorithm' => 'Merge Sort',
					'ranking' => 2
				     )
				);

		foreach ($companies as $company) {
			if ($company['id'] == $id) {
				return $company;
			}
		}

		return $companiess[0];
	}
}

