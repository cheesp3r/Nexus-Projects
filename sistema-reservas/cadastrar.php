<?php
    include_once("dbcon.php");

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $local = $_POST['local'];
    $data = $_POST['data'];
    $quantpessoas = $_POST['quantPessoas'];

    $sql = "INSERT INTO reservas (nome, telefone, local, data, quantpessoas) VALUES";
    $sql .= "('$nome', '$telefone', '$local', '$data', '$quantpessoas')";
    if (mysqli_query($conn, $sql)) {
        echo 
        "<script>
            alert('Reserva realizada com Sucesso');
            window.location = ('home.php');
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);;
    }
    mysqli_close($conn);
?>