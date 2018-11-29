<?php
	include_once("dbcon.php");
    $result_reservas = "SELECT *,date_format(`data`,'%d/%m/%Y') as `data_formatada` FROM `reservas` ORDER BY data, local, nome ASC";
    $resultado_reservas = mysqli_query($conn, $result_reservas);
    
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title> Reservas </title>
        <meta charset='utf-8'>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap2.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body { background-image: url("img/bg3.jpg"); }
        </style>
        <script language="JavaScript"> // Script para Mascara do Telefone
            function mascara(t, mask){
            var i = t.value.length;
            var saida = mask.substring(1,0);
            var texto = mask.substring(i)
                if (texto.substring(0,1) != saida){
                    t.value += texto.substring(0,1);
                }
            }
        </script>
        <script src="js/script.js"></script>
        <script>
            function maxPes(){
            var localizacao = document.getElementById('local').value;
            if (localizacao === 'Deck'){
            document.getElementById('quantPessoas').max = 40;
            } else if (localizacao === 'Calçada') {
            document.getElementById('quantPessoas').max = 90;
            } else if (localizacao === 'Lateral') {
            document.getElementById('quantPessoas').max = 90;
            } else if (localizacao === 'Interno') {
            document.getElementById('quantPessoas').max = 40;
            }
            }
        </script>
        <script>
            function confirmarExcluir(){
                var id = prompt("Para confirmar digite o número da Reserva", "Nº");
                if (id != null || id != "") {
                    location.href="proc_apagar_usuario.php?id=" + id;
                } else {
                    alert('É necessário selecionar uma reserva'); 
                }
            }
        </script>
    </head>
    <body>
        <!-- DIV CADASTRO DE RESERVAS -->
        <div class="div_listar">
        <div class="container theme-showcase" role="main">
			<div class="page-header">
                <h1>Lista de Reservas</h1>
            </div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#Nº Reserva</th>
								<th>Nome do Cliente</th>
                                <th>Telefone</th>
                                <th>Local</th>
								<th>Data</th>
                                <th>Pessoas</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_reservas = mysqli_fetch_assoc($resultado_reservas)){ ?>
								<tr>
									<td><?php echo $rows_reservas['id']; ?></td>
									<td><?php echo $rows_reservas['nome']; ?></td>
                                    <td><?php echo $rows_reservas['telefone']; ?></td>
                                    <td><?php echo $rows_reservas['local']; ?></td>
                                    <td><?php echo $rows_reservas['data_formatada']; ?></td>
                                    <td><?php echo $rows_reservas['quantpessoas']; ?></td>
									<td>
                                        <form action="proc_apagar_usuario.php" method="POST">
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_reservas['id']; ?>">Visualizar</button>
                                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_reservas['id']; ?>" data-whatevernome="<?php echo $rows_reservas['nome']; ?>"data-whatevertelefone="<?php echo $rows_reservas['telefone']; ?>" data-whateverdata="<?php echo $rows_reservas['data']; ?>" data-whateverlocal="<?php echo $rows_reservas['local']; ?>" data-whateverpessoas="<?php echo $rows_reservas['quantpessoas']; ?>">Editar</button>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="confirmarExcluir()" data-whatever="<?php echo $rows_reservas['id']; ?>">Excluir</button>
                                        </form>
									</td>
                                </tr>
                                <!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_reservas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_reservas['nome']; ?></h4>
											</div>
											<div class="modal-body">
                                            <h4>Telefone: </h4><p><?php echo $rows_reservas['telefone']; ?></p><br>
                                            <h4>Local: </h4><p><?php echo $rows_reservas['local']; ?></p><br>
                                            <h4>Data: </h4><p><?php echo $rows_reservas['data']; ?></p><br>
                                            <h4>Quantidade de Pessoas: </h4><p><?php echo $rows_reservas['quantpessoas']; ?></p><br>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
        </div>
        <br><br>
        <button class="btn_voltar" onclick="back()">Voltar</button>
        <div>
        

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Editar Reserva</h4>
			  </div>
			  <div class="modal-body" onfocus="maxPes()">
				<form method="POST" action="processa.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome:</label>
                    <input type="text" spellcheck="false" class="form-control" id="recipient-name" name="nome" required>
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Telefone:</label>
                    <input type="text" placeholder="Telefone do Cliente" onkeypress="mascara(this, '## #####-####')" maxlength="13" required id="telefone" class="form-control" name="telefone">
                  </div>
                  <div class="form-group">
					<label for="message-text" class="control-label">Local:</label>
                    <select name="local" id="local" onchange="maxPessoas()" class="form-control" required>
                        <option value="Deck">Deck</option>
                        <option value="Calçada">Calçada</option>
                        <option value="Lateral">Lateral</option>
                        <option value="Salão Interno">Salão Interno</option>
                    </select>
                  </div>
                  <div class="form-group">
					<label for="message-text" class="control-label">Data:</label>
                    <input type="date" id="data" name="data" class="form-control" required>
                  </div>
                  <div class="form-group" onfocus="maxPes()">
					<label for="message-text" class="control-label">Quantidade de Pessoas:</label>
                    <input type="number" id="quantPessoas" name="quantPessoas" min="1" max="90" class="form-control" required onfocus="maxPes()">
				  </div>
				<input name="id" type="hidden" class="form-control" id="id-reservas" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Alterar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>

        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  var recipientnome = button.data('whatevernome')
          var recipienttelefone = button.data('whatevertelefone')
          var recipientlocal = button.data('whateverlocal')
          var recipientdata = button.data('whateverdata')
          var recipientpessoas = button.data('whateverpessoas')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('Protocolo Nº: ' + recipient + ' / ' + 'Nome: ' + recipientnome);
          modal.find('#id-reservas').val(recipient);
          modal.find('#recipient-name').val(recipientnome);
          modal.find('#telefone').val(recipienttelefone);
          modal.find('#local').val(recipientlocal);
          modal.find('#data').val(recipientdata);
          modal.find('#quantPessoas').val(recipientpessoas);
		});
	</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <script>
            function back() {
                window.location = ('home.php');
            }
        </script>
    </body>
</html>
