<?php

namespace Flynt;

use Flynt\Utils\FileLoader;

require_once __DIR__ . '/vendor/autoload.php';

if (!defined('WP_ENV')) {
    define('WP_ENV', function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production');
} elseif (!defined('WP_ENVIRONMENT_TYPE')) {
    define('WP_ENVIRONMENT_TYPE', WP_ENV);
}

// Check if the required plugins are installed and activated.
// If they aren't, this function redirects the template rendering to use
// plugin-inactive.php instead and shows a warning in the admin backend.
if (Init::checkRequiredPlugins()) {
    FileLoader::loadPhpFiles('inc');
    add_action('after_setup_theme', ['Flynt\Init', 'initTheme']);
    add_action('after_setup_theme', ['Flynt\Init', 'loadComponents'], 101);
}

// Remove the admin-bar inline-CSS as it isn't compatible with the sticky footer CSS.
// This prevents unintended scrolling on pages with few content, when logged in.
add_theme_support('admin-bar', array('callback' => '__return_false'));

add_action('after_setup_theme', function () {
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('flynt', get_template_directory() . '/languages');
});

add_action('widgets_init', function () {
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar1'
        )
    );
});

// Load custom template for web requests going to "/account" or "/account/<..>/..."
function load_captaincore_template($original_template)
{
    global $wp;
    $request = explode('/', $wp->request);
    $current = current($request);
    $next = next($request);
    if ($current == "hike" && $next == "trail") {
        return plugin_dir_path(__FILE__) . 'single-trail.php';
    } else if ($current == "hike" && $next == "signup") {
        return plugin_dir_path(__FILE__) . 'single-trail.php';
    } else if ($current == "hike" && $next == "entries") {
        return plugin_dir_path(__FILE__) . 'single-trail.php';
    } else if (is_page('hike') || $current == "hike") {
        return plugin_dir_path(__FILE__) . 'templates/hike.php';
    }
    return $original_template;
}
add_filter('template_include', 'Flynt\load_captaincore_template');

// Disable 404 redirects when unknown request goes to "/account/<..>/..." which allows a custom template to load. See https://wordpress.stackexchange.com/questions/3326/301-redirect-instead-of-404-when-url-is-a-prefix-of-a-post-or-page-name
function disable_404_redirection_for_captaincore($redirect_url)
{
    global $wp;
    if (strpos($wp->request, "hike/") !== false) {
        return false;
    }
    return $redirect_url;
}
add_filter('redirect_canonical', 'Flynt\disable_404_redirection_for_captaincore');


add_action('admin_enqueue_scripts', function ($hook) {
    //only load this script for a certain URL page slug
    $path =  '/wp-content/themes/wild-montana-flynt/hike/admin.js';
    $page_name = $_GET['page'] ?? '';
    global $post;
    $slug = $post->post_name;
    // If slug === hike
    wp_enqueue_script('textdomain/custom-admin-js', $path, ['jquery']);
});

