<?php

function theme_enqueue_styles()
{
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', []);
    wp_enqueue_style('tailwind-style', get_stylesheet_directory_uri() . '/assets/css/styles.css?', array(), filemtime( get_stylesheet_directory() . '/assets/css/styles.css'), 'all' );
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 20);

function avada_lang_setup()
{
    $lang = get_stylesheet_directory() . '/languages';
    load_child_theme_textdomain('Avada', $lang);
}

add_action('after_setup_theme', 'avada_lang_setup');


add_filter('wpsl_templates', 'custom_templates');

function custom_templates($templates)
{

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array(
        'id' => 'custom',
        'name' => 'Zenleaf Template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/zen-custom-locations.php',
    );

    return $templates;
}

add_filter('wpsl_thumb_size', 'custom_thumb_size');

function custom_thumb_size()
{

    $size = array(216, 366);

    return $size;
}

add_filter('wpsl_dropdown_category_args', 'custom_dropdown_category_args');

function custom_dropdown_category_args($args)
{

    $args['show_count'] = 1;
    if (is_page('locations')) {
        // 60 is ID for the parent category, 'states'
        $args['parent'] = 60; // parent category ID
        $args['hierarchical'] = true; // only show the child categories
    }
    return $args;
}


add_action('wp_enqueue_scripts', 'zenleaf_register_scripts');

function zenleaf_register_scripts()
{
    wp_register_script(
        'zenleaf-custom-function',
        get_stylesheet_directory_uri() . '/assets/js/zenleaf-custom-function.js',
        array('jquery')
    );

    wp_localize_script(
        'zenleaf-custom-function',
        'zenleaf',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax-nonce')
        )
    );

    wp_enqueue_script('zenleaf-custom-function');
}


function get_state_name_from_code($state_code)
{
    $states = array(
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'PR' => 'Puerto Rico',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming'
    );
    return $states[$state_code];
}

function get_zenleaf_store_tiny_thumbnail($id)
{
    $thumb_data = get_post_meta($id, '_wp_attached_file')[0];
    return site_url() . '/wp-content/uploads/' . $thumb_data;
}


function get_zenleaf_store_hours($id)
{
  /*  $store_hours_data = get_post_meta($id, 'wpsl_hours')[0];

    $today = new DateTime('NOW');
    $day_of_week = intval($today->format('w'));
    $todays_hours = null;
    if ($day_of_week === 1) {
        if (isset($store_hours_data['monday'][0])) {
            $todays_hours = $store_hours_data['monday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    } else if ($day_of_week === 2) {
        if (isset($store_hours_data['tuesday'][0])) {
            $todays_hours = $store_hours_data['tuesday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    } else if ($day_of_week === 3) {
        if (isset($store_hours_data['wednesday'][0])) {
            $todays_hours = $store_hours_data['wednesday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    } else if ($day_of_week === 4) {
        if (isset($store_hours_data['thursday'][0])) {
            $todays_hours = $store_hours_data['thursday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    } else if ($day_of_week === 5) {
        if (isset($store_hours_data['friday'][0])) {
            $todays_hours = $store_hours_data['friday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    } else if ($day_of_week === 6) {
        if (isset($store_hours_data['saturday'][0])) {
            $todays_hours = $store_hours_data['saturday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    } else {
        if (isset($store_hours_data['sunday'][0])) {
            $todays_hours = $store_hours_data['sunday'][0];
        } else {
            $todays_hours = 'Closed';
        }
    }
    if ($todays_hours !== 'Closed') {
        $time_explosion = explode(',', $todays_hours);
        $final_string = 'Open ' . $time_explosion[0] . ' to ' . $time_explosion[1];
    } else {
        $final_string = 'Closed';
    }
    return $final_string; */
}


