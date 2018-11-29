<!doctype html>
<html lang="pt-br">
    <head>
        <title> Nova Reserva </title>
        <meta charset='utf-8'>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
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
        <script>
            function maxPessoas(){
            var localizacao = document.getElementById('local').value;
            if (localizacao === 'Deck'){
                document.getElementById('quantPessoas').max = 50;
            } else if (localizacao === 'Calçada') {
                document.getElementById('quantPessoas').max = 90;
            } else if (localizacao === 'Lateral') {
                document.getElementById('quantPessoas').max = 90;
            } else if (localizacao === 'Salão Interno') {
                document.getElementById('quantPessoas').max = 40;
            }
            document.getElementById('quantPessoas').value = 1;
            }
        </script>
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
		<script type="text/javascript">
			jQuery(window).load(function($){
				atualizaRelogio();
			});
		</script>
    </head>
    <body>
        <!-- DIV CADASTRO DE RESERVAS -->
        <form class="div_cad_reserva" action="cadastrar.php" method="POST">
            <p class="p">Cadastrar Nova Reserva</p>
            <input type="text" placeholder="Nome do Cliente" spellcheck="false" id="nome" name="nome" maxlength="50" required>
            <br><br>
            <input type="text" placeholder="Telefone do Cliente" onkeypress="mascara(this, '## #####-####')" minLength="13" maxlength="13" required id="telefone" name="telefone">
            <br><br>
            <label class="lbl">Localização</label>
            <div class="search_categories">
                <div class="select">
                    <select name="local" id="local" onchange="maxPessoas()" required>
                        <option value="Deck">Deck</option>
                        <option value="Calçada">Calçada</option>
                        <option value="Lateral">Lateral</option>
                        <option value="Salão Interno">Salão Interno</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="lbl">Data</label> <br>
            <input type="date" id="data" name="data" required>
            <br><br>
            <label class="lbl">Número de Pessoas</label> <br>
            <input type="number" id="quantPessoas" name="quantPessoas" min="1" value="1" required max="90" onfocus="maxPessoas()">
            <br><br>
            <input type="submit" class="btn2" value="Reservar">
            <br><br>
            <button class="btn_voltar" onclick="back()">Voltar</button>
        </form>
        <script src="js/script.js"></script>
        <script>
            function back() {
                window.location = ('home.php');
            }
        </script>
        <script>
		function atualizaRelogio(){ 
			var momentoAtual = new Date();
			var vdia = momentoAtual.getDate();
			var vmes = momentoAtual.getMonth() + 1;
			var vano = momentoAtual.getFullYear();
			dataFormat = vdia + "/" + vmes + "/" + vano;
			document.getElementById("date").value = dataFormat;
		}
	</script>
    </body>
</html>
