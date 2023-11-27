<?php
/**
 * Plugin Name: Words
 * Description: This plugin changes swearing words on your site to *****
 * Version: 0.0.1
 * Author: Marcos Avendaño
 * Author URI: http://asociacion.LexicorrecionAnonima.com
 */

// Acciones durante la activación del plugin
register_activation_hook(__FILE__, 'create_marcos_words_table');
register_activation_hook(__FILE__, 'insert_bad_words');

// Función que crea la tabla para almacenar las palabras a reemplazar
function create_marcos_words_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'marcosWords';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        word tinytext NOT NULL,
        replacement TEXT NOT NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Función para insertar palabras malsonantes y sus reemplazos en la tabla
function insert_bad_words() {
    $bad_words = array(
        'Ostia' => 'Ost***',
        'Hijos de Pera' => 'Hijos de P***',
        'PSOE' => 'Ladrones',
        'PP' => 'Consercadores no tan Ladrones',
        'Podemos' => 'Comunistas',
        'Ciudadanos' => 'Liberales',
        'Vox' => 'VIVA ESPAÑA VIVA VOX',
        'Pablo Iglesias' => 'HIJO DE PUTA',
        'Perra' => 'CANINA',
        'Puta' => 'PROMISCUA',
        'Cabronazo' => 'CABRON',
        'Idiota' => 'ESTOLIDO',
        'philosophy' => 'thinking',


        // Agrega más palabras malsonantes y sus reemplazos según sea necesario
    );

    global $wpdb;
    $table_name = $wpdb->prefix . 'marcosWords';

    foreach ($bad_words as $word => $replacement) {
        // Verificar si la palabra ya existe en la tabla
        $existing_word = $wpdb->get_var($wpdb->prepare(
            "SELECT word FROM $table_name WHERE word = %s",
            $word
        ));

        if (!$existing_word) {
            // Si la palabra no existe, insertarla en la tabla
            $wpdb->insert(
                $table_name,
                array(
                    'time' => current_time('mysql'),
                    'word' => $word,
                    'replacement' => $replacement,
                )
            );
        }
    }
}


// Función para reemplazar palabras en el contenido
function renym_wordpress_typo_fix($text) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'marcosWords';
    $results = $wpdb->get_results("SELECT word, replacement FROM $table_name", ARRAY_A);

    if ($results) {
        foreach ($results as $row) {
            $word = $row['word'];
            $replacement = $row['replacement'];
            $text = str_ireplace($word, $replacement, $text);
        }
    }

    return $text;
}
add_filter('the_content', 'renym_wordpress_typo_fix');
