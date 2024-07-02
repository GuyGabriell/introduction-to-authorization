<?php 


//connect to the database and execute a query.
//refactoring to make  the db($students) dynamic by turning it to a variable.


class Database {

  public $connection;
  

  public function __construct($config, $username = 'root', $password = '') {

    

    //As it's name suggest is actually use for building of query string 
    //example.com?foo=bar
    $dsn = 'mysql:' . http_build_query($config, '', ';'); 

    
  $this->connection = new PDO($dsn, $username , $password, [

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
  ]);

  }


  public function query($query, $params = []) {

      
  $statement = $this->connection->prepare($query);
    
  $statement->execute($params);
    
  return $statement;

  }

} 