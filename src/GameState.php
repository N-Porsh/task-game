<?php

namespace App;


class GameState
{
	private $gameId, $score, $highScore;

	/**
	 * GameState constructor.
	 * @param $gameId
	 * @param $score
	 * @param $highScore
	 */
	public function __construct($gameId, $score, $highScore)
	{
		$this->gameId = $gameId;
		$this->score = $score;
		$this->highScore = $highScore;
	}

	/**
	 * @return mixed
	 */
	public function getGameId()
	{
		return $this->gameId;
	}

	/**
	 * @param mixed $gameId
	 */
	public function setGameId($gameId)
	{
		$this->gameId = $gameId;
	}

	/**
	 * @return mixed
	 */
	public function getScore()
	{
		return $this->score;
	}

	/**
	 * @param mixed $score
	 */
	public function setScore($score)
	{
		$this->score = $score;
	}

	/**
	 * @return mixed
	 */
	public function getHighScore()
	{
		return $this->highScore;
	}

	/**
	 * @param mixed $highScore
	 */
	public function setHighScore($highScore)
	{
		$this->highScore = $highScore;
	}


}