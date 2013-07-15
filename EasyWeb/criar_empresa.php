<?php
	//esse cуdigo irб criar um novo registro na
	//tabela empresa
	
	//array para responder solicatзгo em JSON
	$response = array();
	
	//checando campos requiridos
	if(isset($_POST['id_google']) && isset($_POST['nome']) && isset($_POST['lat']) && isset($_POST['lng'])){
		
		$id_google = $_POST['id_google'];
		$nome = $_POST['nome'];
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		
		//incluindo o arquivo de configuraзгo de acesso aos dados
		require_once __DIR__ . '/db_config.php';

		//conectando com o banco de dados
		$db = new DB_CONNECT();
		
		//sql  de inserзгo de um novo registro
		$result = mysql_query("INSERT INTO EMPRESA(EMPRESA_ID_GOOGLE, EMPRESA_NOME, EMPRESA_LATITUDE, EMPRESA_LONGITUDE)
				VALUES('$id_google', '$nome', $lat, $lng)");
		
		if($result){
			//registro inserido com sucesso
			$response["sucesso"] = 1;
			$response["mensagem"] = "Registro inserido com sucesso!";
			
			//montando JSON com o resultado da operaзгo
			echo json_encode($response);
		}else{
			//falha no inserзгo do registro
			$response["erro"] = 0;
			$response["mensagem"] = "Ocorreu um erro ao tentar inserir o registro!!";
			
			//montando JSON com o resultado da operaзгo
			echo json_encode($response);
		}
		
		
	}else{
		//й necessбrio q todos os campos sejam
		//preenchido com algum valor
		//falha no inserзгo do registro
		$response["erro"] = 0;
		$response["mensagem""] = "Todos os campos precisam ter valores!!";
			
		//montando JSON com o resultado da operaзгo
		echo json_encode($response);
	}
?>