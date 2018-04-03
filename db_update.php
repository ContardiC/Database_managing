<?php
/**
 * Created by Carlo Contardi.
 * User: carlocontardi
 * Date: 03/04/18
 * Time: 17:30
 */
include 'db_connect.php';
// Se il campo form non è attivo mostra il form
if(!isset($_POST['invia'])&&!isset($_POST['modificato'])){
    echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
    echo    "<table>";
    echo        "<tr>";
    echo            "<td>ID utente da mofidicare ";
    echo            "<td><input type='text' name='id'>";
    echo        "</tr>";
    echo        "<tr>";
    echo            "<td><input type='submit' value='Cerca record' name='invia'>";
    echo        "</tr>";
    echo    "</table>";
    echo  "</form>";
}else{
    //Verifico se deve cercare o modificare
    if(!isset($_POST['modificato'])){
        $id=$_POST['id'];
        $sql="SELECT * FROM users WHERE id=$id";
        $res=$conn->query($sql);
        if($res->num_rows>0){
            $row=$res->fetch_assoc();
            echo "<form action='".$_SERVER['PHP_SELF']."'  method='post'>";
            echo    "<table>";
            echo        "<tr>";
            echo            "<th>ID";
            echo            "<th>Nome";
            echo            "<th>Password";
            echo            "<th>Conta visite";
            echo        "</tr>";
            echo        "<tr>";
            echo            "<td><input type='text' name='id' readonly value='".$row['id']."'";
            echo            "<td><input type='text' name='nome' value='".$row['nome']."'";
            echo            "<td><input type='text' name='password'  value='".$row['password']."'";
            echo            "<td><input type='text' name='conta_visite'  value='".$row['conta_visite']."'";
            echo        "</tr>";
            echo        "<tr>";
            echo            "<td><input type='submit' value='Modifica' name='modificato'>";
            echo    "</table>";
            echo "</form>";


        }else{
            echo "Record inesistente";
        }
    }else{
        // Se è stato cliccato Modifica
        $id=$_POST['id'];
        $nome=$_POST['nome'];
        $password=$_POST['password'];
        $conta_visite=$_POST['conta_visite'];
        $sql="UPDATE users 
                    SET nome='$nome',
                        password='$password',
                        conta_visite=$conta_visite
                    WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully<br>";
            echo "<a href='".$_SERVER['PHP_SELF']."'>Ok";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
}