function get_zenleaf_store_hours_all($id)
{
    $store_hours_data = get_post_meta($id, 'wpsl_hours')[0];

    $time_buckets = [];
    $time_bucket_days = [];
    $time_bucket_stamp = '';
    if (isset($store_hours_data['monday'][0])) {

        $time_raw = explode(",", $store_hours_data['monday'][0]);
        $monday = $time_raw[0] . " - " . $time_raw[1];
    } else {
        $monday = 'Closed';
    }
    $time_bucket_stamp = $monday;
    $time_bucket_days[] = "Monday";

    if (isset($store_hours_data['tuesday'][0])) {
        $time_raw = explode(",", $store_hours_data['tuesday'][0]);
        $tuesday = $time_raw[0] . " - " . $time_raw[1];

    } else {
        $tuesday = 'Closed';
    }

    if ($tuesday === $monday) {
        $time_bucket_days[] = "Tuesday";
    } else {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
        $time_bucket_days = [];
        $time_bucket_days[] = "Tuesday";
        $time_bucket_stamp = $tuesday;
    }
    ////*******zzzz end of day*******/////


    if (isset($store_hours_data['wednesday'][0])) {

        $time_raw = explode(",", $store_hours_data['wednesday'][0]);
        $wednesday = $time_raw[0] . " - " . $time_raw[1];
    } else {
        $wednesday = 'Closed';
    }

    if ($tuesday === $wednesday) {
        $time_bucket_days[] = "Wednesday";
    } else {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
        $time_bucket_days = [];
        $time_bucket_days[] = "Wednesday";
        $time_bucket_stamp = $wednesday;
    }
    ////*******zzzz end of day*******/////


    if (isset($store_hours_data['thursday'][0])) {

        $time_raw = explode(",", $store_hours_data['thursday'][0]);
        $thursday = $time_raw[0] . " - " . $time_raw[1];
    } else {
        $thursday = 'Closed';
    }

    if ($wednesday === $thursday) {
        $time_bucket_days[] = "Thursday";
    } else {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
        $time_bucket_days = [];
        $time_bucket_days[] = "Thursday";
        $time_bucket_stamp = $thursday;
    }
    ////*******zzzz end of day*******/////

    if (isset($store_hours_data['friday'][0])) {

        $time_raw = explode(",", $store_hours_data['friday'][0]);
        $friday = $time_raw[0] . " - " . $time_raw[1];
    } else {
        $friday = 'Closed';
    }


    if ($thursday === $friday) {
        $time_bucket_days[] = "Friday";
    } else {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
        $time_bucket_days = [];
        $time_bucket_days[] = "Friday";
        $time_bucket_stamp = $friday;
    }
    ////*******zzzz end of day*******/////


    if (isset($store_hours_data['saturday'][0])) {
        $time_raw = explode(",", $store_hours_data['saturday'][0]);
        $saturday = $time_raw[0] . " - " . $time_raw[1];
    } else {
        $saturday = 'Closed';
    }


    if ($friday === $saturday) {
        $time_bucket_days[] = "Saturday";
    } else {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
        $time_bucket_days = [];
        $time_bucket_days[] = "Saturday";
        $time_bucket_stamp = $saturday;
    }
    ////*******zzzz end of day*******/////
    if (isset($store_hours_data['sunday'][0])) {
        $time_raw = explode(",", $store_hours_data['sunday'][0]);
        $sunday = $time_raw[0] . " - " . $time_raw[1];
    } else {
        $sunday = 'Closed';
    }


    if ($saturday === $sunday) {
        $time_bucket_days[] = "Sunday";
    } else {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
        $time_bucket_days = [];
        $time_bucket_days[] = "Sunday";
        $time_bucket_stamp = $sunday;
    }
    ////*******zzzz end of day*******/////

    if (count($time_bucket_days) > 0) {
        $time_buckets[] = (object)array("timestamp" => $time_bucket_stamp, "days" => $time_bucket_days);
    }

    $time_rows = '';
    foreach ($time_buckets as $bucket_of_days) {
        $number_of_days = count($bucket_of_days->days);
        if ($number_of_days === 1) {
            $time_rows .= "<p style='text-align: center; color: #ffffff;'>" . $bucket_of_days->days[0] . " " . $bucket_of_days->timestamp . "</p>";
        }
        if ($number_of_days >= 2) {
            $last_entry = $number_of_days - 1;
            $time_rows .= "<p style='text-align: center; color: #ffffff;'>" . $bucket_of_days->days[0] . " - " . $bucket_of_days->days[$last_entry] . " " . $bucket_of_days->timestamp . "</p>";
        }
    }


    return $time_rows;
}

