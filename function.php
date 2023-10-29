<?php
/*
Plugin Name: rn-wp-holidays
Description: Ein WordPress-Plugin für die Auswahl von Feiertagen.
Version: 0.1.1
Author: Ruben Norgall
*/

#TO DOS:
/*
V1. - ADD ChRISTMANS (Snow)
V2. - ADD EASTER (Eggs)
v3. - ADD HALLOWEEN (Bats)
V4. - ADD NEXT

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

    if(isset($_POST['rnhd_selected_holiday'])){
        update_option('rnhd_selected_holiday',$_POST['rnhd_selected_holiday']);
        $selected_holiday = $_POST['rnhd_selected_holiday'];
    }else{
        $selected_holiday = get_option('rnhd_selected_holiday','none');
    }
    
 
    echo '<br>';
    // Abfrage der ausgewählten Feiertage
    if ($selected_holiday === 'none') {
        echo 'Es wurde kein Feiertag ausgewählt.';
    } elseif ($selected_holiday === 'easter') {
        echo 'Ostern wurde ausgewählt.';
    } elseif ($selected_holiday === 'halloween') {
        echo 'Halloween wurde ausgewählt.';
    } elseif ($selected_holiday === 'christmas') {
        echo 'Weihnachten wurde ausgewählt.';

        loadclass('Christmas');

    } else {
        echo 'Ungültige Auswahl';
    }
  

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

function loadclass($name){
    $lowername = strtolower($name);
    $path_to_file = plugin_dir_path(__FILE__) . 'holidays/'.$name.'.php';
    
    require_once($path_to_file);
    $holiday_class = new $name(true);
    $holiday_class->loadScript();
    $holiday_class->loadStyle();
}


