<?php

namespace Drupal\custom_field_formatter;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\Container;


/**
 * Class TextSlugifyService.
 *
 * @package Drupal\custom_field_formatter
 */
class TextSlugifyService {

	public function createUrlSlug($urlString) {
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
		return $slug;
	}

}