function get_store_data_from_id($id)
{
    $store_data_b = get_post_meta($id);
    $store_data_a = get_post($id);
    $store_thumb_id = $store_data_b["_thumbnail_id"][0];
    $store_data = (object)array(
        'id' => $id,
        'name' => $store_data_a->post_title,
        'subtitle' => $store_data_b["wpsl_company_subtitle"][0],
        'recreational_menu' => $store_data_b["wpsl_recreational_menu_url"][0],
        'medical_menu' => $store_data_b["wpsl_medical_menu_url"][0],
        'street' => $store_data_b["wpsl_address"][0],
        'city' => $store_data_b["wpsl_city"][0],
        'state_abbr' => strtoupper($store_data_b["wpsl_state"][0]),
        'state_full' => get_state_name_from_code($store_data_b["wpsl_state"][0]),
        'hours_today' => get_zenleaf_store_hours($id),
        'zip' => $store_data_b["wpsl_zip"][0],
        'phone' => $store_data_b["wpsl_phone"][0],
        'lat' => $store_data_b["wpsl_lat"][0],
        'lng' => $store_data_b["wpsl_lng"][0],
        'url' => $store_data_b["wpsl_url"][0],
        'thumb_url' => get_zenleaf_store_tiny_thumbnail($store_thumb_id),
    );
    $store_element = write_element_for_zenleaf_store_result($store_data);
    $store_element_card = write_shop_card_element($store_data);
    $store_data->element = $store_element;
    $store_data->card_element = $store_element_card;
    return $store_data;
}

add_action('wp_ajax_nopriv_get_list_of_zenleaf_stores', 'get_list_of_zenleaf_stores');
add_action('wp_ajax_get_list_of_zenleaf_stores', 'get_list_of_zenleaf_stores');

function state_sort($a, $b) {
    return strcmp(get_state_name_from_code($a->state_code), get_state_name_from_code($b->state_code));
}
function get_list_of_zenleaf_stores()
{
    global $wpdb;
    $store_data_list = array();
    $list_of_state_codes = $wpdb->get_results($wpdb->prepare("SELECT distinct(meta_value) as state_code FROM `wp_postmeta` WHERE meta_key = 'wpsl_state' ORDER BY state_code ASC"));
    usort($list_of_state_codes,"state_sort");
    
    foreach ($list_of_state_codes as $state_code) {
        $state_name = get_state_name_from_code($state_code->state_code);
        $state_menu_option = write_element_for_zenleaf_menu($state_code->state_code, $state_name);
        $store_data_list[$state_code->state_code] = (object)array("menu_element" => $state_menu_option, "state_abbr" => $state_code->state_code, "state_full" => $state_name, "stores" => [], "store_count" => 0, 'elements' => [], 'card_container' => 'stores-in-state-' . $state_code->state_code);
    }
    $store_id_results = $wpdb->get_results($wpdb->prepare("SELECT distinct(post_id) as store_id FROM `wp_postmeta` WHERE meta_key = 'wpsl_lat'"));
    foreach ($store_id_results as $store_id) {
        $id = intval($store_id->store_id);
        $store_data = get_store_data_from_id($id);
        $store_data_list[$store_data->state_abbr]->stores [] = $store_data;
        $store_data_list[$store_data->state_abbr]->elements [] = $store_data->element;
        $store_data_list[$store_data->state_abbr]->store_count++;
    }

    $store_main_menu_elemental_content = '';

    foreach ($store_data_list as $state_to_process) {
        $elemental_content = '';
        foreach ($state_to_process->elements as $element) {
            $elemental_content .= $element;
        }
        $state_to_process->state_menu = write_menu_frame_zenleaf_sub($elemental_content, $state_to_process->state_abbr, $state_to_process->state_full);
        $store_main_menu_elemental_content .= $state_to_process->menu_element;
    }
    $store_main_menu = write_menu_frame_zenleaf_main($store_main_menu_elemental_content);

    echo json_encode(['stores' => $store_data_list, 'menu' => $store_main_menu]);
    wp_die();
}

