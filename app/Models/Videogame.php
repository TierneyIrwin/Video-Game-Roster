<?php
namespace App\Models;

class Videogame
{
	public static function complete()
	{
		$algorithms = array(
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
		return $algorithms;
	}

	/**
	 * Access only a single "record" of data for the given id (or index)
	 *
	 * @param int $id
	 * @return number[]|string[]
	 */
	public static function find($id)
	{
		$algorithms = array(
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

		foreach ($algorithms as $algorithm) {
			if ($algorithm['id'] == $id) {
				return $algorithm;
			}
		}

		return $algorithms[0];
	}

}
