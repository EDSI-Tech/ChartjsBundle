<?php

namespace fados\ChartjsBundle\Twig;


use Symfony\Component\DependencyInjection\ContainerInterface;

class ChartjsExtension extends \Twig_Extension
{

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

    }


    public function getName()
    {
        return 'chartjs_extensions';
    }

    public function getFunctions()
    {

        return array(
            new \Twig_SimpleFunction('chartjs_config', array($this, 'getConfig'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig_SimpleFunction('chartjs_chart', array($this, 'getChart'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig_SimpleFunction('chartjs_canvas', array($this, 'getCanvas'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig_SimpleFunction('chartjs_init', array($this, 'getScript'), array('is_safe' => array('html'), 'needs_environment' => true)),
            new \Twig_SimpleFunction('parameter', function($name) {   return $this->container->getParameter($name); }),
        );
    }

    public function getConfig(\Twig_Environment $twig)
    {
        return $twig->render('ChartjsBundle:lib:chartjs_config.js.twig');
    }

    public function getCanvas(\Twig_Environment $twig, $graphic)
    {
        return $twig->render('ChartjsBundle:lib:chartjs_canvas.html.twig', array('graphic' => $graphic));
    }

    public function getScript(\Twig_Environment $twig, $graphic)
    {
        return $twig->render('ChartjsBundle:lib:chartjs_init.js.twig', array('graphic' => $graphic));
    }

    public function getChart(\Twig_Environment $twig, $graphic)
    {
        return $twig->render('ChartjsBundle:lib:chartjs_chart.html.twig', array('graphic' => $graphic));
    }

}