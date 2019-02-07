<?php

namespace App;


use App\Utils\Logger;
use Curl\Curl;

class Api
{

	public function __construct()
	{
		$this->logger = Logger::getLogger("DragonQuestAPI");
	}

	public function startGame()
	{
		$apiPath = '/api/v2/game/start';
		$url = API_HOST . $apiPath;

		$this->logger->info("New game. Request", ['url' => $url]);
		$curl = new Curl(API_HOST);
		$curl->post($apiPath);

		if ($curl->error) {
			$this->logger->error("Error in response", ['url' => $url, 'error' => $curl->errorMessage]);
			return;
		}

		$this->logger->info("New game. Response", ['url' => $url, 'data' => $curl->getRawResponse()]);
		return $curl->response;
	}

	public function getItemsList($gameId)
	{
		$apiPath = "/api/v2/{$gameId}/shop";
		$url = API_HOST . $apiPath;
		$this->logger->info("Check shop. Request", ['url' => $url, 'data' => []]);
		$curl = new Curl(API_HOST);
		$curl->get($apiPath);
		if ($curl->error) {
			$this->logger->error("Error in response", ['url' => $url, 'error' => $curl->errorMessage]);
			return;
		}
		$this->logger->info("Check shop. Response", ['url' => $url, 'data' => $curl->getRawResponse()]);

		$items = [];
		foreach ($curl->response as $obj) {
			$item = new Item($obj->id, $obj->name, $obj->cost);
			$items[] = $item;
		}

		return $items;
	}

	public function buyItem($gameId, $itemId)
	{
		$apiPath = "/api/v2/{$gameId}/shop/buy/{$itemId}";
		$url = API_HOST . $apiPath;

		$this->logger->info("Buying item. Request:", ['url' => $url, 'data' => ['itemId' => $itemId]]);
		$curl = new Curl(API_HOST);

		$curl->post($apiPath);
		if ($curl->error) {
			$this->logger->error("Error in response", ['url' => $url, 'error' => $curl->errorMessage]);
			return;
		}

		$this->logger->info("Buying item. Response:", ['url' => $url, 'data' => $curl->getRawResponse()]);
		return $curl->response;
	}


	public function getAllTasks($gameId)
	{
		$apiPath = "/api/v2/{$gameId}/messages";
		$url = API_HOST . $apiPath;
		$this->logger->info("Checking tasks. Request", ['url' => $url, 'data' => []]);
		$curl = new Curl(API_HOST);
		$curl->get($apiPath);
		if ($curl->error) {
			$this->logger->error("Error in response", ['url' => $url, 'error' => $curl->errorMessage, 'data' => $curl->getRawResponse()]);
			return;
		}
		$this->logger->info("Checking tasks. Response", ['url' => $url, 'data' => $curl->getRawResponse()]);

		return $curl->response;
	}

	public function tryToSolveTask($gameId, $adId)
	{
		$apiPath = "/api/v2/{$gameId}/solve/{$adId}";
		$url = API_HOST . $apiPath;

		$this->logger->info("Solving quest. Request", ['url' => $url, 'data' => ['adId' => $adId]]);
		$curl = new Curl(API_HOST);

		$curl->post($apiPath);
		if ($curl->error) {
			$this->logger->error("Error in response", ['url' => $url, 'error' => $curl->errorMessage, 'data' => $curl->getRawResponse()]);
			return;
		}

		$this->logger->info("Solving quest. Response", ['url' => $url, 'data' => $curl->getRawResponse()]);

		return $curl->response;
	}
}