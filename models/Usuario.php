<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	Class Usuario extends Conexao{
		public function logado($login, $senha) {
			$pdo = parent::get_instance();

			$sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";

			$sql = $pdo->prepare($sql);
			$sql->bindValue(":login", $login);
			$sql->bindValue(":senha", $senha);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetch();
				$id = $sql['id'];
				$_SESSION['login'] = $id;
				header('Location: ../index.php?logado');
			}
			else {
				echo "<script>alert('Email ou senha incorretos!')</script>";
				echo "<script>window.location.href='../login.php'</script>";
				exit();
			}
		}

		public function logout() {
			unset($_SESSION['login']);
		}

		public function cadastrar_usuario($login, $nome, $cpf, $senha) {
			$pdo = parent::get_instance();

			$sql = "INSERT INTO usuarios (login, nome, cpf, senha, dt_inc) VALUES (:login, :nome, :cpf, :senha, :dt_inc)";

			$sql = $pdo->prepare($sql);
			$sql->bindValue(":login", $login);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":cpf", $cpf);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":dt_inc", date('Y-m-d'));
			$sql->execute();

			echo "<script> alert('Usuário cadastrado com Sucesso!');
		                window.location = '../usuario_list.php';
	                  </script>";
		}

		public function excluir_usuario($id) {
			$pdo = parent::get_instance();

			$sql = "DELETE FROM usuarios WHERE id = :id";

			$sql = $pdo->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			echo "<script> alert('Usuário excluído com Sucesso!');
		                window.location = '../usuario_list.php';
	                  </script>";
		}

		public function reset_senha($login) {
			$pdo = parent::get_instance();

			$sql = "SELECT * FROM usuarios WHERE login = :login";

			$sql = $pdo->prepare($sql);
			$sql->bindValue(":login", $login);
			$sql->execute();

			$nova_senha = substr(md5(time()),0,6);
			$nova_senha_cript = md5($nova_senha);


			if ($sql->rowCount() > 0)  {
				$sql = $sql->fetch();

				$nome = $sql['nome'];

				require_once "../phpmailer/vendor/autoload.php";

				$update = "UPDATE usuarios SET senha = :nova_senha_cript WHERE login = :login";

				$update = $pdo->prepare($update);
				$update->bindValue(":nova_senha_cript", $nova_senha_cript);
				$update->bindValue(":login", $login);
				$update->execute();


				$message = "Prezado(a) $nome,
				<p>Sua nova senha é: $nova_senha
				<p>Atenciosamente,<br>
				CO-SAFE";

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
				    //Server settings
				    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
				    $mail->isSMTP();                                            // Send using SMTP
				    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				    $mail->Username   = '4c1d4a3f451b19';                     				// SMTP username
				    $mail->Password   = '4608742403faf5';                               		// SMTP password
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom('Suporte@cosafe.com', 'CO-SAFE');
				    $mail->addAddress($login);
				    $mail->addCC('yuri@gmail.com');


				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'CO-SAFE';
				    $mail->Body    = utf8_decode($message);

				    $mail->send();
				    echo "<script> alert('Senha resetada com Sucesso!');
		                window.location = '../login.php';
	                  </script>";
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
			} else {
				echo "<script> alert('Email não existe na base de dados');
		                window.location = '../reset_senha.php';
	                  </script>";
			}
		}

		public function listar_por_id($table, $id) {
			$pdo = parent::get_instance();

			$sql = "SELECT * FROM $table WHERE id = :id";

			$sql = $pdo->prepare($sql);
			$sql->bindValue(":id", $id);
			$sql->execute();

			return $sql->fetchAll();
		}

		public function edit_usuario($id, $login, $nome, $cpf, $senha) {
		$pdo = parent::get_instance();
			if ($senha != '') {
				$sql = "UPDATE usuarios SET login = :login, nome = :nome, cpf = :cpf, senha = :senha WHERE id = :id";

				$sql = $pdo->prepare($sql);
				$sql->bindValue(":login", $login);
				$sql->bindValue(":nome", $nome);
				$sql->bindValue(":cpf", $cpf);
				$sql->bindValue(":senha", md5($senha));
				$sql->bindValue(":id", $id);
				$sql->execute();

				echo "<script> alert('Usuário e senha atualizados com Sucesso!');
		                window.location = '../usuario_list.php';
	                  </script>";
			}
			else {
				$sql = "UPDATE usuarios SET login = :login, nome = :nome, cpf = :cpf WHERE id = :id";
				$sql = $pdo->prepare($sql);
				$sql->bindValue(":login", $login);
				$sql->bindValue(":nome", $nome);
				$sql->bindValue(":cpf", $cpf);
				$sql->bindValue(":id", $id);
				$sql->execute();

				echo "<script> alert('Usuário atualizado com Sucesso!');
		                window.location = '../usuario_list.php';
	                  </script>";
			}
		}
	}
?>