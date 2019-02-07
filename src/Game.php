<?php

namespace App;

class Game extends GameBase implements \JsonSerializable
{

	public function __construct()
	{
		$this->api = new Api();
		$data = $this->api->startGame();
		$this->state = new GameState($data->gameId, $data->score, $data->highScore);
		$this->player = new Player($data->lives, $data->gold, $data->level, $data->turn);
	}

	/**
	 * Main method where all the magic happens
	 * @throws \Exception
	 */
	public function playGame()
	{
		$shop = new Shop();
		while ($this->player->getLives() != 0) {
			$allItems = $shop->getItems($this->state->getGameId());
			$this->player->buyItemsIfPossible($this->state->getGameId(), $allItems);

			$tasks = $this->api->getAllTasks($this->state->getGameId());
			$questId = $this->chooseTask($tasks);
			$this->tryQuest($questId);
		}
	}

	/**
	 * @param $tasks
	 * @return mixed
	 */
	private function chooseTask($tasks)
	{
		// if task is encrypted, remove it from tasks list
		$tasks = array_filter($tasks, function ($task) {
			return !isset($task->encrypted);
		});

		// sort by reward(DESC) presumably because they are easier to solve
		usort($tasks, function ($a, $b) {
			return $b->reward - $a->reward;
		});

		return current($tasks)->adId;
	}

	/**
	 * @param $questId
	 */
	private function tryQuest($questId)
	{
		if (!$questId) {
			return;
		}
		$res = $this->api->tryToSolveTask($this->state->getGameId(), $questId);
		//update state after transaction
		$this->player->setGold($res->gold);
		$this->player->setLives($res->lives);
		$this->player->setTurn($res->turn);
		$this->state->setScore($res->score);
	}

	/**
	 * use to print out game state/results
	 * @return array|mixed
	 */
	public function jsonSerialize()
	{
		return [
			'result' => [
				'score' => $this->state->getScore(),
				'player' => [
					'turn' => $this->player->getTurn(),
					'level' => $this->player->getLevel()
				],
			]
		];
	}
}