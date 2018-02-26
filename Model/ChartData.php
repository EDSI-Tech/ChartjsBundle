<?php

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Utils\TypeChartjs;

class ChartData
{

    const HEIGHT = '150px';
    const WIDTH  = '400px';

    /**
     * @var TypeChartjs
     */
    protected $type;

    /**
     * @var array
     */
    protected $datasets;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var json
     */
    protected $options;

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return json
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param json $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }


    /**
     * ChartBuilderData constructor.
     * @param array $datasets
     */
    public function __construct()
    {
        $this->datasets = array();
        $this->height = ChartBuilderData::HEIGHT;
        $this->width= ChartBuilderData::WIDTH;
    }

    /**
     * ChartBuilderData constructor.
     * @param array $datasets
     */
    public function addDataset($dataset) {
        $this->datasets[] = $dataset;
    }

    /**
     * @return ChartBuilderData
     */
    public function getDatasets()
    {
        return $this->datasets;
    }

    /**
     * @return TypeChartjs
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param TypeChartjs $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getData() {
        return $this->datasets;
    }

    public function toArray() {
        return array(
            'type'              =>$this->type,
            'title'            => $this->title,
            'height'           => $this->height,
            'width'            => $this->width,
            'datasets'         => $this->datasets,
        );
    }


}