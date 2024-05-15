<?php

define("ROOT", dirname(__DIR__));

const DEBUG = 1;
const APP = ROOT . '/app';
const WWW = ROOT . '/public';
const CORE = ROOT . '/core';
const CONFIG = ROOT . '/config';
const DB_CONFIG = CONFIG . '/db_config.php';
const LAYOUT = '/main';
const HELPERS = CORE . '/helpers';
const PORT = 8888;
const PATH = 'http://localhost:' . PORT;
const ADMIN = 'http://localhost:' . PORT . '/admin';
const CONTROLLERS = APP . '/controllers';

require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/functions.php';
