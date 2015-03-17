<?php
$hola="hola";
  function curlFile($url,$proxy_ip,$proxy_port,$login_passw)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $login_passw);
    $cadena= curl_exec($ch);
    curl_close($ch);

$jsoan=json_decode($cadena);
$valor1= $jsoan->time;
$t=time();
    $r=date("H:i:s-d/m/Y",$t) ;
   
    
echo 'time:'.$valor1.' ';
$valor2=$jsoan->value;
echo 'valor:'.$valor2.' ';
$e=strval( round($valor2,4,PHP_ROUND_HALF_UP) );
hola($r,$e);

}

function hola($val1,$val2){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asignacion";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO almacen(tiempo,valor)
    VALUES ('$val1','$val2')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "datos agregados con exito";
    }
catch(PDOException $e)
    {
    echo "error al agregar";
    }

$conn = null;

}



curlFile('http://engels.soy/concurso2015i/api.php?val=kW' , '10.164.1.27', '8080','sesa371309:Avanzados1');





?>


