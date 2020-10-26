<?php
	$nome = $_POST['nome'];
	$Company = $_POST['Company'];
	$numero-funcionarios = $_POST['numero-funcionarios'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];

	//conectar a db 
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(nome, numero-funcionarios, email, senha, telefone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $nome, $numero-funcionarios, $email, $senha, $telefone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>