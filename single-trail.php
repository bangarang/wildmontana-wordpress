<?php

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$context['trail'] = new Post();
$page = get_page_by_title( 'Hike', OBJECT, 'page');
$context['post'] = Timber::get_post($page->ID);

Timber::render('templates/single-trail.twig', $context);
