<?php
	$dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

	switch  ($dias[date('w')-1]) {
	  case "Lunes":
		echo "Hoy es lunes, toca ir a correr";
	        break;
	case "Martes":
                echo "Hoy es martes, toca comer espaghetis";
                break;
	case "Miercoles":
                echo "Hoy es miercoles, toca cenar curri al aguillo";
                break;
	case "Jueves":
                echo "Hoy es Jueves, toca jugar al pong";
                break;
	case "Viernes":
                echo "Hoy es Viernes, toca ir al gimnasio";
                break;
	case "Sabado":
                echo "Hoy es Sabado, toca leer un libro";
                break;
	case "Domingo":
                echo "Hoy es Domingo, toca estudiar para IAW";
                break;}
?>
