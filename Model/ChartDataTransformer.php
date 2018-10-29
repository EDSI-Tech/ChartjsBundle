<?php

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Utils\ChartType;
use fados\ChartjsBundle\Utils\ChartColor;
use fados\ChartjsBundle\Model\Transformer\TransformerInterface;
use fados\ChartjsBundle\Model\ChartBuilderData;


/**
 * Created by PhpStorm.
 * User: Albert
 * Date: 9/8/2017
 * Time: 10:41
 */
class ChartDataTransformer  implements TransformerInterface
{

    const backgroundColor = 'backgroundcolor';
    const bordercolor = 'bordercolor';
    const total = 'total';
    const labels = 'labels';
    const data = 'data';

    private $data;
    private $options;
    private $labels;
    private $kpi;
    private $fieldData;
    private $result = array();
    private $type;
    private $chartBuilderData;

    public function __construct()
    {
        $this->result = array();
        $this->chartBuilderData = new ChartBuilderData();
    }

    public function transform($type,$data,$fieldLabels,$fieldKpi,$options,$fieldData) {
        $this->labels = $fieldLabels;
        $this->kpi = $fieldKpi;
        $this->data = $data;
        $this->fieldData = $fieldData;
        $this->options = $options;
        $this->type = $type;


        if ($this->type==ChartType::CT_BAR ||
            $this->type==ChartType::CT_LINE ||
            $this->type==ChartType::CT_BAR_HORIZONTAL ||
            $this->type==ChartType::CT_PIE ||
            $this->type==ChartType::CT_DOUGHNUT ) {
            $this->toArray();
        };

        $this->setBackgroundColors();

        $this->chartBuilderData->setType($this->type);
        $this->chartBuilderData->setData($this->result[ChartDataTransformer::data]);
        $this->chartBuilderData->setLabels($this->result[ChartDataTransformer::labels]);
        //$this->chartBuilderData->setConfig($this->config);
       // $this->chartBuilderData->setLabel($this->label);
        $this->chartBuilderData->setBordercolor($this->result[ChartDataTransformer::bordercolor]);
        $this->chartBuilderData->setBackgroundcolor($this->result[ChartDataTransformer::backgroundColor]);

        return $this->chartBuilderData;

    }

    public function toArray() {
        $this->result = array();
        $this->result[ChartDataTransformer::labels] =array();
        $this->result[ChartDataTransformer::data] =array(); //Son 3 dades

        foreach ($this->data as $d) {
            $v = strval($d[$this->kpi]);
            if (!in_array($v,$this->result[ChartDataTransformer::labels])){
                $this->result[ChartDataTransformer::labels][]=$v;
            };
            $this->result[ChartDataTransformer::data][$d[$this->labels]][]=$d[$this->fieldData];
        }

    }

    /*
    * One color for each label
    */
    public function setBackgroundColors() {
        $index = 0;
        $colors = new ChartColor();
        $dataFieldColor = ChartDataTransformer::data;

        if ($this->type==ChartType::CT_PIE ||
            $this->type==ChartType::CT_DOUGHNUT) {
            $dataFieldColor = ChartDataTransformer::labels;
        };
        $this->result[ChartDataTransformer::backgroundColor] = array();

        $totalColors = $colors->count();
        $leapNumber = floor($totalColors/ sizeof($this->result[$dataFieldColor]));


        foreach ($this->result[$dataFieldColor] as $d) {
            $this->result[ChartDataTransformer::backgroundColor][] =  $colors->getColor($index % $totalColors);
            $this->result[ChartDataTransformer::bordercolor][] =  $colors->getColor($index % $totalColors);
            $index+= $leapNumber;
        }
    }
}