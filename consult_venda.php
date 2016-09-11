<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<h3>CONSULTA DE VENDAS REALIZADAS</h3>
<p>Informe a data ou selecione o cliente:</p>
<form method="post" action="consult_cad_venda.php">
Data da venda (formato dd/mm/aaaa):<br>
<input type="text" name="data" /><br>
<p>Cliente:<br>
<select name="cliente">
<option value="0" selected="selected">Selecione o cliente</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT nome, cnpjcli FROM cliente";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option mostra as cidades -->
                  <option value="<?php echo $item['cnpjcli'];?>"><?php echo $item['nome'];?></option><br/>
			<?php	    
			}
           ?>
</select></p>
<p><input type="submit" value="Pesquisar"/></p>
</body>
</html>