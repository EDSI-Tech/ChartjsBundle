<?php
/**
 * Created by PhpStorm.
 * User: Albert
 * Date: 9/8/2017
 * Time: 12:53
 */

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Utils\TypeChartjs;

class ChartBuilderData
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
    protected $data;

    /**
     * @var array
     */
    protected $labels;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var json
     */
    protected $options;

    /**
     * @var json
     */
    protected $datasetConfig;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $backgroundOpacity;

    /**
     * @var array
     */
    protected $bordercolor;

    /**
     * @var array
     */
    protected $backgroundcolor;

    /**
     * @var array
     */
    protected $width;

    /**
     * @var array
     */
    protected $height;

    /** @var string */
    protected $color;

    /**
     * ChartBuilderData constructor.
     */
    public function __construct()
    {
        $this->height            = ChartBuilderData::HEIGHT;
        $this->width             = ChartBuilderData::WIDTH;
        $this->backgroundOpacity = 0.2;
    }


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ChartBuilderData
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return ChartBuilderData
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return ChartBuilderData
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param string $config
     * @return ChartBuilderData
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param string $options
     * @return ChartBuilderData
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return ChartBuilderData
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return ChartBuilderData
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return array
     */
    public function getBordercolor()
    {
        return $this->bordercolor;
    }

    /**
     * @param array $bordercolor
     * @return ChartBuilderData
     */
    public function setBordercolor($bordercolor)
    {
        $this->bordercolor = $bordercolor;

        return $this;
    }

    /**
     * @return array
     */
    public function getBackgroundcolor()
    {
        return $this->backgroundcolor;
    }

    /**
     * @param array $backgroundcolor
     * @return ChartBuilderData
     */
    public function setBackgroundcolor($backgroundcolor)
    {
        $this->backgroundcolor = $backgroundcolor;

        return $this;
    }

    /**
     * @return array
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     * @return ChartBuilderData
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getBackgroundOpacity()
    {
        return $this->backgroundOpacity;
    }

    /**
     * @param int $backgroundOpacity
     * @return ChartBuilderData
     */
    public function setBackgroundOpacity($backgroundOpacity)
    {
        $this->backgroundOpacity = $backgroundOpacity;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ChartBuilderData
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDatasetConfig()
    {
        return $this->datasetConfig;
    }

    /**
     * @param string $datasetConfig
     * @return ChartBuilderData
     */
    public function setDatasetConfig($datasetConfig)
    {
        $this->datasetConfig = $datasetConfig;

        return $this;
    }

    public function toArray()
    {
        return [
            'type'              => $this->type,
            'title'             => $this->title,
            'data'              => $this->data,
            'labels'            => $this->labels,
            'label'             => $this->label,
            'bordercolor'       => $this->bordercolor,
            'backgroundcolor'   => $this->backgroundcolor,
            'options'           => $this->options,
            'height'            => $this->height,
            'width'             => $this->width,
            'backgroundOpacity' => $this->backgroundOpacity,
            'datasetConfig'     => $this->datasetConfig,
        ];
    }


}