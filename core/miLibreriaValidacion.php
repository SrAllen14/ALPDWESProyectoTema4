<?php
/*
 * @author Álvaro Allén Perlines
 * @since 28-10-2025
 * Libreria de funciones de validación de campos de cuestionario.
 */
    class miLibreriaValidacion{
        /*
         * Función para validar si una fecha de nacimiento es valida según el año indicado.
         * 
         * @param DateTime $fechaEnviada que es la fecha que se recibe en el cuestionario/formulario.
         * @param int $edad que es la edad recibida en el cuestionario.
         * @return string $mensajeError que contiene un texto con el motivo del error de validación o, en caso de no haber erorres, contiene valor null.
         */
        public static function validarNacimiento($fechaEnviada, $edad){
            // Declaramos e inicializamos la variable de retorno $mensajeError a null.
            $mensajeError = null;
            
            // Declaramos e inicializamos la variable de tipo DateTime $fechaNacimiento con el valor de $fechaEnviada.
            $fechaNacimiento = new DateTime($fechaEnviada);
            // Declaramos e inicializamos la variable de tipo DateTime $fechaActual con la fecha actual.
            $fechaActual = new DateTime('now', new DateTimeZone('Europe/Madrid'));
            
            // Si la edad recibida es diferente a la diferencia de la fecha recibida en el formulario menos la fecha de nacimiento entonces no será valida.
            if($edad != $fechaNacimiento->diff($fechaActual)->y){
                // Cambiamos la variable $mensajeError para que indique el motivo del error.
                $mensajeError = "La edad y la fecha no son compatibles.";
            }
            
            // Retornamos la variable
            return $mensajeError;
        }
    }
?>
