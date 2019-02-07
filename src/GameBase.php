<?php

namespace App;


abstract class GameBase
{
	public $state;
	public $player;


	/**
	 * @return GameState
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * @param GameState $state
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * @return Player
	 */
	public function getPlayer()
	{
		return $this->player;
	}

	/**
	 * @param Player $player
	 */
	public function setPlayer($player)
	{
		$this->player = $player;
	}


}