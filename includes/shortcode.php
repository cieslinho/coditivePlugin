<?php
function form_shortcode(){
    ob_start();

?>

<div class="wrapper">
    <form method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="form" id="calculator">

    <input type="hidden" name="action" value="save_calculator_data">
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('save_calculator_data_nonce'); ?>">


        <div class="form__rows">
            <div class="form__row">
                <label for="product_name" class="form__label">Nazwa produktu:</label>
                <input type="text" name="product_name" id="product_name" class="form__input" required>
            </div>
            <p id="error_product_name" class="form__error"></p>
        </div>


        <div class="form__rows">
            <div class="form__row">
                <label for="net_price" class="form__label">Kwota netto:</label>
                <input type="number" name="net_price" id="net_price" class="form__input" required>
            </div>
            <p id="error_net_price" class="form__error"></p>
        </div>


        <div class="form__rows">
            <div class="form__row">
                <label for="product_currency" class="form__label">Waluta:</label>
                <input type="text" name="product_currency" id="product_currency" disabled value="PLN"
                    class="form__input form__disabled">
            </div>
            <!-- <p id="error_product_currency" class="form__error"></p> -->
        </div>


        <div class="form__rows">
            <div class="form__row">
                <label for="vat_rate" class="form__label">Stawka VAT:</label>
                <select name="vat_rate" id="vatSelect" class="form__select">
                    <option value="23">23%</option>
                    <option value="22">22%</option>
                    <option value="8">8%</option>
                    <option value="7">7%</option>
                    <option value="5">5%</option>
                    <option value="3">3%</option>
                    <option value="0">0%</option>
                    <option value="zw">zw.</option>
                    <option value="np">np.</option>
                    <option value="o.o.">o.o.</option>
                </select>
            </div>
            <!-- <p id="error_vat_rate" class="form__error"></p> -->
        </div>

        <button type="submit" id="btn" class="form__btn">Oblicz</button>

    </form>

    <div class="form__results">
        <p class="form__heading">Wyliczone Wartości:</p>
<div class="form__output">
    <p class="form__text">
    Cena produktu <span id="result_product_name"></span>, wynosi: <span id="result_gross_price"></span> zł brutto, kwota podatku to <span id="result_tax_amount"></span> zł.

    </p>
</div>
        
    </div>
</div>

<?php 

return ob_get_clean();
}

add_shortcode('form_coditive', 'form_shortcode');