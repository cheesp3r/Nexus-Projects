<?php
include_once("dbcon.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$sql = "DELETE FROM reservas WHERE id='$id'";
	$sql_result = mysqli_query($conn, $sql);
	if(mysqli_affected_rows($conn)){
		echo 
        "<script>
            alert('Reserva excluída com Sucesso');
            window.location = ('lista-reservas.php');
        </script>";
	}else{
		echo 
        "<script>
            alert('Erro: Reserva não foi excluída com Sucesso');
            window.location = ('lista-reservas.php');
        </script>";
	}
}else{	
	echo 
        "<script>
            alert('É necessário selecionar uma reserva');
            window.location = ('lista-reservas.php');
        </script>";
}
