<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<h3>CONSULTA DE COMPRAS REALIZADAS</h3>
<p>Informe a data ou selecione a mercadoria:</p>
<form method="post" action="consult_cad_compra.php">
Data da compra (formato dd/mm/aaaa):<br>
<input type="text" name="data" /><br>
<p>Mercadoria:<br>
<select name="mercad">
<option value="0" selected="selected">Selecione uma mercadoria</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT descricaomercad, codigomercad FROM mercadoria";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option mostra as cidades -->
                  <option value="<?php echo $item['codigomercad'];?>"><?php echo $item['descricaomercad'];?></option><br/>
			<?php	    
			}
           ?>
</select></p>
<p><input type="submit" value="Pesquisar"/></p>
</body>
</html>