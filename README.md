# ChartjsBundle
Adding charts to Symfony using Chart.js

Symfony Bundle that simplifies the usage of [Chart.js 2.7.3](http://www.chartjs.org/) library.

## How to use it

Requirements
------------

* [Chart.js](http://www.chartjs.org/)

Install
-------
```
composer require fados/chartjs-bundle dev-master
```
This command requires you to have Composer installed globally, as explained in the installation chapter of the Composer documentation.

Then, enable the bundle by adding the following line in the app/AppKernel.php file of your project

```php
   new fados\ChartjsBundle\ChartjsBundle(),
```

Usage
-----

Configure you config.yml with:

```
chartjs:
    animation:
        duration: 1000
        easing: easeOutQuart
    layout:
        padding: 0
    legend:
        display: true
        position: 'top'
        fullWidth: true
        reverse: false
        labels:
            boxWidth:	40
            fontSize:	12
            fontStyle:	'normal'
            fontColor:	'#666'
            fontFamily:	"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"
            padding:	10
            usePointStyle:	false
    title:
        display: false
        position: 'top'
        fontSize: 12
        fontFamily:	"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"
        fontColor: '#666'
        fontStyle: 'bold'
        padding: 10
        text:	''
```
This configuration is for the global [configuration of Chartjs](http://www.chartjs.org/docs/latest/configuration/).

To view the test/demo charts, register the routing in `app/config/routing.yml`:

``` yml
# app/config/routing.yml

chartjs_samples:
    resource: "@ChartjsBundle/Resources/Config/routing.xml"
```
The routing file only have Charts samples

http://localhost/xxx/web/app_dev.php/testchart/mainTest

Publish the assets, for example:

    $ php app/console assets:install web

Add the required stylesheet and javascripts to your layout:

jquery on top (jquery library isn't in the assets, you have to add downloading from http://jquery.com/):    
```
    <script src="{{ asset('js/jquery.min.js') }}"></script>
```    
Chart.js Javascript:
```
    <script src="{{ asset('bundles/charjsbundle/js/Chart.min.js') }}"></script>
```    
You could only add the javascript or use an extension twig, in the template where you wish to display the Chart, add the following twig:

```
{{ chartjs_canvas('myPieChart',graphica.width,graphica.height,graphica) }}
```

The first parameter is the Canvas id, its mandatory and must be unique, canvas Width, anvas Height and an array, graphicChart, with an special structure.

Array structure for building charts (fados\ChartjsBundle\Model\ChartBuilderData).
Sample:
```
        $graphicChart = new ChartBuilderData();
        $graphicChart->setType(TypeCharjs::CHARJS_BAR);
        $graphicChart->setLabels(array('Barcelona','New York','Londres','Paris','Berlin','Tokio','El Cairo'));
        $graphicChart->setData(
          array(
              'Profit' => array(23,45,65,12,34,45,88),
              'Cost' => array(13,34,54,11,34,35,48),
          )
        );
        $graphicChart->setBackgroundcolor(
              array(
                  TypeColors::aqua,
                  TypeColors::dark_green
              )
        );
        $graphicChart->setBordercolor(
                array(
                    TypeColors::aqua,
                    TypeColors::dark_green

                )
        );
        $graphicChart->getHeight('150px');
        $graphicChart->getWidth('500px');
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
```

Controller will be:

```
use fados\ChartjsBundle\Model\Chart;
use fados\ChartjsBundle\Utils\ChartType;

 public function barAction()   {
        $grafica = new Chart();
        $grafica->setType(ChartType::CT_BAR);
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

```

There are a couple of help classes related to colors and Charts type:

* ChartType: Define the Charts that you can render:
* ChartColor: Define colors, over 250

## Twig sample
```
{% extends 'AppBundle:Default:index.html.twig' %}

{% block title %}Sample Chart{% endblock %}

{% block javascript-head %}
    {{ parent() }}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
{% endblock %}

{% block contingut %}
    <div class="container">
        <div class="Absolute-Center centrar">
            <div class="container">
                <h2 style="margin-bottom:20px">Chart</h2>
                <div class="chart">
                <h3>{{ title }}</h3>
                {{ chartjs_canvas('mychar1',grafica.width,grafica.height,grafica) }}
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javascript %}
    {{ parent() }}
    <script src="{{ asset('bundles/charjts/js/Chart.min.js') }}"></script>
{% endblock %}
```
