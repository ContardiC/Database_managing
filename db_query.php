<link rel="stylesheet" type="text/css" href="assets/css/db_style.css"/>
<?php
/**
 * Created by Carlo Contardi.
 * User: carlocontardi
 * Date: 03/04/18
 * Time: 11:32
 */
include 'db_connect.php';
$sql="SELECT id,nome,password,conta_visite FROM users";
/*
$ris=mysql_query($sql);
echo "<TABLE>
        <TR>
            <TH>ID</TH>
            <TH>NOME</TH>
            <TH>PASSWORD</TH>
            <TH>CONTA VISITE</TH>
        </TR>";
while($riga=mysql_fetch_array($ris)){
    echo"<TR>";
    echo    "<TD>".$riga['id']."</TD>";
    echo    "<TD>".$riga['nome']."</TD>";
    echo    "<TD>".$riga['password']."</TD>";
    echo    "<TD>".$riga['conta_visite']."</TD>";
    echo "</TR>";
}
*/
$res=$conn->query($sql);
if($res->num_rows>0){
    $alt=true;
    echo "<TABLE id='user-table'>
        <TR>
            <TH>ID</TH>
            <TH>NOME</TH>
            <TH>PASSWORD</TH>
            <TH>CONTA VISITE</TH>
        </TR>";
    while($riga=$res->fetch_assoc()){
        //verifica se la riga è pari o dispari
        // per cambiare il colore di sfondo
        $altClass= $alt ? "CLASS='alt'" : "";
        echo"<TR>";
        echo    "<TD ". $altClass.">".$riga['id'];
        echo    "<TD ". $altClass.">".$riga['nome'];
        echo    "<TD ". $altClass.">".$riga['password'];
        echo    "<TD ". $altClass.">".$riga['conta_visite'];
        echo "</TR>";
        $alt=!$alt;
    }
}else{
    echo "Nessun risultato";
}
$conn->close();