<?php
	include_once("dbcon.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
	$local = mysqli_real_escape_string($conn, $_POST['local']);
	$data = mysqli_real_escape_string($conn, $_POST['data']);
	$quantpessoas = mysqli_real_escape_string($conn, $_POST['quantPessoas']);

	$sql = "UPDATE reservas SET nome='$nome', telefone =  '$telefone', local = '$local', data = '$data', quantpessoas = '$quantpessoas' WHERE id = '$id'";
	
	$resultado_reservas = mysqli_query($conn, $sql);
	if (mysqli_query($conn, $sql)) {
        echo 
        "<script>
            alert('Reserva alterada com Sucesso');
            window.location = ('lista-reservas.php');
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);;
    }
    mysqli_close($conn);
?>

<?php // $conn->close(); ?>