<?php

const ROOTPATH = __DIR__.'\\app';

require ROOTPATH.'/app.php';

App::init();
App::$kernel->launch();

