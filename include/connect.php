<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'personal_site');
define('DB_HOSTNAME', 'localhost');
define('DB_PORT', 3306);

$dsn = "mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE.";charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
);

$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);   //here is where php is connectng to the DB

//Note this is a homemade function that wraps around the default PHP/MySQL PDO
//to make it a bit easier to make database calls. It assumes there's only one database
//connection
//Note: $query should follow the format `...Email = :Email...` and then $values
//should be array('Email'=>'test@fake.com')
//read this for help with PDOs: https://phpdelusions.net/pdo
//Other note: if we need to specify the data type, check this out: http://php.net/manual/en/pdostatement.bindvalue.php

    function dbQuery($query, $values=array()){                                //this is the function to execute each query
    global $pdo;

    //

    $stmt = $pdo->prepare($query);
    $stmt->execute($values);
    return $stmt; //To get data out, use ->fetch() for one row or ->fetchAll() for all rows
}