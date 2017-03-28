<?php

require('config.php');
require('classes/Bootstrap.php');

//passing the get superglobal as the request
$bootstrap = new Bootstrap($_GET);
$contoller = $bootstrap->createController();