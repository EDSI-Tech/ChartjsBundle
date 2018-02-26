<?php

namespace fados\ChartjsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ManagerRegistry;
use fados\ChartjsBundle\Model\ChartBuilderData;
use fados\ChartjsBundle\Utils\TypeChartjs;
use fados\ChartjsBundle\Utils\TypeColors;
use fados\ChartjsBundle\Model\ChartData;

class ChartjsController extends Controller
{

    public function mainTestAction() {
        return $this->render('ChartjsBundle:test:mainTest.html.twig');
    }

    public function barAction()
    {

        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_BAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
          array(
              'Profit' => array(23,45,65,12,34,45,88),
              'Cost' => array(13,34,54,11,34,35,48),
          ));
          $grafica->setBackgroundcolor(
              array(
                  TypeColors::aqua,
                  TypeColors::dark_green
              )
          );
          $grafica->setBordercolor(
                array(
                    TypeColors::aqua,
                    TypeColors::dark_green

                )
          );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');
        $grafica->setTitle('Sample Charjs Bar');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>$grafica->getTitle()));
    }

    public function stackedBarAction()
    {

        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_BAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
                'Cost' => array(13,34,54,11,34,35,48),
                'Ravenue'=> array(5,7,10,12,5,1,4),

            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::aqua,
                TypeColors::dark_green,
                TypeColors::red
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::aqua,
                TypeColors::dark_green,
                TypeColors::red

            )
        );
        $grafica->setOptions('
                    title:{
                         display:true,
                        text:"Chart.js Bar Chart - Stacked"
                    },
                    tooltips: {
                        mode: "index",
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
        ');
        $grafica->setBackgroundOpacity(1);
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'Stacked bar Chart'));
    }

    public function horizontalBarAction()
    {
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_HORIZONTALBAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
                'Cost' => array(13,34,54,11,34,35,48),
            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::aqua,
                TypeColors::dark_green
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::aqua,
                TypeColors::dark_green

            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'Horizontal bar Chart'));
    }

    public function pieAction()
    {
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_PIE);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::dark_violet,
                TypeColors::dark_green,
                TypeColors::dark_blue,
                TypeColors::dark_golden_rod,
                TypeColors::dark_magenta,
                TypeColors::dark_olive_green,
                TypeColors::dark_orange
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::dark_violet,
                TypeColors::dark_green,
                TypeColors::dark_blue,
                TypeColors::dark_golden_rod,
                TypeColors::dark_magenta,
                TypeColors::dark_olive_green,
                TypeColors::dark_orange
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');
        $grafica->setBackgroundOpacity(1);
        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'PIE Chart'));
    }

    public function radarAction()
    {
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_RADAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
                'Cost' => array(13,34,54,11,34,35,48),
            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::aqua,
                TypeColors::red
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::aqua,
                TypeColors::red

            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'Radar Chart'));
    }

    public function doughnutAction()
    {
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_DOUGHNUT);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::dark_violet,
                TypeColors::dark_green,
                TypeColors::dark_blue,
                TypeColors::dark_golden_rod,
                TypeColors::dark_magenta,
                TypeColors::dark_olive_green,
                TypeColors::dark_orange
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::dark_violet,
                TypeColors::dark_green,
                TypeColors::dark_blue,
                TypeColors::dark_golden_rod,
                TypeColors::dark_magenta,
                TypeColors::dark_olive_green,
                TypeColors::dark_orange
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');

        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'DOUGHNUT Chart'));
    }

    public function lineAction()
    {
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_LINE);
        $grafica->setLabels(array('Gener','Febrer','Mar','Abril','Maig','Juny','Juliol'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
             ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::red,
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::red,
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');
        $grafica->setOptions("
        animation: {
              duration: 0, // general animation time
        },
        hover: {
            animationDuration: 0, // duration of animations when hovering an item
        },
        responsiveAnimationDuration: 0, // animation duration after a resize"
        );

        $grafica->setDatasetConfig('
            pointStyle: \'star\',
        ');
        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'Line Chart'));
    }

    public function polarAreaAction()
    {
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_POLAR_AREA);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::dark_violet,
                TypeColors::dark_green,
                TypeColors::dark_blue,
                TypeColors::dark_golden_rod,
                TypeColors::dark_magenta,
                TypeColors::dark_olive_green,
                TypeColors::dark_orange
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::dark_violet,
                TypeColors::dark_green,
                TypeColors::dark_blue,
                TypeColors::dark_golden_rod,
                TypeColors::dark_magenta,
                TypeColors::dark_olive_green,
                TypeColors::dark_orange
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'PIE Chart'));
    }

    public function comboTestAction()
    {
        $chartData = new ChartData();
        $grafica = new ChartBuilderData();
        $grafica->setType(TypeChartjs::CHARJS_LINE);
        $grafica->setLabels(array('Gener','Febrer','Mar','Abril','Maig','Juny','Juliol'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                TypeColors::red,
            )
        );
        $grafica->setDatasetConfig('fill: false');
        $grafica->setBordercolor(
            array(
                TypeColors::red,
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');
        $grafica->setOptions("
        animation: {
              duration: 0, // general animation time
        },
        hover: {
            animationDuration: 0, // duration of animations when hovering an item
        },
        responsiveAnimationDuration: 0, // animation duration after a resize"
        );

        $grafica->setDatasetConfig('
            pointStyle: \'star\',
        ');

        $chartData->addDataset($grafica->toArray());

        $grafica->setType(TypeChartjs::CHARJS_BAR);
        $grafica->setBackgroundcolor(
            array(
                TypeColors::blue,
            )
        );
        $grafica->setBordercolor(
            array(
                TypeColors::blue,
            )
        );


        $chartData->addDataset($grafica->toArray());
        $chartData->setHeight('150px');
        $chartData->setWidth('500px');
        $chartData->setType(TypeChartjs::CHARJS_BAR);

        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$chartData,'title'=>'Combo Chart'));
    }

}