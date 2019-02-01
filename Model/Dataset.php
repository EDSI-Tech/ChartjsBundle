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
    protected $data = array();

    /** @var mixed */
    protected $fill;

    /** @var */
    protected $backgroundColor = array();

    /** @var */
    protected $backgroundOpacity = array();

    /** @var */
    protected $borderColor = array();

    /** @var */
    protected $borderOpacity = array();

    /** @var int */
    protected $borderWidth;

    /**
     * Dataset constructor.
     *
     * @param null $label
     * @param null $type
     */
    public function __construct($label = null, $type = null)
    {
        $this->label = $label;
        $this->type = $type;
    }

    /**
     * @return ChartType
     */
    public function getType()
    {
        return $this->type;
    }

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

    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
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
     * @return mixed
     */
    public function getFill()
    {
        return $this->fill;
    }

    /**
     * @param $fill
     *
     * @return $this
     */
    public function setFill($fill)
    {
        $this->fill = $fill;
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
     * @param ChartColor $color
     *
     * @return $this
     */
    public function addBackgroundColor($color)
    {
        $this->addTo($this->backgroundColor, $color);
        return $this;
    }

    /**
     * @return array|float
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
        $this->setOpacity($this->backgroundOpacity, $opacity);

        return $this;
    }

    /**
     * @param float $opacity
     *
     * @return $this
     */
    public function addBackgroundOpacity($opacity)
    {
        $this->addTo($this->backgroundOpacity, (float)$this->clip($opacity, 0, 1));
        return $this;
    }

    /**
     * @return array
     */
    public function getBackgroundColorOpacity()
    {
        return $this->getColorOpacity($this->getBackgroundColor(), $this->getBackgroundOpacity());
    }


    /**
     * Helper to set both at the same time
     *
     * @param       $color
     * @param float $opacity
     *
     * @return $this
     */
    public function addBackgroundColorOpacity($color, $opacity)
    {
        assert(count($this->getBackgroundColor()) == count($this->getBackgroundOpacity()));
        $this->addBackgroundColor($color);
        $this->addBackgroundOpacity($opacity);
        return $this;
    }

    /**
     * @return array|ChartColor
     */
    public function getBorderColor()
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
     * @param ChartColor $color
     *
     * @return $this
     */
    public function addBorderColor($color)
    {
        $this->addTo($this->borderColor, $color);
        return $this;
    }

    /**
     * @return array|float
     */
    public function getBorderOpacity()
    {
        return $this->borderOpacity;
    }

    /**
     * @param array|float $opacity
     *
     * @return $this
     */
    public function setBorderOpacity($opacity)
    {
        $this->setOpacity($this->borderOpacity, $opacity);

        return $this;
    }

    /**
     * @param $opacity
     *
     * @return $this
     */
    public function addBorderOpacity($opacity)
    {
        $this->addTo($this->borderOpacity, (float)$this->clip($opacity, 0, 1));
        return $this;
    }

    /**
     * @return array
     */
    public function getBorderColorOpacity()
    {
        return $this->getColorOpacity($this->getBorderColor(), $this->getBorderOpacity());
    }

    /**
     * Helper to set both at the same time
     *
     * @param       $color
     * @param float $opacity
     *
     * @return Dataset
     */
    public function addBorderColorOpacity($color, $opacity)
    {
        assert(count($this->getBorderColor()) == count($this->getBorderOpacity()));
        $this->addBorderColor($color);
        $this->addBorderOpacity($opacity);
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

        $fields = array('type', 'label', 'borderWidth', 'data');
        foreach ($fields as $field) {
            if ($this->{$field}) {
                $dataset[$field] = $this->{$field};
            }
        }

        // Special case for 'fill', as `false` is a valid value
        if (!is_null($this->fill)) {
            $dataset['fill'] = $this->fill;
        }

        $colorFields = array('background', 'border');
        foreach ($colorFields as $field) {
            $fieldColor = $field . 'Color';
            $fieldOpacity = $field . 'Opacity';
            if ($colors = $this->{$fieldColor}) {
                $colorsOpacities = $this->getColorOpacity($colors, $this->{$fieldOpacity});
                $renderedColors = array();
                foreach ($colorsOpacities as $colorsOpacity) {
                    $renderedColors[] = ChartColor::toColor($colorsOpacity[0], $colorsOpacity[1]);
                }
                if (count($renderedColors) == 1 ){
                    // Normalize to single value instead of array
                    $renderedColors = $renderedColors[0];
                }
                $dataset[$fieldColor] = $renderedColors;
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

    /**
     * If the field is not yet an array, it will be converted.
     *
     * @param       $field
     * @param mixed $value
     */
    protected function addTo(&$field, $value)
    {
        $field = (array)$field;
        $field[] = $value;
    }

    /**
     * @param       $field
     * @param float $opacity
     */
    protected function setOpacity(&$field, $opacity)
    {
        $opacities = (array)$opacity;
        $clipped = array();
        foreach ($opacities as $opacity) {
            $clipped[] = (float)$this->clip($opacity, 0, 1);
        }
        $field = $clipped;
    }

    /**
     * @param array|ChartColor $colors
     * @param array|float      $opacities
     *
     * @param float            $defaultOpacity
     *
     * @return array
     */
    protected function getColorOpacity($colors, $opacities, $defaultOpacity = 1.0)
    {
        $colors = (array)$colors;
        $opacities = (array)$opacities;
        if (count($opacities) > 1) {
            assert(count($colors) == count($opacities));
        } else {
            $opacity = reset($opacities) ?: $defaultOpacity;
            $opacities = array_fill(0, count($colors), $opacity);
        }
        $combined = array();
        foreach ($colors as $index => $color) {
            $combined[] = array($color, $opacities[$index]);
        }
        return $combined;
    }

}
