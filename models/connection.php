<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $user = 'hwcgedkqwqbgbi';
        $password = 'Yx9Vuhn74YWC2s1iKSTnME643M';
        $dbname = 'dest1lk0q0utl7';
        $host = 'ec2-79-125-24-188.eu-west-1.compute.amazonaws.com';
        $port = 5432;

        self::$instance = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
      }
      return self::$instance;
    }
  }
?>