function get_list_of_zenleaf_stores_in_state($state_code)
{
    global $wpdb;
    $state_name = get_state_name_from_code($state_code);
    if ($state_name) {
        $cards = [];
        $state_data = (object)array("state_abbr" => $state_code, "state_full" => $state_name, "stores" => [], "store_count" => 0, 'elements' => [], 'card_container' => 'stores-in-state-' . $state_code);
        $store_id_results = $wpdb->get_results($wpdb->prepare("SELECT distinct(post_id) as store_id FROM `wp_postmeta` WHERE meta_key = 'wpsl_state' AND meta_value = '" . $state_code . "'"));
        foreach ($store_id_results as $store_id) {
            $id = intval($store_id->store_id);
            $store_data = get_store_data_from_id($id);
            $state_data->stores [] = $store_data;
            $state_data->elements [] = $store_data->element;
            $state_data->store_count++;
            $cards[] = write_shop_card_element($store_data);
        }
        $state_data->card_grid = write_shop_card_container($cards);
        return $state_data;
    }
    return null;
}


function write_element_for_zenleaf_store_result($store)
{

    $output = "<div class='row glowrow state-" . $store->state_abbr . "'>";
    $output .= "<div class='zen-column-img'>";
    if ($store->subtitle && (strlen($store->subtitle) > 0)) {
        $output .= "<img class='shop-now-thumbnail' alt='Photo of ". $store->subtitle ." Shop' src='" . $store->thumb_url . "'>";
    } else {
        $output .= "<img class='shop-now-thumbnail' alt='Photo of ". $store->name ." Shop' src='" . $store->thumb_url . "'>";
    }
    $output .= "</div>";
    $output .= "<div class='zen-column-address'>";
    if ($store->url) {
        if ($store->subtitle && (strlen($store->subtitle) > 0)) {
            $output .= "<a class='shop-link' href='".site_url().$store->url."'><p class='shop-name'>" . $store->subtitle . "</p></a>";
        } else {
            $output .= "<a class='shop-link' href='".site_url().$store->url."'><p class='shop-name'>" . $store->name . "</p></a>";
        }
    }
    else {
        if ($store->subtitle && (strlen($store->subtitle) > 0)) {
            $output .= "<p class='shop-name'>" . $store->subtitle . "</p>";
        } else {
            $output .= "<p class='shop-name'>" . $store->name . "</p>";
        }
    }
    $output .= "<p class='shop-address'>" . $store->street . "</p>";
    $output .= "<p class='shop-hours'>" . $store->hours_today . "</p>";
    $output .= "</div>";
    $output .= "<div class='zen-column-shop-now'>";
    $output .= "<a class='shop-here-button' href='" . site_url() . strtolower($store->url) . "'><span class='grey-text'>SHOP HERE</span>&nbsp;&nbsp;<i class='fa fa-angle-right' aria-hidden='true'></i></a>";
    $output .= "</div>";
    $output .= "</div>";
    return $output;
}

function write_empty_shop_card()
{
    $output = "<div class='card no-mobile'>";
    $output .= "<div class='card-top card-halve'>";
    $output .= "</div>";
    $output .= "<div class='card-bottom card-halve'>";
    $output .= "</div>";
    $output .= "</div>";
    return $output;
}

function write_shop_card_container($content_array)
{
    $content = '';
    $counter = 0;
    foreach ($content_array as $content_piece) {
        $content .= $content_piece;
        $counter++;
        if ($counter === 3) {
            $counter = 0;
            $content .= "<div style='flex-basis:100%;'></div>";
        }
    }
    if ($counter > 0) {
        $content .= write_empty_shop_card();
        if ($counter === 1) {
            $content .= write_empty_shop_card();
        }
        $content .= "<div style='flex-basis:100%;'></div>";
    }
    return "<div class='stores-in-state-container'>" . $content . "</div>";
}

