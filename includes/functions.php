<?

function handle_save_calculator_data() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'save_calculator_data_nonce')) {
        wp_die('Nieprawidłowy nonce. Spróbuj ponownie.');
    }

    $product_name = sanitize_text_field($_POST['product_name']);
    $net_price = floatval($_POST['net_price']);
    $vat_rate = $_POST['vat_rate'];

    if ($vat_rate === 'zw' || $vat_rate === 'np' || $vat_rate === 'o.o.') {
        $gross_price = $net_price;
        $tax_amount = 0;
    } else {
        $vat_rate_decimal = floatval($vat_rate) / 100;
        $gross_price = $net_price * (1 + $vat_rate_decimal);
        $tax_amount = $gross_price - $net_price;
    }

    $user_ip = $_SERVER['REMOTE_ADDR'];
    $date = current_time('mysql');

    $post_id = wp_insert_post(array(
        'post_title' => $product_name,
        'post_type' => 'calculator_entries',
        'post_status' => 'publish',
        'meta_input' => array(
            'net_price' => $net_price,
            'gross_price' => $gross_price,
            'tax_amount' => $tax_amount,
            'user_ip' => $user_ip,
            'submission_date' => $date,
        ),
    ));

    if (is_wp_error($post_id)) {
        wp_die('Wystąpił błąd podczas zapisywania danych. Spróbuj ponownie.');
    }

    wp_redirect(home_url('/thank-you'));
    exit;
}

add_action('admin_post_save_calculator_data', 'handle_save_calculator_data');
add_action('admin_post_nopriv_save_calculator_data', 'handle_save_calculator_data');
