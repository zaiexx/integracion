<?php

  namespace Drupal\migracion\Controller;

  use Drupal\Core\Controller\ControllerBase;
  use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
  use Drupal\Core\Template\TwigEnvironment;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\DependencyInjection\ContainerInterface;

  class MigracionController extends ControllerBase implements ContainerInjectionInterface {

  protected $twig;

  public function __construct(TwigEnvironment $twig) {
    $this->twig = $twig;
  }

  public static function create(ContainerInterface $container) {
    return new static($container->get('twig'));
  }

  public function content(Request $request) {

    $response = new Response();

    $twigFilePath = drupal_get_path('module', 'custom_module') . '/templates/html--migracion.html.twig';
    $template = $this->twig->loadTemplate($twigFilePath);

    $markup = $this->twig->loadTemplate($twigFilePath)->render();
    $response->headers->set('Content-Type', 'text/html; charset=utf-8');
    $response->setContent($markup);

    return $response;
  }
}