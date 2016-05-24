# Shows an error in predis

## Usage
`docker-compose up`

This will start a sentinel, a redis and a php process. The php process tries to execute a simple get through the redis client. Predis will err after a few seconds. 

```
Fatal error: Uncaught exception 'Predis\Replication\RoleException' with message 'Expected slave but got master [172.18.0.2:6379]' in /usr/src/myapp/vendor/predis/predis/src/Connection/Aggregate/SentinelReplication.php:527Stack trace:
#0 /usr/src/myapp/vendor/predis/predis/src/Connection/Aggregate/SentinelReplication.php(542): Predis\Connection\Aggregate\SentinelReplication->assertConnectionRole(Object(Predis\Connection\StreamConnection), 'slave')
#1 /usr/src/myapp/vendor/predis/predis/src/Connection/Aggregate/SentinelReplication.php(656): Predis\Connection\Aggregate\SentinelReplication->getConnection(Object(Predis\Command\StringGet))
#2 /usr/src/myapp/vendor/predis/predis/src/Connection/Aggregate/SentinelReplication.php(696): Predis\Connection\Aggregate\SentinelReplication->retryCommandOnFailure(Object(Predis\Command\StringGet), 'executeCommand')
#3 /usr/src/myapp/vendor/predis/predis/src/Client.php(331): Predis\Connection\Aggregate\SentinelReplication->executeCommand(Object(Predis\Command\StringGet))
#4 /usr/src/myapp/v in /usr/src/myapp/vendor/predis/predis/src/Connection/Aggregate/SentinelReplication.php on line 527
usepredis_php_1 exited with code 255
```
