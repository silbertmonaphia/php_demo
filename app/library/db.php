<?php
$servername = "127.0.0.1";
$username = "af_dev";
$password = "af_dev";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=tbllog", $username, $password, array(
        # persist connection 
        PDO::ATTR_PERSISTENT => true
    ));
    echo "Connected\n";
} catch(PDOException $e) {
    die("Unable to connect: " . $e->getMessage());
}

try {  
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $dbh->beginTransaction();
  $dbh->exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
  $dbh->exec("insert into salarychange (id, amount, changedate) 
      values (23, 50000, NOW())");
  $dbh->commit();
  
} catch (Exception $e) {
  $dbh->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
