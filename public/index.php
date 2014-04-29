<?php

error_reporting(E_ALL);

try {
	/**
	 * Read the configuration
	 */
	$filename = __DIR__ . '/../apps/config/config.local.php';
	if (file_exists($filename)) {
		$config = include $filename;
	} else {
		$config = include __DIR__ . "/../apps/config/config.php";
	}

	$loader = new \Phalcon\Loader();
	$loader->registerDirs(array(
		$config->www->controllersDir,
		$config->www->modelsDir,
	))->register();

	/**
	 * Read services
	 */
	$di = new \Phalcon\DI\FactoryDefault();

	$di->set('url', function () use ($config) {
		$url = new \Phalcon\Mvc\Url();
		$url->setBaseUri($config->www->baseUri);
		return $url;
	}, true);

	$di->set('view', function () use ($config) {
		$view = new \Phalcon\Mvc\View();
		$view->setBasePath($config->www->viewsDir);
		return $view;
	}, true);

	$di->set('config', function () use ($config) {
		return $config;
	});

	$di->set('db', function () use ($config) {
		if ($config->database->adapter == 'Postgresql') {
			return new \Phalcon\Db\Adapter\Pdo\Postgresql(array(
				'host' => $config->database->host,
				'username' => $config->database->username,
				'password' => $config->database->password,
				'dbname' => $config->database->dbname
			));
		} else {
			return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
				'host' => $config->database->host,
				'username' => $config->database->username,
				'password' => $config->database->password,
				'dbname' => $config->database->dbname
			));
		}
	});

	$di->set('session', function () {
		$session = new \Phalcon\Session\Adapter\Files();
		$session->start();

		return $session;
	});


	$di['router'] = function() {
		$router = new \Phalcon\Mvc\Router();
		$router->add('/:namespace/:controller/:action/:params', array(
			'namespace' => 1,
			'controller' => 2,
			'action' => 3,
			'params' => 4,
		));
		return $router;
	};
	$application = new \Phalcon\Mvc\Application($di);

	echo $application->handle()->getContent();
} catch (\Exception $e) {
	echo $e->getMessage();
}
