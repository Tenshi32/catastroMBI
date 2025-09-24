<?php


require '../php/Model/basedata2.php';
$basedata = new baseData;

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$usuari = $data["nombre"];
$Passwd = $data["passwd"];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sidcambi';
$tables = '*';

descargarBD($dbhost, $dbuser, $dbpass, $dbname, $tables);


$sql = $basedata->conexion()->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND nivel = 0");
$sql->bindParam(":usuario", $usuari);
$sql->execute();

$result = $sql->rowCount();

if ($result > 0) {

    $sql = $basedata->conexion()->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND nivel = 0");
    $sql->bindParam(":usuario", $usuari);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if (password_verify($Passwd, $result['passwrd'])) {

        $dato = array(
            "id" => $result['id_usuario'],
            "descripcion" => "Ha Iniciado Sesion",
            "evento" => "Inicio de Sesion",
            "date" => date("d-m-Y"),
        );

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'sidcambi';
        $tables = '*';

        descargarBD($dbhost, $dbuser, $dbpass, $dbname, $tables);

        $respuesta = array('status' => true, "mensaje" => "La base de datos exportada con exito!");
        echo json_encode($respuesta);
        exit;

    } else {

        $respuesta = array('status' => false, "mensaje" => "La contraseña es incorrecta");
        echo json_encode($respuesta);
        exit;

    }



}   else    {

    $respuesta = array('status' => false, "mensaje" => "Usuario Incorrecto");
    echo json_encode($respuesta);
    exit;
    
}


//Core function
function descargarBD($host, $user, $pass, $dbname, $tables = '*') {
    $link = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) 
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {   
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }

    $fechaActual = date('Y-m-d'); // Obtiene la fecha actual en formato YYYY-MM-DD

    $fileName = 'db-backup-'.$fechaActual.'.sql';
    $handle = fopen($fileName,'w+');
    fwrite($handle,$return);
}
