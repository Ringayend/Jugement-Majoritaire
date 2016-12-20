<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {

        $dbopts = parse_url(getenv('DATABASE_URL'));
        $user = $dbopts["user"];
        $password = $dbopts['pass'];
        $dbname = ltrim($dbopts['path'],'/');
        $host = $dbopts["host"];
        $port = $dbopts["port"];

        self::$instance = pg_connect("host=$host port=$port  dbname=$dbname user=$user password=$password");
      }
      return self::$instance;
    }
  }
?>