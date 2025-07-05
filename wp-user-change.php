<?php
/*
* Plugin Name: WP User Change
* Plugin URI: https://kevin-benabdelhak.fr/plugins/wp-user-change/
* Description: WP User Change est un plugin WordPress qui permet aux administrateurs de se connecter en tant qu'un autre utilisateur. Configurez une URL de redirection personnalisée.
* Version: 1.0
* Author: Kevin Benabdelhak
* Author URI: https://kevin-benabdelhak.fr/
* Contributors: kevinbenabdelhak
*/

if (!defined('ABSPATH')) {
    exit;
}




if ( !class_exists( 'YahnisElsts\\PluginUpdateChecker\\v5\\PucFactory' ) ) {
    require_once __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
}
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$monUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/kevinbenabdelhak/wp-user-change/', 
    __FILE__,
    'wp-user-change' 
);

$monUpdateChecker->setBranch('main');











define('WVT_PLUGIN_DIR', plugin_dir_path(__FILE__));

include_once(WVT_PLUGIN_DIR . 'includes/options.php');
include_once(WVT_PLUGIN_DIR . 'includes/bouton.php');
include_once(WVT_PLUGIN_DIR . 'includes/deco-reco.php');

