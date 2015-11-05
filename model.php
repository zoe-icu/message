<?php
require 'pdo.php';
$pdos = new pdos();
$pdos->dbtype = 'mysql';
$pdos->host = '127.0.0.1';
$pdos->db = 'test';
$pdos->user = 'root';
$pdos->password = '';
$pdos->charset = 'utf8';
$pdos->port = '3306';
$pdos->run();