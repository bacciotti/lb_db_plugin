<?php
/*
 * Plugin Name: Maps
 * Description: Mostra no mapa as coisas
 *  Version: 1.0.0
 * Author: Lucas B. M.
*/

if (!defined('ABSPATH')) {
    die;
}

register_activation_hook(__FILE__, 'lb_map_create_table');
function lb_map_create_table()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'lb_map_cidades_uf';
    $sql = "CREATE TABLE `$table_name` (
      `id` int(11) NOT NULL,
      `nome_cidade` varchar(220) DEFAULT NULL,
      `uf` varchar(220) DEFAULT NULL,
      PRIMARY KEY(id)
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
      ";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

require_once plugin_dir_path(__FILE__) . '/includes/lb_map_widget.php';
require_once plugin_dir_path(__FILE__) . '/includes/lb_map_scripts.php';