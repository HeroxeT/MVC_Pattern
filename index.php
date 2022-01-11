<?php

define('ROOTPATH', __DIR__);

require __DIR__.'/app/app.php';

App::init();
App::$kernel->launch();

