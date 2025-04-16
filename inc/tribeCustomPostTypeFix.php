<?php
/**
 * Fixes a bug that generated bad urls for tribe events with the Custom Post Type plugin installed
 */

namespace Flynt\TribeCustomPostTypeFix;

function cptp_fix_recurring_event_links($url, $post, $leavename, $sample) {
    $url = str_replace('%tribe_events_slug%/%tribe_events_cat%', 'event', $url);
    return $url;
}
add_filter('post_type_link', 'Flynt\TribeCustomPostTypeFix\cptp_fix_recurring_event_links', 10, 4);