function clear_trail_data()
{
    $allposts = get_posts(array('post_type' => 'trail', 'numberposts' => -1));
    foreach ($allposts as $eachpost) wp_delete_post($eachpost->ID, true);
}
function prefix_send_email_to_admin()
{
    /**
     * At this point, $_GET/$_POST variable are available
     *
     * We can do our normal processing here
     */

    // Sanitize the POST field
    // Generate email content
    // Send to appropriate email

    // $allposts = get_posts(array('post_type'=>'trail','numberposts'=>-1));
    // foreach ($allposts as $eachpost) wp_delete_post($eachpost->ID, true);

    // $data = $_POST['data'];
    $name = $_POST['name'];
    $data = $_POST['trails'];
    // print_r($name);
    // print_r($data);
    // $trailArray = array("Allen Peak Trail #466", "Antone Peak", "Arrastra Creek Loop Trails #488 and #482", "Badger Cabin", "Bailey Lake, Trail #293", "Baker Lake, Trail #234", "Baldy-Edith Basin and Peaks Loop Trail #151", "Baldy Mountain", "Barry's Island at Bighorn Canyon NRA", "Basin Lakes Trail #61 (NRT)", "Bass Creek Overlook #392", "Bass Creek Trail #4", "Bear-Baree Loop (Trails #489 and #178)", "Bear Canyon Creek Trail", "Bear Canyon Ridge Trail (BLM #1014, USFS #2492 and #2814)", "Bear Prairie Trail through Refrigerator Canyon #259", "Bear Track Trail #8 (Sheep Creek Trail) to Silver Run Plateau", "Bear Trap Canyon National Recreation Trail (NRT)", "Bear Trap Canyon West Trail", "Beaver Pond Nature Trail at Bighorn Canyon NRA", "Beehive Basin Trail #40", "Big Baldy Mountain #401, 414, 416 in the Little Belts", "Big Creek Trail #180", "Big Creek Trail, Trail #11", "Bigfork Foothills XC Trail", "Big Hole Lookout", "Bighorn Head Gate at Bighorn Canyon NRA", "Big Sky Ridge Trail", "Big Snowies Ice Caves", "Big Snowy Trail #650 to Lost Peak/Maynard Ridge", "Big Spar Lake Trail ", "Big Timber Creek Trail #119 to Granite Lake #118", "Birch Lake", "Bitter Creek Wilderness Study Area", "Black Butte Trail to Dailey Creek", "Black Diamond Trail", "Blackfoot Meadows #329", "Blackmore Trail #423 to Blackmore Peak Trail #415", "Blacktail Mountain XC Trails - \"Alpine\" Loop", "Blodgett Creek Trail #19", "Blodgett Overlook Trail, Trail #101", "Bobcat Lakes, Trail #226", "Bohart Ranch XC Ski Center's Logger's Loop", "Boulder Creek Trail, Trail #617", "Boulder Lakes Trail #142", "Bramlet Lake via Bramlet Creek #658", "Brandon Butte, CMR Wildlife Refuge", "Bridge Coulee Wilderness Study Area, Musselshell Breaks", "Bridger Bowl South Loop", "Bridger Bowl, Trail #532 to Hawk Watch");
    $decoded_json = json_decode(html_entity_decode(stripslashes($data)));;
    $trailTitleData = $decoded_json->trails[0];
    echo 'trailTitleData: ';
    print_r($trailTitleData);
    // $postarr = array();
    foreach ($decoded_json->trails as &$trailName) {
        wp_insert_post(array(
            // 'post_title' => 'Test Trail:' . $name . ' [decoded_json]' . $trailTitleData,
            'post_title' => $trailName->title,
            'post_status' => 'publish',
            'post_type' => 'trail',
            'meta_input' => array(
                // 'trail_image' => 'https://cdn.elebase.io/4d98752b-d833-4239-8a68-bf5ba176f5df/385684ba-7f72-4433-90f2-4ea2480a75b7-wmt875769eb2be662d5f.jpg',
                // 'description_text' => "The shortest, most direct route to the summit of Allen Peak, where you'll enjoy surprising vistas of the Cabinet Mountains and ridges beyond.",
                'trail_image' => $trailName->image_url,
                'description_text' => $trailName->summary,
            )
        ));
    }
    // $contentType = trim($_SERVER["CONTENT_TYPE"] ?? ''); // PHP 8+
    // /* Send error to Fetch API, if unexpected content type */
    // if ($contentType !== "application/json")
    //     die(json_encode([
    //         'value' => 0,
    //         'error' => 'Content-Type is not set as "application/json"',
    //         'data' => null,
    //     ]));

    // /* Receive the RAW post data. */
    // $content = trim(file_get_contents("php://input"));

    /* $decoded can be used the same as you would use $_POST in $.ajax */
    // $decoded = json_decode($content, true);

    /* Send error to Fetch API, if JSON is broken */
    // if (!is_array($decoded))
    //     die(json_encode([
    //         'value' => 0,
    //         'error' => 'Received JSON is improperly formatted',
    //         'data' => null,
    //     ]));

    /* NOTE: For some reason I had to add the next line as well at times, but it hadn't happen for a while now. Not sure what went on */
    // $decoded = json_decode($decoded, true);

    /* Do something with received data and include it in response */
    // dumb e.g.
    // $response = $decoded['trails']; // 3
    // echo $response;
    /* Perhaps database manipulation here? */
    // query, etc.

    /* Send success to fetch API */
    // die(json_encode([
    //     'value' => 1,
    //     'error' => null,
    //     'data' => null, // or ?array of data ($response) you wish to send back to JS
    // ]));
    // echo $data;
    echo 'Name: ';
    echo $name;
    echo '\n';
    echo $data[0];
    echo "Post not received.";
}
add_action('admin_post_nopriv_contact_form', 'Flynt\prefix_send_email_to_admin');
add_action('admin_post_contact_form', 'Flynt\prefix_send_email_to_admin');
add_action('admin_post_nopriv_clear_trail_data', 'Flynt\clear_trail_data');
add_action('admin_post_clear_trail_data', 'Flynt\clear_trail_data');