function write_shop_card_element($store)
{

    $output = "<div class='card'>";
    $output .= "<div class='card-top card-halve' style='background-image: url(" . $store->thumb_url . ")'>";
    $output .= "</div>";
    $output .= "<div class='card-bottom card-halve'>";

    if ($store->url) {
        if ($store->subtitle && ($store->subtitle !== '')) {
            $output .= "<a class='card-url' href='".site_url() . $store->url ."'><h3 class='card-title-text'>" . $store->subtitle . "</h3></a>";
            $output .= "<h4 class='card-subtitle-text'>" . $store->city . "</h4>";
        } else {
            $output .= "<a class='card-url' href='".site_url() . $store->url ."'><h3 class='card-title-text'>" . $store->city . "</h3></a>";
            $output .= "<h4 class='card-subtitle-text'>" . $store->name . "</h4>";
        }
    } else {
        if ($store->subtitle && ($store->subtitle !== '')) {
            $output .= "<h3 class='card-title-text'>" . $store->subtitle . "</h3>";
            $output .= "<h4 class='card-subtitle-text'>" . $store->city . "</h4>";
        } else {
            $output .= "<h3 class='card-title-text'>" . $store->city . "</h3>";
            $output .= "<h4 class='card-subtitle-text'>" . $store->name . "</h4>";
        }
    }

    $output .= "<p class='card-street-text'>" . $store->street . "</p>";
    $output .= "<p class='card-citystate-text'>" . $store->city . " " . $store->state_abbr . ", " . $store->zip . "</p>";
    $output .= "<p class='card-phone-text'>" . $store->phone . "</p>";
    $output .= "</div>";
    $output .= "</div>";
    return $output;
}


function write_element_for_zenleaf_menu($state_code, $state_name)
{
    $output = "<p class='state_menu_option' onclick='event.stopPropagation(); viewStateMenu(\"" . $state_code . "\")'>" . $state_name . "<i class='before-goes-right fa fa-angle-right' aria-hidden='true'></i></p>";
    return $output;
}

function write_menu_frame_zenleaf_main($contents)
{
    $output = "<div class='main_order_now_menu'>";
    $output .= "<p class='breadcrumb-states'>Shop by State</p>";
    $output .= "<p class='breadcrumb-states-subtext'>Select a state below or <a class='tiny-zen-url' href='" . site_url() . "/locations/'>view all locations nationwide.</a></p>";
    $output .= $contents . "</div>";
    return $output;
}

function write_menu_frame_zenleaf_sub($contents, $state_code, $state_name)
{
    $output = "<div class='sub_order_now_menu state-" . $state_code . "'>";
    $state_page_link = str_replace(" ", "-", strtolower($state_name));
    $output .= "<p class='breadcrumb-states'><span class='click-back' onclick='event.stopPropagation(); viewMainMenu()'>Shop by State</span>&nbsp;/&nbsp;" . $state_name . "</p>";
    $output .= "<p class='breadcrumb-states-subtext'>Select a location below or <a class='tiny-zen-url' href='" . site_url() . "/state-resources/" . $state_page_link . "'>view all locations in " . $state_name . "</a></p>";
    $output .= $contents . "</div>";
    return $output;
}

add_filter('wpsl_meta_box_fields', 'custom_meta_box_fields');

function custom_meta_box_fields($meta_fields)
{

    $meta_fields[__('Additional Information', 'wpsl')] = array(
        'phone' => array(
            'label' => __('Tel', 'wpsl')
        ),
        'fax' => array(
            'label' => __('Fax', 'wpsl')
        ),
        'email' => array(
            'label' => __('Email', 'wpsl')
        ),
        'url' => array(
            'label' => __('Url', 'wpsl')
        ),
        'medical_menu_url' => array(
            'label' => __('Medical Menu URL', 'wpsl')
        ),
        'recreational_menu_url' => array(
            'label' => __('Recreational Menu URL', 'wpsl')
        ),
        'company_subtitle' => array(
            'label' => __('Company / Store Subtitle', 'wpsl')
        ),
        'gmb_url' => array(
            'label' => __('Google My Business URL', 'wpsl')
        )
    );

    return $meta_fields;
}


