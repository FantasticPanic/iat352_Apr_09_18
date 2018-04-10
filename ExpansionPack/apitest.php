<?php

require_once 'vendor/autoload.php'; // skip this if using a framework / autoloading elsewhere

use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Stats\Stats\Players\AllPlayersRequest;

$client = new Client();

$request = AllPlayersRequest::fromArray([
    'leagueId'            => '00',
    'season'              => '2015-16',
    'isOnlyCurrentSeason' => true,
]);

$response = $client->request($request);
?>