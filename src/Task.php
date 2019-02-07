<?php

namespace App;

class Task
{
	private $adId, $message, $reward, $expiresIn, $probability;

	/**
	 * Task constructor.
	 * @param $adId
	 * @param $message
	 * @param $reward
	 * @param $expiresIn
	 * @param $probability
	 */
	public function __construct($adId, $message, $reward, $expiresIn, $probability)
	{
		$this->adId = $adId;
		$this->message = $message;
		$this->reward = $reward;
		$this->expiresIn = $expiresIn;
		$this->probability = $probability;
	}

	/**
	 * @return mixed
	 */
	public function getAdId()
	{
		return $this->adId;
	}

	/**
	 * @param mixed $adId
	 */
	public function setAdId($adId)
	{
		$this->adId = $adId;
	}

	/**
	 * @return mixed
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}

	/**
	 * @return mixed
	 */
	public function getReward()
	{
		return $this->reward;
	}

	/**
	 * @param mixed $reward
	 */
	public function setReward($reward)
	{
		$this->reward = $reward;
	}

	/**
	 * @return mixed
	 */
	public function getExpiresIn()
	{
		return $this->expiresIn;
	}

	/**
	 * @param mixed $expiresIn
	 */
	public function setExpiresIn($expiresIn)
	{
		$this->expiresIn = $expiresIn;
	}

	/**
	 * @return mixed
	 */
	public function getProbability()
	{
		return $this->probability;
	}

	/**
	 * @param mixed $probability
	 */
	public function setProbability($probability)
	{
		$this->probability = $probability;
	}
}