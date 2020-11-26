<?php
try {
  $conn = new PDO('mysql:host=localhost;dbname=arduino', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
	$sql = "SELECT valor, data FROM sensor WHERE id = (SELECT MAX(id) FROM sensor)";
    $result = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($result > 0) {
    	echo json_encode($result);
    } else {
    	$result = array("erro" => true, "mensagem" => 'Não há novos resultados');
    	echo json_encode($result);
    }
?>