<?php
namespace App\Models;

/**
 * Algorithm model class that provides a "dummy" data source
 * that will usually be comprised of accessing a database.
 *
 * @author dplante
 *
 */
class Rating
{
	/**
	 * Return all of the stored data
	 *
	 * @return number[][]|string[][]
	 */
	public static function complete()
	{
		$ratings = array(
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

		return $ratings;
	}

	/**
	       * Access only a single "record" of data for the given id (or index)
	 */
	public static function find($id)
	{
		$ratings = array(
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

		foreach ($ratings as $rating) {
			if ($rating['id'] == $id) {
				return $rating;
			}
		}

		return $ratings[0];
	}
}

