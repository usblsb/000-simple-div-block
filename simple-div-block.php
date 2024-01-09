<?php
/**
 * Plugin Name: 000 Simple Div Block
 * Plugin URI: https://webyblog.es/
 * Description: Un plugin sencillo para añadir un bloque 'div' en Gutenberg.
 * Version: 07-01-2024
 * Author: Juan Luis Martel
 * Author URI: https://www.webyblog.es
 * License: GPL2
 */

// Prevenir acceso directo al archivo del plugin
if ( ! defined( 'ABSPATH' ) ) exit;


function jlmr_mensaje_ayuda_container_div_block_register_block( $links_array, $plugin_file_name, $plugin_data, $status ) {
    if ( strpos( $plugin_file_name, basename(__FILE__) ) ) {
        // Construye la URL del archivo de ayuda
        $ayuda_url = plugins_url( 'ayuda.html', __FILE__ );

        // Añade el enlace de 'Ayuda' al final de la lista de enlaces
        $links_array[] = '<a rel="noopener noreferrer nofollow" href="' . esc_url( $ayuda_url ) . '" target="_blank">Ayuda</a>';
    }
    return $links_array;
}
add_filter( 'plugin_row_meta', 'jlmr_mensaje_ayuda_container_div_block_register_block', 10, 4 );


function jlmr_container_div_block_register_block() {
    wp_register_script(
        'container-div-block-editor-script',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
    );

    register_block_type( 'container-div/block', array(
        'editor_script' => 'container-div-block-editor-script',
    ) );
}

add_action( 'init', 'jlmr_container_div_block_register_block' );
