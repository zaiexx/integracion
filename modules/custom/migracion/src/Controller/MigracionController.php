<?php
/**
 * @file
 * @author Rakesh James
 * Contains \Drupal\example\Controller\ExampleController.
 * Please place this file under your example(module_root_folder)/src/Controller/
 */
namespace Drupal\migracion\Controller;

use Drupal\Core\Controller\ControllerBase;


/**
 * Provides route responses for the module.
 */

 class MigracionController extends ControllerBase {

 /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */

   public function getMaps() {

    return [
      '#test_var' => $this->t('Test Value'),
    ];

  }
    
}
?>