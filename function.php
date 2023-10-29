<?php
/*
Plugin Name: rn-wp-holidays
Description: Ein WordPress-Plugin für die Auswahl von Feiertagen.
Version: 0.1.0
Author: Ruben Norgall
*/

defined('ABSPATH') or die('Kein direkter Zugriff erlaubt!');

// Funktionen und Variablen mit dem Präfix "rnhd"
add_action('admin_menu', 'rnhd_add_menu');

function rnhd_add_menu() {
    add_menu_page(
        'Feiertage auswählen',
        'Feiertage',
        'manage_options',
        'rnhd-holidays',
        'rnhd_render_page',
        'dashicons-calendar', // Passende Dashicon
        30
    );
}

function rnhd_render_page() {
    ?>
    <div class="wrap">
        <h2>Feiertage auswählen</h2>
        <form method="post" action="">
            <input type="radio" name="rnhd_selected_holiday" value="none" <?php checked(get_option('rnhd_selected_holiday'), 'none'); ?>> Kein
            <br>
            <input type="radio" name="rnhd_selected_holiday" value="easter" <?php checked(get_option('rnhd_selected_holiday'), 'easter'); ?>> Ostern
            <br>
            <input type="radio" name="rnhd_selected_holiday" value="halloween" <?php checked(get_option('rnhd_selected_holiday'), 'halloween'); ?>> Halloween
            <br>
            <input type="radio" name="rnhd_selected_holiday" value="christmas" <?php checked(get_option('rnhd_selected_holiday'), 'christmas'); ?>> Weihnachten
            <br><br>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'rnhd_init');

function rnhd_init() {
    register_setting('rnhd_options', 'rnhd_selected_holiday');
}

