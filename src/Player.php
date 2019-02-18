<?php

namespace App;


class Player
{
	private $lives, $gold, $level, $turn;

	/**
	 * Player constructor.
	 * @param $lives
	 * @param $gold
	 * @param $level
	 * @param $turn
	 */
	public function __construct($lives, $gold, $level, $turn)
	{
		$this->lives = $lives;
		$this->gold = $gold;
		$this->level = $level;
		$this->turn = $turn;
	}

	/**
	 * @param $gameId
	 * @param $allItems
	 * @throws \ErrorException
	 */
	public function buyItemsIfPossible($gameId, $allItems)
	{
		// sort out what we can buy
		$availableItems = array_filter($allItems, function ($item) {
			return $item->getCost() <= $this->getGold();
		});

		// if we don't have enough money then get out
		if (empty($availableItems)) {
			return;
		}

		// 3 HP to be ready for sequential failures
		if ($this->getLives() > 3) {
			// we don't want to buy Hpot if we have enough lives (saving money for other items)
			if (count($availableItems) == 1 && $availableItems[0]->getItemId() == 'hpot') {
				return;
			}
			// in other case, when we have money and HP > 1 - buy something else
			$item = $this->chooseWhatToBuy($availableItems);
		} else {
			// buy healing potion if HP less than 2
			$item = $availableItems[0];
		}

		$res = (new Api())->buyItem($gameId, $item->getItemId());

		//update state after transaction
		$this->setGold($res->gold);
		$this->setLives($res->lives);
		$this->setLevel($res->level);
		$this->setTurn($res->turn);
	}

	/**
	 * @param $availableItems
	 * @return mixed
	 */
	private function chooseWhatToBuy($availableItems)
	{
		// filter out Hpot
		$items = array_filter($availableItems, function ($item) {
			return $item->getItemId() != 'hpot';
		});

		// TODO: improvements: buy something that player doesnt'have in inventory, check before
		$i = array_rand($items);
		return $items[$i];
	}

	/**
	 * @return mixed
	 */
	public function getLives()
	{
		return $this->lives;
	}

	/**
	 * @param mixed $lives
	 */
	public function setLives($lives)
	{
		$this->lives = $lives;
	}

	/**
	 * @return mixed
	 */
	public function getGold()
	{
		return $this->gold;
	}

	/**
	 * @param mixed $gold
	 */
	public function setGold($gold)
	{
		$this->gold = $gold;
	}

	/**
	 * @return mixed
	 */
	public function getLevel()
	{
		return $this->level;
	}

	/**
	 * @param mixed $level
	 */
	public function setLevel($level)
	{
		$this->level = $level;
	}

	/**
	 * @return mixed
	 */
	public function getTurn()
	{
		return $this->turn;
	}

	/**
	 * @param mixed $turn
	 */
	public function setTurn($turn)
	{
		$this->turn = $turn;
	}
}