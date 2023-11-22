<?php
/**
 * @package Words
 * @version 0.0.1
 */
/*
Plugin Name: Words
Plugin URI: http://wordpress.org/plugins/words/
Description: This is a fantastic plugin that will change your life.that plugin will change all the swearing words in your site for *****.
Author: Marcos Avendaño
Version: 0.0.1
Author URI: http://asociacion.LexicorrecionAnonima.com
*/

//Funcion que cambia la palabra wordpress por wordpressDAm
function words_get_lyric() {

    $lyrics = "wordpress,php,Ostia,Hijos de Perra,Puta,Cabronazo,Idiota,Estupido,polla,Gilipollas"; // Aquí podrías tener un array de palabras separadas por comas o espacios, por ejemplo: "wordpress,php,coding"
    $lyrics = explode( ",", $lyrics ); // Separa las palabras usando la coma como delimitador (puedes cambiarlo si las palabras están separadas por otro caracter)
    return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

function renym_wordpress_typo_fix( $text ) {
    $words_to_replace = array(
        'wordpress' => 'WordPressDAM',
        'php' => 'PHPDAM',
        'Ostia' => 'Os***',
        'Hijos de Perra' => 'Hijos de P***',
        'Puta' => 'P***',
        'Cabronazo' => 'Cabron***',
        'Idiota' => 'Estolido',
        'Estupido' => 'necio',
        'polla' => 'pito',
        'Gilipollas' => 'Mamarracho',

        // Agrega más palabras y sus reemplazos aquí según tus necesidades
    );

    foreach ($words_to_replace as $word => $replacement) {
        $text = str_ireplace($word, $replacement, $text);
    }

    return $text;
}

add_filter( 'the_content', 'renym_wordpress_typo_fix' );

