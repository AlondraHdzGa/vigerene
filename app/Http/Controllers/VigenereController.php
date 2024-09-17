<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VigenereController extends Controller
{
    public function encriptar(Request $r){

        $texto = strtoupper($r->texto);//se guarda el texto en esta variable convertido en mayusculas
        $key = strtoupper(str_replace(' ','',$r->key));//se define la llave como PANDA

        $resultado = '';//preparamos la variable que va a guardar el resultado del texto encriptado
        $lAlpha = 26;//definimos la longitud que corresponde al alfabeto

        // Repetimos la clave para que coincida con el tamaño del texto
            $fullKey = $this->repetirKey($texto, $key);

        //A L O N D R A
        //P A N D A P A
        //0 1 2 3 4 5 6
        //P L B

        //i = 2
        for ($i = 0; $i < strlen($texto); $i++) { //recorremos mediante un for la cantidad de caracteres del texto a encriptar
             if (ctype_alpha($texto[$i])) {//revisa si se trata de una letra del alfabeto
                // Convertimos las letras en índices de 0 a 25
                    $textoIndex = ord($texto[$i]) - ord('A'); //79 - 65 = 14
                    $keyIndex = ord($fullKey[$i]) - ord('A'); //78 - 65 = 13

                // Sumar los índices y aplicar módulo 26
                    $cIndex = ($textoIndex + $keyIndex) % $lAlpha; // 27%26 = 1

                // Convertir de vuelta a una letra
                    $resultado .= chr($cIndex + ord('A')); //(1+65) = 66 = B
            } else {
                // Si no es una letra, añadirla sin cifrar
                $resultado .= $texto[$i];
            }
        }

        return $resultado;

    }//end function


    public function desencriptar (Request $r){
        $textoCifrado = strtoupper($r->texto); // Se guarda el texto cifrado en una variable y se convierte a mayúsculas
        $key = strtoupper(str_replace(' ','',$r->key));

        $resultado = ''; // Variable para almacenar el texto desencriptado
        $lAlpha = 26; // Longitud del alfabeto

        $fullKey = $this->repetirKey($textoCifrado, $key);


        for ($i = 0; $i < strlen($textoCifrado); $i++) {
            if (ctype_alpha($textoCifrado[$i])) { // Verificamos que sea una letra
                // Convertimos las letras en índices de 0 a 25
                    $cifradoIndex = ord($textoCifrado[$i]) - ord('A');
                    $keyIndex = ord($fullKey[$i]) - ord('A');

                // Restamos los índices y aplicamos módulo 26 para desencriptar
                    $textoIndex = ($cifradoIndex - $keyIndex + $lAlpha) % $lAlpha;

                // Convertir de vuelta a una letra
                    $resultado .= chr($textoIndex + ord('A'));
            } else {
                // Si no es una letra, añadirla sin desencriptar
                $resultado .= $textoCifrado[$i];
            }
        }
        return $resultado;

    }//end desencriptar function

    public function repetirKey ($texto, $key){
        $keyLength = strlen($key);
        $fullKey = '';

        // Repetimos la clave para que coincida con el tamaño del texto
        for ($i = 0; $i < strlen($texto); $i++) {
            $fullKey .= $key[$i % $keyLength];
        }

        return $fullKey;
    }

}
