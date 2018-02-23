<?php

namespace Drupal\liberty_training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Session\AccountProxy;

class FirstController extends ControllerBase {

	private $user;
    private $loggerFactoryService;

	public function __construct(LoggerChannelFactoryInterface $loggerFactory, AccountProxy $user) {
		$this->loggerFactoryService = $loggerFactory;
		$this->user = $user;
	}

    public static function create(ContainerInterface $container) {
        $loggerFactory = $container->get('logger.factory');
        $user = $container->get('current_user');

    	return new static($loggerFactory, $user);
    }

    public function go() {
      
      $account = $this->user;
      $name = $account->getUsername();

      $output = array(
          '#markup' => $name,
      );
      return $output;
    }

    public function go2($count) {

      $account = $this->user;
      $name = $account->getUsername();

	  $this->loggerFactoryService->get('default')->debug($name);

      $output = array(
          '#markup' => $name . " " . $count,
      );
      return $output;
    }

}