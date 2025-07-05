<?php 

if (!defined('ABSPATH')) {
    exit;
}

function wp_user_change_menu() {
    add_options_page(
        'WP User Change', 
        'WP User Change', 
        'manage_options', 
        'wp-user-change', 
        'wp_user_change_options_page'
    );
}
add_action('admin_menu', 'wp_user_change_menu');

// page d'option
function wp_user_change_options_page() {
    ?>
    <div class="wrap">
        <h1>WP User Change Options</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('wp_user_change_options_group');
            $redirect_url = get_option('wp_user_change_redirect_url', '');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">URL de redirection</th>
                    <td><input type="text" name="wp_user_change_redirect_url" value="<?php echo esc_attr($redirect_url); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Enregistrement des options
function wp_user_change_register_settings() {
    register_setting('wp_user_change_options_group', 'wp_user_change_redirect_url');
}
add_action('admin_init', 'wp_user_change_register_settings');