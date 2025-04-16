<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;
use Flynt\Utils\Options;

use const Flynt\Archives\POST_TYPES;

$context = Timber::get_context();
$page = get_page_by_title( 'Hike', OBJECT, 'page');
$context['post'] = Timber::get_post($page->ID);
Timber::render('templates/hike.twig', $context);