add_action('init', 'zenshop_add_shortcodes');

function zenshop_add_shortcodes()
{
    add_shortcode('zen_shop_address', 'get_zen_shop_address');
    function get_zen_shop_address($atts)
    {
        $store_id = $atts['store_id'];
        if ($store_id && $store_id >= 0) {
            $store_data = get_post_meta($store_id);
            $full_address = "<i class='fas fa-map-marker-alt zenleaf-map-marker'></i>&nbsp;<a class='zenleaf-gmb-link' href='" . $store_data["wpsl_gmb_url"][0] . "' target='_blank'>" . $store_data["wpsl_address"][0] . ', ' . $store_data["wpsl_city"][0] . ', ' . $store_data["wpsl_state"][0] . ' ' . $store_data["wpsl_zip"][0] . "</a>";
            return $full_address;
        }
        return '';
    }

    add_shortcode('zen_shop_phone', 'get_zen_shop_phone');
    function get_zen_shop_phone($atts)
    {
        $store_id = $atts['store_id'];
        if ($store_id && $store_id >= 0) {
            $store_data = get_post_meta($store_id);
            $phone = "<p class='zenleaf-phone-number'>" . $store_data["wpsl_phone"][0] . "</p>";
            return $phone;
        }
        return '';
    }

    add_shortcode('zen_state_cards', 'get_zenleaf_cards_for_state');
    function get_zenleaf_cards_for_state($atts)
    {
        $state_abbr = strtoupper($atts['state']);
        if ($state_abbr) {
            $state_data = get_list_of_zenleaf_stores_in_state($state_abbr);
            if ($state_data->card_grid) {
                return $state_data->card_grid;
            }
        }
        return '';
    }

    add_shortcode('zen_shop_subheader', 'get_zen_shop_subheader');
    function get_zen_shop_subheader($atts)
    {
        $store_id = $atts['store_id'];
        if ($store_id && $store_id >= 0) {
            $hours = get_zenleaf_store_hours($store_id);
            $store_data = get_post_meta($store_id);
            $output = "<p style='text-align: center; color: #ffffff;'>" . $hours . "</p>";
            $output .= "<p style='text-align: center; color: #ffffff;'>" . $store_data["wpsl_address"][0] . ', ' . $store_data["wpsl_city"][0] . ', ' . $store_data["wpsl_state"][0] . ' ' . $store_data["wpsl_zip"][0] . "</p>";
            return $output;
        }
        return '';
    }

    add_shortcode('zen_shop_subheader_address', 'get_zen_shop_subheader_address');
    function get_zen_shop_subheader_address($atts)
    {
        $store_id = $atts['store_id'];
        if ($store_id && $store_id >= 0) {
            $store_data = get_post_meta($store_id);
            $output = "<p style='text-align: center; color: #ffffff;'>" . $store_data["wpsl_address"][0] . ', ' . $store_data["wpsl_city"][0] . ', ' . $store_data["wpsl_state"][0] . ' ' . $store_data["wpsl_zip"][0] . "</p>";
            return $output;
        }
        return '';
    }

    add_shortcode('zen_shop_subheader_hours', 'get_zen_shop_subheader_hours');
    function get_zen_shop_subheader_hours($atts)
    {
        $store_id = $atts['store_id'];
        if ($store_id && $store_id >= 0) {

            $output = get_zenleaf_store_hours_all($store_id);
            return $output;
        }
        return '';
    }

}

add_filter('wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail');

