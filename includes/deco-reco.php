<?php 


if (!defined('ABSPATH')) {
    exit;
}


function custom_handle_impersonate() {
    if (isset($_GET['impersonate_user']) && current_user_can('administrator')) {
        $user_id = absint($_GET['impersonate_user']);
        $nonce = $_GET['_wpnonce'];

        if (!wp_verify_nonce($nonce, 'impersonate_user_nonce')) {
            wp_die('Échec de la vérification de sécurité.');
        }
        
        $redirect_to = get_option('wp_user_change_redirect_url', '');
        if (empty($redirect_to)) {
            $redirect_to = admin_url('profile.php'); 
        } else {
            $redirect_to = esc_url_raw($redirect_to);
        }

        // deco reco
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        wp_redirect($redirect_to);
        exit;
    }
}
add_action('admin_init', 'custom_handle_impersonate');