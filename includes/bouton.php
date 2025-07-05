<?php 

if (!defined('ABSPATH')) {
    exit;
}


// ajoute le bouton
function custom_impersonate_button($actions, $user) {
    if (current_user_can('administrator')) {
        $redirect_to = urlencode($_SERVER['REQUEST_URI']);
        $actions['impersonate'] = '<a href="' . esc_url(wp_nonce_url(add_query_arg(array('impersonate_user' => $user->ID, 'redirect_to' => $redirect_to), admin_url('users.php')), 'impersonate_user_nonce')) . '">Se connecter en tant que ' . esc_html($user->display_name) . '</a>';
    }
    return $actions;
}
add_filter('user_row_actions', 'custom_impersonate_button', 10, 2);
