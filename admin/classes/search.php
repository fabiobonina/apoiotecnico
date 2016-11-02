<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'system_tec');

if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare('SELECT * FROM tb_localidades WHERE nome LIKE :term');
	    $stmt->execute(array(':term' => '%'.$_GET['term'].'%'));

	    while($row = $stmt->fetch()) {
	        $return_arr[] =  array('id'=>$row['id'],'val'=>$row['nome'] ,'cli'=>$row['cliente']);
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

    echo json_encode($return_arr);
}

?>
