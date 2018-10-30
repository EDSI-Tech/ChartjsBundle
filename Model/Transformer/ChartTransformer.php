<?php

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Model\Transformer\TransformerInterface;
use fados\ChartjsBundle\Utils\ChartColor;
use fados\ChartjsBundle\Utils\ChartType;


/**
 * Created by PhpStorm.
 * User: Albert
 * Date: 9/8/2017
 * Time: 10:41
 */
class ChartTransformer implements TransformerInterface
{

    private $data;
    private $options;
    private $labels;
    private $kpi;
    private $fieldData;
    private $result = array();
    private $type;
    private $chartBuilder;

    public function __construct()
    {
        $this->result = array();
        $this->chartBuilder = new ChartBuilder();
    }

    public function transform($type, $data, $fieldLabels, $fieldKpi, $options, $fieldData)
    {
        $this->labels = $fieldLabels;
        $this->kpi = $fieldKpi;
        $this->data = $data;
        $this->fieldData = $fieldData;
        $this->options = $options;
        $this->type = $type;


        if ($this->type == ChartType::CT_BAR ||
            $this->type == ChartType::CT_LINE ||
            $this->type == ChartType::CT_BAR_HORIZONTAL ||
            $this->type == ChartType::CT_PIE ||
            $this->type == ChartType::CT_DOUGHNUT) {
            $this->toArray();
        };

        $this->setBackgroundColors();

        $this->chartBuilder->setType($this->type);
        $this->chartBuilder->setData($this->result[ChartBuilder::KEY_DATA]);
        $this->chartBuilder->setLabels($this->result[ChartBuilder::KEY_LABELS]);
        //$this->chartBuilderData->setConfig($this->config);
        // $this->chartBuilderData->setLabel($this->label);
        $this->chartBuilder->setBorderColor($this->result[ChartBuilder::KEY_BORDER_COLOR]);
        $this->chartBuilder->setBackgroundColor($this->result[ChartBuilder::KEY_BACKGROUND_COLOR]);

        return $this->chartBuilder;

    }

    public function toArray()
    {
        $this->result = array();
        $this->result[ChartBuilder::KEY_LABELS] = array();
        $this->result[ChartBuilder::KEY_DATA] = array(); //Son 3 dades

        foreach ($this->data as $d) {
            $v = strval($d[$this->kpi]);
            if (!in_array($v, $this->result[ChartBuilder::KEY_LABELS])) {
                $this->result[ChartBuilder::KEY_LABELS][] = $v;
            };
            $this->result[ChartBuilder::KEY_DATA][$d[$this->labels]][] = $d[$this->fieldData];
        }

    }

    /*
    * One color for each label
    */
    public function setBackgroundColors()
    {
        $index = 0;
        $colors = new ChartColor();
        $dataFieldColor = ChartBuilder::KEY_DATA;

        if ($this->type == ChartType::CT_PIE ||
            $this->type == ChartType::CT_DOUGHNUT) {
            $dataFieldColor = ChartBuilder::KEY_LABELS;
        };
        $this->result[ChartBuilder::KEY_BACKGROUND_COLOR] = array();

        $totalColors = $colors->count();
        $leapNumber = floor($totalColors / sizeof($this->result[$dataFieldColor]));


        foreach ($this->result[$dataFieldColor] as $d) {
            $this->result[ChartBuilder::KEY_BACKGROUND_COLOR][] = $colors->getColor($index % $totalColors);
            $this->result[ChartBuilder::KEY_BORDER_COLOR][] = $colors->getColor($index % $totalColors);
            $index += $leapNumber;
        }
    }
}