<?php

namespace Drupal\custom_field_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
* Plugin implementation of the 
*    'MyCustomFormattera' formatter.
*
* @FieldFormatter(
*   id = "custom_f_ff_my_custom_formatter",
*   label = @Translation("Field Formatter - Bold style"),
*   field_types = {
*     "string_long",
*     "string"
*   }
* )
*/
class MyCustomFFormatterf extends FormatterBase  {

	public function viewElements(FieldItemListInterface $items, $langcode)
	{
		$elementsf = [];
		$servicedata = "";
		
		//Cheking if service started or not
		if (\Drupal::hasService('custom_field_formatter.text_slugify_service') ) {
			$servicedata = \Drupal::service('custom_field_formatter.text_slugify_service');
		}
		else{
			\Drupal::logger('Field Formatter Services')->notice('You have requested a non-existent service');
		}

		foreach($items as $delta => $item){

		//Fetching value from the services function
		$value = $servicedata->createUrlSlug($item->value);
		
			$elementsf[$delta] = [
				'#markup' => "Bold style -> <strong>$value</strong>",
			];
		}
		return $elementsf;
	}

}

