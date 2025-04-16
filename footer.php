<?php

use Timber\Timber;
$context = Timber::get_context();

Timber::render('templates/footer.twig', $context);
