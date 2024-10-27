<?

function save_calculator_data() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'save_calculator_data_nonce')) {
        wp_die('Nieautoryzowany dostęp');
    }

    $product_name = sanitize_text_field($_POST['product_name']);
    $net_price = floatval($_POST['net_price']);
    $vat_rate = intval($_POST['vat_rate']);
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $submission_date = current_time('mysql');

    $vat_amount = $net_price * ($vat_rate / 100);
    $gross_price = $net_price + $vat_amount;

    $post_id = wp_insert_post([
        'post_title' => $product_name,
        'post_type' => 'taxdata',
        'post_status' => 'publish',
        'meta_input' => [
            'net_price' => $net_price,
            'vat_rate' => $vat_rate,
            'vat_amount' => $vat_amount,
            'gross_price' => $gross_price,
            'user_ip' => $user_ip,
            'submission_date' => $submission_date,
        ],
    ]);


    // test debug
    $meta_data = get_post_meta($post_id);
    error_log('Meta data: ' . print_r($meta_data, true));

    wp_redirect(home_url('/?success=1'));
    exit;
}
add_action('admin_post_save_calculator_data', 'save_calculator_data');
add_action('admin_post_nopriv_save_calculator_data', 'save_calculator_data');
