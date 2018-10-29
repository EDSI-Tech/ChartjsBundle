<?php

namespace fados\ChartjsBundle\Twig;


class ChartjsExtension extends \Twig_Extension
{

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
        );
    }

    public function getConfig(\Twig_Environment $twig)
    {
        return $twig->render('ChartjsBundle:default:chartjs_config.html.twig');
    }

    public function getCanvas(\Twig_Environment $twig, $graphic)
    {
        return $twig->render('ChartjsBundle:default:chartjs_canvas.html.twig', array('graphic' => $graphic));
    }

    public function getScript(\Twig_Environment $twig, $graphic)
    {
        return $twig->render('ChartjsBundle:default:chartjs_init.js.twig', array('graphic' => $graphic));
    }

    public function getChart(\Twig_Environment $twig, $graphic)
    {
        return $twig->render('ChartjsBundle:default:chartjs_chart.html.twig', array('graphic' => $graphic));
    }

}