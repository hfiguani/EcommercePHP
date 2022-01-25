<?php
define('DB_NAME', 'u768686411_hafed');
define('DB_USER', 'u768686411_admin');
define('DB_PASSWORD', 'hafedadmin');
define('DB_HOST', 'mysql.freehostingnoads.net');

$link =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

