<?php  

Class Conexao {
	public static $instance;

    public static function get_instance(){
        if (!isset(self::$instance)) {
        	try {
        		self::$instance = new PDO("mysql:host=localhost;dbname=arduino;","root","",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            	self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        	} 
            catch(PDOException $e) {
				echo 'Falha na conexão com banco de dados: ' . $e->getMessage();
			}
        }

        return self::$instance;
    }

}