<?php

require_once '/usr/src/myapp/vendor/autoload.php';

$sentinels = ['tcp://sentinel:26379'];
$service = 'redis';

$client = new Predis\Client($sentinels, array(
	'replication' => 'sentinel',
	'service' => $service,
	'parameters' => ['database' => 1]
));


var_dump($sentinels);
var_dump($service);
var_dump($client);

var_dump($client->get('foo'));

die;
$session_handler = new Predis\Session\Handler($client);
$session_handler->register();

$_SESSION['foo'] = 'foo';

var_dump($client);
while(1){
	var_dump($client->incr('k'));
	var_dump($client->get('k'));
	var_dump($_SESSION['foo']);
	sleep(1);
}
