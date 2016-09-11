<html>

<head>
<title>JT SOLUTIONS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body bgcolor="#336699" text="white" link="white" alink="white" vlink="white">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(img/fundo_total.png);
	font-size: 12px;
	font-family: arial, helvetica, serif;
	color: #FFFFFF;
}
a:link, a:visited {
	text-decoration: none
	}
a:hover {
	text-decoration: underline;
	color #f00
	}
a:active {
	text-decoration: none
	}
.texto_login {
	font-size: 12px;
	font-family: arial, helvetica, serif;
	color: #FFFFFF;
}
.texto_titulo {
	font-size: 30px;
	font-family: arial, helvetica, serif;
	color: #FFFFFF;
}
</style>
<?php

// Verifica se usuário e senha conferem
include('conexao.php');
if(isset($_POST['username']) && ($_POST['password'])){
	$nome = $_POST['username'];
	$senha = $_POST['password'];
	if(!$nome && $senha == '00000') {
		echo "<h3><center>Informe o usuário e a senha!</h3>";
		echo "<a href='menulogin.php' target='login'><h2><center>Voltar</h2></a>";
	}
	else{
		if(!$nome){
			echo "<h3><center>Informe o usuário!</h3>";
			echo "<a href='menulogin.php' target='login'><h2><center>Voltar</h2></a>";
		}
		else{
			if(!is_numeric($senha)) {
					session_start();
					$_SESSION["Login"] = "NO";
					echo "<h3><center>Nome do usuário incorreto ou senha incorreta.</h3>";
					echo "<a href='menulogin.php' target='login'><h2><center>Voltar</h2></a>";
			}
			else{
				
				if($senha == '00000') {
					echo "<h3><center>Informe a senha!</h3>";
					echo "<a href='menulogin.php' target='login'><h2><center>Voltar</h2></a>";
				}
				else{
					$sql = "SELECT COUNT(*) QTDE  FROM funcionario WHERE UPPER(nome) LIKE UPPER ('$nome%') &&";
					$sql.="cpffunc = $senha ";
					$resultado = $conexao->query($sql);
					foreach($resultado as $valor)
					{
						$qtde = $valor['QTDE'];
					}
					
					if($qtde!=0){
						
						$sql  = " SELECT numcpf FROM login WHERE  cod = 1";
						foreach($conexao->query($sql) as $item) {
						$cadcpf = $item['numcpf'];
						}
						if($cadcpf <> $senha) {
								$sql="UPDATE login SET numcpf = $senha WHERE cod = 1";
								$resultado = $conexao->exec($sql);
								if(!$resultado){
								echo "<h2>Erro ao validar funcionário</h2>";
								}
						}
						
						
						$sql1  = " SELECT nome FROM funcionario WHERE cpffunc = $senha";
						foreach($conexao->query($sql1) as $item) {
						$cadnome = $item['nome'];
						}
						
						$time = mktime(date('H')-3, date('i'), date('s'));
						$hora = gmdate("H", $time);
						
						if($hora >= '1' && $hora < '12') {
							$saud = 'Bom dia';
						}
						elseif ($hora >= '12' && $hora < '18') {
							$saud = 'Boa tarde';
						}
						else {
							$saud = 'Boa noite';
						}
						
						
												
				
						session_start();
					
						$_SESSION["Login"] = "YES";
						echo "<a href='indexlogin.php' target='principal'><h4>PÁGINA INICIAL</h4></a><h2><center><span class='texto_titulo'>JT SOLUTIONS </span></center></h2>";
						echo "<h4> $saud  $cadnome! -";
						echo " Pressione F5 para sair do sistema</h4>";
					}		
					else {
					
						session_start();
						$_SESSION["Login"] = "NO";
						echo "<h3><center>Nome do usuário incorreto ou senha incorreta.</h3>";
						echo "<a href='menulogin.php' target='login'><h2><center>Voltar</h2></a>";
					}
				}
			}
		}
	}
}
?>
</body>
</html>