<?php 

require_once __DIR__."/models/conectar.php";
// Load Composer's autoloader
require_once __DIR__."/phpmailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// define variável a ser recebida pelo http
	$inf = $_GET["inf"];

	if(!empty($inf)){		
		// Escreve no banco de dados
		$sql = "INSERT INTO sensor (valor, data) VALUES ('$inf', now())";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		if($stmt){
			echo "Cadastrou";

			//Caso a medição ultrapasse o valor normal, inserir na tabela histórico.
			if ($inf >= 100) {
				$message = "<strong>ATENÇÃO:</strong> O nível de Monóxido de carbono(CO) presente no ar está acima do permitido";

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);


			    //Server settings
			    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = '5120e9ed3a4987';                     // SMTP username
			    $mail->Password   = '7d9243a559bbc0';                               // SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $mail->setFrom('from@example.com', 'Mailer');
			    $mail->addAddress('kez.sulake@hotmail.com', 'Kezley');     // Add a recipient
			    $mail->addCC('yuri@gmail.com');


			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'CO-SAFE';
			    $mail->Body    = utf8_decode($message);

			    $mail->send();
			    echo 'Message has been sent';
				//Retornando o valor da medição do sensor
				$query = "SELECT * FROM sensor WHERE id = (SELECT MAX(id) FROM sensor WHERE valor >= 87)";
				$result = $conn->query($query)->fetch(PDO::FETCH_ASSOC);

				//Inserindo na tabela historico.
				$sql = "INSERT INTO historico (valor, sensor_id, data) VALUES (:valor, :sensor_id, :data)";
				$stmt_insert = $conn->prepare($sql);
				$stmt_insert->execute(array(
					':valor' 	 => $result['valor'],
					':sensor_id' => $result['id'],
					':data'	 => $result['data']
				));
			}
		}else{
			echo "Não cadastrou";
		}	
	}
	else{	
		echo "Valor Inválido ou Nulo";
	}

?>