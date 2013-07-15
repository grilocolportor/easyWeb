<?php
	//esse cуdigo retorna todos os registros
	
	$response = array();
	
	//incluindo o arquivo de configuraзгo de acesso aos dados
	require_once __DIR__ . '/db_config.php';
	
	//conectando ao banco de dados
	$db = new DB_CONNECT();
	
	//sql para retornar todos os registros
	$result = mysql_query("SELECT  * FROM EMPRESA") or die(mysql_error());
	
	//verificando o resultado da operaзгo
	if(mysql_num_fields($result)>0){
		//ler todos os registro da tabela atravйs de um loop
		$response["empresa"] = array();
		
		while($row= mysql_fetch_array($result)){
			
			$empresa = array();
			$empresa["empresa_id"] = $row["empresa_id"];
			$empresa["empresa_nome"] = $row["empresa_nome"];
			$empresa["empresa_latitude"] = $row["empresa_latitude"];
			$empresa["empresa_longitude"] = $row["empresa_longitude"];
			
			array_push($response["empresa"], $empresa);
			
		}
		
		//sucesso na operaзгo
		$response["sucesso"] = 1;
		
		//montando o resultado em um formato JSON
		echo json_encode($response);
	}else{
		
		//nгo foram encontrados registro
		$response["sucesso"] = 0;
		$response["mensagem"] = "Nгo foram encontrados registros";
		//montando o resultado em um formato JSON
		echo json_encode($response);
	}

?>