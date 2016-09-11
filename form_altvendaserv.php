<html>
<meta charset="utf-8">
<body bgcolor="#FFFFFF" text="#000000" link="#000000" alink="#000000" vlink="#000000" >
<style type="text/css">
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
</style>

<h3>ALTERAÇÃO DE DADOS DA VENDA</h3>
<form method="post" action="alt_venda_servico.php">
<br>Código da venda:<br>
<input type="text" name="codvend" /><br>


<h4>INFORME OS DADOS SOLICITADOS PARA MODIFICAR O(S) SERVIÇO(S) DA VENDA:</h4>


<p>Código do serviço a ser alterado:<br>
<input type="text" name="servalt" /></p>

<p>Novo serviço:<br><span style="padding-left:3px"></span>
<select name="novoserv">
<option value="0" selected="selected">Selecione o serviço</option>
        <?php

          //Ligação ao ficheiro de ligação à BD  
          include('conexao.php');


          //Selecciona as cidades  
          $sql = "SELECT descricaoserv, codigoserv FROM servico";
		  foreach($conexao->query($sql) as $item)
          {
         ?>
				<!-- O value possui o id da cidade a guardar na BD e na option 

mostra as cidades -->
                  <option value="<?php echo $item['codigoserv'];?>"><?php echo 

$item['descricaoserv'];?></option><br/>
			<?php	    
			}
           ?>
</select></p>



<input type="submit" value="ALTERAR" /><br>

</form>
</body>

</html>
