<?php
	//classe de conexao com o banco de dados
	class DB_CONNECT{
		//construtor
		function __construct(){
			//conectando com banco de dados
			$this -> connect();
		}
		
		//destruir
		function __destruct(){
			//fechando conexao com o banco de dados
			$this-> close();
		}
		
		//funчуo para conectar com o banco de dados
		function connect(){
			//import as variaveis de configuraчуo de acesso ao
			//banco de dados
			require_once __DIR__ . '/db_config.php';
			
			//conectando com o servidor de banco de dados mysql
			$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
			
			//selecionando 
			$db = mysql_select_db(DB_DATABASE) or die(mysql_error())  or die(mysql_error());

			//retorna a conexao
			return $con;
		}
		
		//funчуo para fechar a conexao com o banco de dados
		function close(){
			//fechando conexao
			mysql_close();
		}
		
	}

?>