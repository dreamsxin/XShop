<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Postgresql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '123456',
        'dbname'      => 'xshop',
    ),
    'www' => array(
        'controllersDir'	=> __DIR__ . '/../www/controllers/',
        'viewsDir'		=> __DIR__ . '/../www/views/',
        'modelsDir'		=> __DIR__ . '/../models/',
        'cacheDir'		=> __DIR__ . '/../cache/',
        'baseUri'		=> '/',
    ),
));
