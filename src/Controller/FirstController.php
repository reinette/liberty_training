<?php

namespace Drupal\liberty_training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FirstController extends ControllerBase {

 /*   public static function create(ContainerInterface $container) {

    }
*/
    public function go() {

      $account = \Drupal::service('current_user');
      $name = $account->getUsername();

      $output = array(
          '#markup' => $name,
      );
      return $output;
    }

    public function go2($count) {

      $account = \Drupal::service('current_user');
      $name = $account->getUsername();

      $output = array(
          '#markup' => $name . " " . $count,
      );
      return $output;
    }

}