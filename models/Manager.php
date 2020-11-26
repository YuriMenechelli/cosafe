<?php 
require_once 'models/Conexao.php';
	Class Manager extends Conexao{
		public function listar_sensores($table) {
			$pdo = parent::get_instance();

			$sql = "SELECT valor, MAX(data) FROM $table";

			$sql = $pdo->prepare($sql);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return $sql->fetchAll();
			}
		}

		public function listar_historicos($table) {
			$pdo = parent::get_instance();

			$sql = "SELECT * FROM $table";

			$sql = $pdo->prepare($sql);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return $sql->fetchAll();
			}
		}

		public function deleteClient($table, $id) {
			$pdo = parent::get_instance();
			$sql = "DELETE FROM $table WHERE id = :id";
			$statement = $pdo->prepare($sql);
			$statement->bindValue(":id", $id);
			$statement->execute();
		}

		public function listar_usuarios($table) {
			$pdo = parent::get_instance();

			$sql = "SELECT * FROM $table";

			$sql = $pdo->prepare($sql);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return $sql->fetchAll();
		}
	}
}	
?>