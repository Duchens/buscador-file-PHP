<?php
function docuInt($varDocu)    //Funcion que lee el ducumento linea por linea hasta que topa con los 10 guiones ----------
{ 
     static $i = 0; 
		if ($i >= count($varDocu)) 
		return false;  
		
    $fin = '----------';   
    $fvector = array(); 
	 
		while ($fin != trim($varDocu[$i])) { 
			$fvector[] = $varDocu[$i]; 
			$i++; 
		} 
		
    $i++; 
		if (count($fvector) == 0) 
		return false;
		  
    return $fvector; 
}  


function calculoPuntos($fvector)  //Funcion que calcula el puntaje
{ 
    $vectorConc = array(); 
    
	foreach ($fvector as $linea) { 
        $stringEx = explode(' ',$linea); 
    
	foreach ($stringEx as $conceptoEx) { 
            $nuevaPalabra = separacion_minuscula($conceptoEx); 
   
    if ('' != $nuevaPalabra) { 
        
		if (isset($vectorConc[$nuevaPalabra])) { 
               $vectorConc[$nuevaPalabra]++;   //Incremantamos luego de laiteración
         
		 } else 
		      { 
               $vectorConc[$nuevaPalabra] = 1;  //Si no se cumple la condicion del si asignamos 1a la lista
              }
			   
            } 
        } 
    } 
	
    return $vectorConc; 
}

function separacion_minuscula($palabra)   //Funcion que elimina los espacios y las mayusculas
{ 
    $palabra = strtolower(trim($palabra)); 
    return $palabra; 
}  

function puntajeArch($var1, $fvector) {  //Funcion que calcula el puntaje final
    $puntajeF = 0; 
    foreach ($var1 as $concepto => $puntajeCon) { 
      if (isset($fvector[$concepto])) { 
            $puntajeF += sqrt($puntajeCon*$fvector[$concepto]); //Raiz cuadrada de la sumatoria de puntaje de las palabras
        } 
    } 
    return $puntajeF; 
}  

?>