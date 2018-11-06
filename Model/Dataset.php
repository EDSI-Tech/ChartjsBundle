<?php
/**
 * Copyright (c) 2018.  EDSI-Tech Sarl.
 * This file cannot be copied and/or distributed without express permission of EDSI-Tech Sarl and all its content
 * remains the property of EDSI-Tech Sarl.
 *
 * Created by PhpStorm.
 * User: mbourqui
 * Date: 02.11.2018
 */

namespace fados\ChartjsBundle\Model;


use fados\ChartjsBundle\Utils\ChartColor;
use fados\ChartjsBundle\Utils\ChartType;

class Dataset implements \JsonSerializable, \Countable
{

    const KEY_LABEL = 'label';
    const KEY_DATA = 'data';
    const KEY_BACKGROUND_COLOR = 'backgroundColor';
    const KEY_BACKGROUND_OPACITY = 'backgroundOpacity';
    const KEY_BORDER_COLOR = 'borderColor';
    const KEY_BORDER_OPACITY = 'backgroundOpacity';
    const KEY_BORDER_WIDTH = 'borderWidth';

    /** @var ChartType */
    protected $type;

    /** @var string */
    protected $label;

    /** @var array */
    protected $data;

    /** @var */
    protected $backgroundColor;

    /** @var */
    protected $backgroundOpacity;

    /** @var */
    protected $borderColor;

    /** @var */
    protected $borderOpacity;

    /** @var int */
    protected $borderWidth;

    /**
     * @param ChartType $type
     *
     * @return $this
     */
    public function setType(ChartType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     *
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
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param $data
     *
     * @return $this
     */
    public function pushData($data)
    {
        $this->data[] = $data;

        return $this;
    }

    /**
     * @return array|ChartColor
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param array|ChartColor $color
     *
     * @return $this
     */
    public function setBackgroundColor($color)
    {
        $this->backgroundColor = $color;

        return $this;
    }

    /**
     * @return float
     */
    public function getBackgroundOpacity()
    {
        return $this->backgroundOpacity;
    }

    /**
     * @param float $opacity
     *
     * @return $this
     */
    public function setBackgroundOpacity($opacity)
    {
        $this->backgroundOpacity = (float)$this->clip($opacity, 0, 1);

        return $this;
    }

    /**
     * @return array|ChartColor
     */
    public function gettBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * @param array|ChartColor $color
     *
     * @return $this
     */
    public function setBorderColor($color)
    {
        $this->borderColor = $color;

        return $this;
    }

    /**
     * @return float
     */
    public function getBorderOpacity()
    {
        return $this->borderOpacity;
    }

    /**
     * @param float $opacity
     *
     * @return $this
     */
    public function setBorderOpacity($opacity)
    {
        $this->borderOpacity = (float)$this->clip($opacity, 0, 1);

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
     * @param     $ratio
     * @param int $min
     * @param int $max
     *
     * @return mixed
     */
    protected function clip($ratio, $min = 0, $max = 1)
    {
        $ratio = max($min, $ratio);
        $ratio = min($ratio, $max);
        return $ratio;
    }

    public function count()
    {
        return sizeof($this->data);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $dataset = array();
        $fields = array('label', 'data', 'borderWidth');
        foreach ($fields as $field) {
            if ($this->{$field}) {
                $dataset[$field] = $this->{$field};
            }
        }
        $colorFields = array('background', 'border');
        foreach ($colorFields as $field) {
            $field .= 'Color';
            $colors = $this->{$field};
            if ($this->{$field}) {
                if (!is_array($colors)) {
                    $colors = array($colors);
                }
                foreach ($colors as $color) {
                    $dataset[$field][] = ChartColor::toColor($color);
                }
            }
        }
        return $dataset;
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->jsonSerialize());
    }

}
