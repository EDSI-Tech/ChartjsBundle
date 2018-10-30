<?php
/**
 * Created by PhpStorm.
 * User: Albert
 * Date: 9/8/2017
 * Time: 12:53
 */

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Utils\ChartType;

class ChartBuilder
{

    const HEIGHT = '150px';
    const WIDTH = '400px';

    const KEY_LABELS = 'labels';
    const KEY_LABEL = 'label';
    const KEY_DATA = 'data';
    const KEY_BACKGROUND_COLOR = 'backgroundColor';
    const KEY_BACKGROUND_OPACITY = 'backgroundOpacity';
    const KEY_BORDER_COLOR = 'borderColor';
    const KEY_BORDER_OPACITY = 'backgroundOpacity';
    const KEY_BORDER_WIDTH = 'borderWidth';

    /** @var string */
    protected $id;

    /** @var ChartType */
    protected $type;

    /** @var array */
    protected $data;

    /** @var array */
    protected $labels;

    /** @var array */
    protected $config;

    /** @var json */
    protected $options;

    /** @var json */
    protected $datasetConfig;

    /** @var string */
    protected $label;

    /** @var string */
    protected $title;

    /** @var array */
    protected $backgroundColor;

    /** @var int */
    protected $backgroundOpacity;  // TODO: support array

    /** @var array */
    protected $borderColor;

    /** @var array */
    protected $borderOpacity;  // TODO: support array

    /** @var int */
    protected $borderWidth;

    /** @var array */
    protected $width;

    /** @var array */
    protected $height;

    /** @var string */
    protected $color;

    /**
     * ChartBuilderData constructor.
     */
    public function __construct()
    {
        $this->id = "myChart";
        $this->height = ChartBuilder::HEIGHT;
        $this->width = ChartBuilder::WIDTH;
        $this->backgroundOpacity = 0.2;
        $this->borderOpacity = 1;
        $this->borderWidth = 1;
    }

    /**
     * @param $domId
     *
     * @return $this
     */
    public function setId($domId)
    {
        $this->id = $domId;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     *
     * @return $this
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
     *
     * @return $this
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
     *
     * @return $this
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
     *
     * @return $this
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
     *
     * @return $this
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
     *
     * @return $this
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
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return array
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param array $backgroundColor
     *
     * @return $this
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

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
     *
     * @return $this
     */
    public function setBackgroundOpacity($backgroundOpacity)
    {
        $this->backgroundOpacity = $backgroundOpacity;

        return $this;
    }

    /**
     * @return array
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * @param array $borderColor
     *
     * @return $this
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * @return int
     */
    public function getBorderWidth()
    {
        return $this->borderWidth;
    }

    /**
     * @param int $width
     *
     * @return $this
     */
    public function setBorderWidth($width)
    {
        $this->borderWidth = $width;

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
     *
     * @return $this
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
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

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
     *
     * @return $this
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
     *
     * @return $this
     */
    public function setDatasetConfig($datasetConfig)
    {
        $this->datasetConfig = $datasetConfig;

        return $this;
    }

    /**
     * Check if the general shape of this chart is intended to be circular.
     *
     * @return bool
     */
    public function isCircular()
    {
        if ($this->type == ChartType::CT_PIE || $this->type == ChartType::CT_DOUGHNUT || $this->type == ChartType::CT_POLAR_AREA) {
            return true;
        }
        return false;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            self::KEY_DATA => $this->data,
            self::KEY_LABELS => $this->labels,
            self::KEY_LABEL => $this->label,
            self::KEY_BACKGROUND_COLOR => $this->backgroundColor,
            self::KEY_BACKGROUND_OPACITY => $this->backgroundOpacity,
            self::KEY_BORDER_COLOR => $this->borderColor,
            self::KEY_BORDER_OPACITY => $this->borderOpacity,
            self::KEY_BORDER_WIDTH => $this->borderWidth,
            'options' => $this->options,
            'height' => $this->height,
            'width' => $this->width,
            'datasetConfig' => $this->datasetConfig,
        ];
    }


}