function wpse_100012_override_yoast_breadcrumb_trail($links)
{
    global $post;

    if (is_home() || is_singular('post') || is_archive()) {
        $breadcrumb[] = array(
            'url' => '/blog',
            'text' => 'Blog',
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
}

function post_title_shortcode()
{
    return get_the_title();
}

add_shortcode('post_title', 'post_title_shortcode');


add_filter('wpsl_frontend_meta_fields', 'custom_frontend_meta_fields');

function custom_frontend_meta_fields($store_fields)
{

    $store_fields['wpsl_recreational_menu_url'] = array(
        'name' => 'recreational_menu_url'
    );
    $store_fields['wpsl_medical_menu_url'] = array(
        'name' => 'medical_menu_url'
    );
    $store_fields['wpsl_company_subtitle'] = array(
        'name' => 'company_subtitle'
    );

    return $store_fields;
}


add_filter( 'wpsl_store_header_template', 'custom_store_header_template' );

function custom_store_header_template() {

    $header_template = '<% if ( wpslSettings.storeUrl == 1 && url ) { %>' . "\r\n";
    $header_template .= '<% if ( company_subtitle && company_subtitle.length > 0 ) { %>' . "\r\n";
    $header_template .= '<h3><a href="<%= url %>"><%= company_subtitle %></a></h3>' . "\r\n";
    $header_template .= '<% } else { %>' . "\r\n";
    $header_template .= '<h3><a href="<%= url %>"><%= store %></a></h3>' . "\r\n";
    $header_template .= '<% } %>';
    $header_template .= '<% } else { %>' . "\r\n";
    $header_template .= '<% if ( company_subtitle && company_subtitle.length > 0 ) { %>' . "\r\n";
    $header_template .= '<h3><%= company_subtitle %></h3>' . "\r\n";
    $header_template .= '<% } else { %>' . "\r\n";
    $header_template .= '<h3><%= store %></h3>' . "\r\n";
    $header_template .= '<% } %>';
    $header_template .= '<% } %>';

    return $header_template;
}

add_filter('wpsl_listing_template', 'custom_listing_template');
function custom_listing_template()
{

    global $wpsl, $wpsl_settings;

    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t\t" . '<div class="wpsl-store-location">' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><%= thumb %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . wpsl_store_header_template('listing') . "\r\n"; // Check which header format we use
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format

    if (!$wpsl_settings['hide_country']) {
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    $listing_template .= "\t\t\t" . '</p>' . "\r\n";

    $listing_template .= "\t\t\t" . '<% if ( medical_menu_url && recreational_menu_url) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><strong>Offers</strong>: Medical, Recreational</p>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    $listing_template .= "\t\t\t" . '<% if ( medical_menu_url && !recreational_menu_url) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><strong>Offers</strong>: Medical</p>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    $listing_template .= "\t\t\t" . '<% if (!medical_menu_url && recreational_menu_url) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><strong>Offers</strong>: Recreational</p>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    // Show the phone, fax or email data if they exist.
    if ($wpsl_settings['show_contact_details']) {
        $listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span><strong>' . esc_html($wpsl->i18n->get_translation('phone_label', __('Phone', 'wpsl'))) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span><strong>' . esc_html($wpsl->i18n->get_translation('fax_label', __('Fax', 'wpsl'))) . '</strong>: <%= fax %></span>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span><strong>' . esc_html($wpsl->i18n->get_translation('email_label', __('Email', 'wpsl'))) . '</strong>: <%= email %></span>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '</p>' . "\r\n";
    }

    $listing_template .= "\t\t\t" . wpsl_more_info_template() . "\r\n"; // Check if we need to show the 'More Info' link and info
    $listing_template .= "\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t" . '<div class="wpsl-direction-wrap">' . "\r\n";

    if (!$wpsl_settings['hide_distance']) {
        $listing_template .= "\t\t\t" . '<%= distance %> ' . esc_html($wpsl_settings['distance_unit']) . '' . "\r\n";
    }

    $listing_template .= "\t\t\t" . '<%= createDirectionUrl() %>' . "\r\n";
    $listing_template .= "\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t" . '</li>';

    return $listing_template;
}

function get_zenleaf_store_hours_day_by_day_schema($id)
{
    $store_hours_data = get_post_meta($id, 'wpsl_hours')[0];
    $schema_hours = '';
    if (isset($store_hours_data['monday'][0])) {
        $time_raw = explode(",", $store_hours_data['monday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Monday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"},';
    }
    if (isset($store_hours_data['tuesday'][0])) {
        $time_raw = explode(",", $store_hours_data['tuesday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Tuesday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"},';
    }
    if (isset($store_hours_data['wednesday'][0])) {
        $time_raw = explode(",", $store_hours_data['wednesday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Wednesday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"},';
    }
    if (isset($store_hours_data['thursday'][0])) {
        $time_raw = explode(",", $store_hours_data['thursday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Thursday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"},';
    }
    if (isset($store_hours_data['friday'][0])) {
        $time_raw = explode(",", $store_hours_data['friday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Friday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"},';
    }
    if (isset($store_hours_data['saturday'][0])) {
        $time_raw = explode(",", $store_hours_data['saturday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Saturday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"},';
    }
    if (isset($store_hours_data['sunday'][0])) {
        $time_raw = explode(",", $store_hours_data['sunday'][0]);
        $schema_hours .= '{ "@type": "OpeningHoursSpecification", "dayOfWeek": "Sunday", "opens": "' .
            $time_raw[0] . '", "closes": "' . $time_raw[1] . '"}';
    }
    return $schema_hours;
}


add_action('wp_head', 'zenleaf_store_schema_data');

function zenleaf_store_schema_data()
{
    $store_id = get_store_from_url();
    if ($store_id) {
        $store_data = get_store_data_from_id($store_id);
        $hours = get_zenleaf_store_hours_day_by_day_schema($store_id);
        $output = '<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "' . $store_data->name . '",
  "image": "' . $store_data->thumb_url . '",
  "@id": "",
  "url": "' . $store_data->url . '",
  "telephone": "' . $store_data->phone . '",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "' . $store_data->street . '",
    "addressLocality": "' . $store_data->city . '",
    "postalCode": "' . $store_data->zip . '",
    "addressCountry": "US",
    "addressRegion": "' . $store_data->state_abbr . '"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": ' . $store_data->lat . ',
    "longitude": ' . $store_data->lng . '
  },
  "openingHoursSpecification": [' . $hours . '] 
}
</script>';
        echo $output;
    }
}


function get_store_from_url()
{
    global $wpdb;
    $page_url = get_permalink();
    $locations_pos = strpos($page_url, "/locations/");
    if ($locations_pos > 0) {
        $location_substr = substr($page_url, $locations_pos);
        $store_id_results = $wpdb->get_results($wpdb->prepare("SELECT distinct(post_id) as store_id FROM `wp_postmeta` WHERE meta_key = 'wpsl_url' AND meta_value = '" . $location_substr . "'"));
        foreach ($store_id_results as $store_id) {
            return intval($store_id->store_id);
        }
    }
    return false;
}




function myfunction_is_hundred_percent_template() {
    if (is_page_template( array('100-width.php','page-full-width-blank.php') ) ){
    $value=true;
    }
    return $value;
    }
    add_filter( 'fusion_is_hundred_percent_template', 'myfunction_is_hundred_percent_template', 11, 0 );


    function blog_author_data_func(){
        global $post;
        $post_id = $post->ID;
        $catName = "";
        $categories = get_the_category($post_id);
        $number_to_list = count($categories);
        $counter = 0;
        foreach((get_the_category($post_id)) as $category){
            $link = get_category_link($category);
            $catName .= '<a href="'.$link.'">'.$category->name . "</a>";
            $counter++;
            if ($counter !== $number_to_list) {
                $catName .= ", ";
            }
    
        }
        $post_date = get_the_date('F jS Y', $post_id);
        $author = get_the_author($post_id);
        return "<p class='author_post_text'>This entry was posted in " . $catName . " on " . $post_date . " by " . $author."</p>";
    }
    
    add_shortcode('blog_author_data','blog_author_data_func');
    