<?php

namespace App;

class Item
{
	private $itemId, $name, $cost;

	/**
	 * Shop constructor.
	 * @param $itemId
	 * @param $name
	 * @param $cost
	 */
	public function __construct($itemId, $name, $cost)
	{
		$this->itemId = $itemId;
		$this->name = $name;
		$this->cost = $cost;
	}

	/**
	 * @return mixed
	 */
	public function getItemId()
	{
		return $this->itemId;
	}

	/**
	 * @param mixed $itemId
	 */
	public function setItemId($itemId)
	{
		$this->itemId = $itemId;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getCost()
	{
		return $this->cost;
	}

	/**
	 * @param mixed $cost
	 */
	public function setCost($cost)
	{
		$this->cost = $cost;
	}


}