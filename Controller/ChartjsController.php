<?php

namespace fados\ChartjsBundle\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use fados\ChartjsBundle\Model\Chart;
use fados\ChartjsBundle\Model\ChartBuilder;
use fados\ChartjsBundle\Utils\ChartColor;
use fados\ChartjsBundle\Utils\ChartType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChartjsController extends Controller
{

    public function mainTestAction() {
        return $this->render('ChartjsBundle:test:mainTest.html.twig');
    }

    public function barAction()
    {

        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_BAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
          array(
              'Profit' => array(23,45,65,12,34,45,88),
              'Cost' => array(13,34,54,11,34,35,48),
          ));
          $grafica->setBackgroundcolor(
              array(
                  ChartColor::aqua,
                  ChartColor::dark_green
              )
          );
          $grafica->setBordercolor(
                array(
                    ChartColor::aqua,
                    ChartColor::dark_green

                )
          );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');
        $grafica->setTitle('Sample Charjs Bar');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>$grafica->getTitle()));
    }

    public function stackedBarAction()
    {

        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_BAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
                'Cost' => array(13,34,54,11,34,35,48),
                'Ravenue'=> array(5,7,10,12,5,1,4),

            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::aqua,
                ChartColor::dark_green,
                ChartColor::red
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::aqua,
                ChartColor::dark_green,
                ChartColor::red

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
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_BAR_HORIZONTAL);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
                'Cost' => array(13,34,54,11,34,35,48),
            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::aqua,
                ChartColor::dark_green
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::aqua,
                ChartColor::dark_green

            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'Horizontal bar Chart'));
    }

    public function pieAction()
    {
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_PIE);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::dark_violet,
                ChartColor::dark_green,
                ChartColor::dark_blue,
                ChartColor::dark_golden_rod,
                ChartColor::dark_magenta,
                ChartColor::dark_olive_green,
                ChartColor::dark_orange
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::dark_violet,
                ChartColor::dark_green,
                ChartColor::dark_blue,
                ChartColor::dark_golden_rod,
                ChartColor::dark_magenta,
                ChartColor::dark_olive_green,
                ChartColor::dark_orange
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');
        $grafica->setBackgroundOpacity(1);
        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'PIE Chart'));
    }

    public function radarAction()
    {
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_RADAR);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
                'Cost' => array(13,34,54,11,34,35,48),
            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::aqua,
                ChartColor::red
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::aqua,
                ChartColor::red

            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'Radar Chart'));
    }

    public function doughnutAction()
    {
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_DOUGHNUT);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::dark_violet,
                ChartColor::dark_green,
                ChartColor::dark_blue,
                ChartColor::dark_golden_rod,
                ChartColor::dark_magenta,
                ChartColor::dark_olive_green,
                ChartColor::dark_orange
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::dark_violet,
                ChartColor::dark_green,
                ChartColor::dark_blue,
                ChartColor::dark_golden_rod,
                ChartColor::dark_magenta,
                ChartColor::dark_olive_green,
                ChartColor::dark_orange
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');

        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'DOUGHNUT Chart'));
    }

    public function lineAction()
    {
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_LINE);
        $grafica->setLabels(array('Gener','Febrer','Mar','Abril','Maig','Juny','Juliol'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
             ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::red,
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::red,
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
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_POLAR_AREA);
        $grafica->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::dark_violet,
                ChartColor::dark_green,
                ChartColor::dark_blue,
                ChartColor::dark_golden_rod,
                ChartColor::dark_magenta,
                ChartColor::dark_olive_green,
                ChartColor::dark_orange
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::dark_violet,
                ChartColor::dark_green,
                ChartColor::dark_blue,
                ChartColor::dark_golden_rod,
                ChartColor::dark_magenta,
                ChartColor::dark_olive_green,
                ChartColor::dark_orange
            )
        );
        $grafica->setHeight('150px');
        $grafica->setWidth('500px');


        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$grafica,'title'=>'PIE Chart'));
    }

    public function comboTestAction()
    {
        $chartData = new Chart();
        $grafica = new ChartBuilder();
        $grafica->setType(ChartType::CT_LINE);
        $grafica->setLabels(array('Gener','Febrer','Mar','Abril','Maig','Juny','Juliol'));
        $grafica->setData(
            array(
                'Profit' => array(23,45,65,12,34,45,88),
            ));
        $grafica->setBackgroundcolor(
            array(
                ChartColor::red,
            )
        );
        $grafica->setDatasetConfig('fill: false');
        $grafica->setBordercolor(
            array(
                ChartColor::red,
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

        $grafica->setType(ChartType::CT_BAR);
        $grafica->setBackgroundcolor(
            array(
                ChartColor::blue,
            )
        );
        $grafica->setBordercolor(
            array(
                ChartColor::blue,
            )
        );


        $chartData->addDataset($grafica->toArray());
        $chartData->setHeight('150px');
        $chartData->setWidth('500px');
        $chartData->setType(ChartType::CT_BAR);

        return $this->render('ChartjsBundle:test:testChart.html.twig',array('grafica'=>$chartData,'title'=>'Combo Chart'));
    }

}