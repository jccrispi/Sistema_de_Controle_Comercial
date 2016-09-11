<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<h3>ALTERAÇÃO DE CADASTRO</h3>
<form method="post" action="alt_cad_cliente.php">
Informe o CNPJ do cliente para realizar a alteração:<br>
<input type="text" name="cnpj" /><br><br>
<h3>INFORME OS NOVOS DADOS DO cliente:</h3><br> 
Nome <input type="text" name="nome" /><br>
Inscrição Estadual <input type="text" name="inscricao" /><br>
<p><h3>Endereço:</h3></p>
Avenida/Rua <input type="text" name="rua" /><br>
Número <input type="text" name="numero" /><br>
Bairro <input type="text" name="bairro" /><br>
<p>Cidade<br>
<select name="cidade">
<option value="0" selected="selected">Selecione uma cidade</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT nome, codigocid FROM cidade";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option mostra as cidades -->
                  <option value="<?php echo $item['codigocid'];?>"><?php echo $item['nome'];?></option><br/>
			<?php	    
			}
           ?>
</select></p>
CEP <input type="text" name="cep" /><br>
<p><input type="submit" value="Alterar"/></p>
</body>
</html>