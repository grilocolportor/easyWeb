<?php
	//esse cуdigo irб resgatar um ъnico registro da tabela 
	//selecionado pelo campo empresa_id_google
	$response = array();
	
	//incluindo o arquivo de configuraзгo de acesso aos dados
	require_once __DIR__ . '/db_config.php';
	
	//conectando com o banco de dados
	$db = new DB_CONNECT();
	
	//verificando se o valor do campo para pesquisar 
	if(isset($_POST['empresa_id_google'])){
		$empresa_id_google = $_POST['empresa_id_google'];
		
		//sql de consulta da empresa pelo campo empresa_google_id
		$result  = mysql_query("SELECT * FROM EMPRESA WHERE EMPRESA_ID_GOOGLE = '$empresa_id_google'");
		
		//verificando o resultado da consulta
		if(!empty($result)){
			//o resultado retornou algum registro
			if(mysql_num_rows($result)>0){
				
				$result = mysql_fetch_array($result);
				
				$empresa = array();
				$empresa["empresa_id"] = $result["empresa_id"];
				$empresa["empresa_nome"] = $result["empresa_nome"];
				$empresa["empresa_lat"] = $result["empresa_lat"];
				$empresa["empresa_lng"] = $result["empresa_lng"];
				
				//sucesso na operaзгo
				$response["sucesso"] = 1;
				
				//user node
				$response["empresa"] = array();
				array_push($response["empresa"], $empresa);
				
				//montado o resultado em um formato JSON
				echo  json_encode($response);
				
			}else{
				$response["erro"] =0;
				$response["mensagem"] = "Empresa nгo encontrada";
				
				//montado o resultado em um formato JSON
				echo  json_encode($response);
			}
		}else{
			$response["erro"] =0;
			$response["mensagem"] = "O campo necessбrio para fazer a consulta estб vazio";
			
			//montado o resultado em um formato JSON
			echo  json_encode($response);
		}
		
	}
?>