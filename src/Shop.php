<?php

namespace App;


class Shop
{
	private $items = [];

	/**
	 * @param $gameId
	 * @return array
	 * @throws \Exception
	 */
	public function getItems($gameId)
	{
		if (empty($this->items)) {
			$this->items = (new Api())->getItemsList($gameId);
		}
		return $this->items;
	}

	/**
	 * @param array $items
	 */
	public function setItems($items)
	{
		$this->items = $items;
	}


}