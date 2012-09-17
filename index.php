<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Jean-Pierre-Duchens">
<title>El buscador</title>


</head>
<?php

include('funciones.php'); // Llamada funciones

	$entrada = file('input.txt');  //llamada a fichero input.txt
	$leer = docuInt($entrada);    //LLamada función  docuInt que lee el ducumento linea por linea
	$stringdeBusqueda = array();   // instancia de array almacenado referencia en la variable $stringdeBusqueda
	$stringdeBusqueda = calculoPuntos($leer); //Funcion que calcula terminos
	/******almacenamos resultados*******/
	$contenido = array();   

while (false != $documento = docuInt($entrada)) //bucle while que se ejecuta hasta uqe ducumento sea distinto de falso o no este vacio
{ 
    $palabraArc = array(); $palabraArc = calculoPuntos($documento); 
    $contenido[] = round(puntajeArch($stringdeBusqueda, $palabraArc), 3); 
} 
	$ficheroSalida = fopen('output.txt','w');             //Guardamos los resultadoscon la funcion 'fopen' en modo escritura en un fichero llamado output.txt
	fwrite($ficheroSalida, join("\r\n", $contenido));  //pasamos los parametros para almacenar los resultados con salto de liea para win
	fclose($ficheroSalida); //cerramos fichero

?>
<body>
</body>
</html>