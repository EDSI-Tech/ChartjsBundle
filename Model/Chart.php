<?php

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Utils\ChartType;

class Chart implements \JsonSerializable
{

    const KEY_LABELS = 'labels';

    /** @var array */
    protected $canvasAttributes;

    /** @var array */
    protected $canvasDataAttributes;

    /** @var string */
    protected $type;

    /** @var array */
    protected $datasets;

    /** @var array */
    protected $labels;

    /** @var string */
    protected $title;

    /** @var array */
    protected $options;

    /**
     * Chart constructor.
     *
     */
    public function __construct($domId = "my-chart")
    {
        $this->canvasAttributes = array('id' => htmlspecialchars(trim($domId)));
        $this->canvasDataAttributes = array();
        $this->datasets = array();
        $this->options = array();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->canvasAttributes['id'];
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->canvasAttributes['id'] = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        if (array_key_exists('width', $this->canvasAttributes)) {
            return $this->canvasAttributes['width'];
        }
        return null;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->canvasAttributes['width'] = htmlspecialchars(trim($width));
    }

    /**
     * @return string|null
     */
    public function getHeight()
    {
        if (array_key_exists('height', $this->canvasAttributes)) {
            return $this->canvasAttributes['height'];
        }
        return null;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->canvasAttributes['height'] = htmlspecialchars(trim($height));
    }

    /**
     * @return array
     */
    public function getCanvasDataAttributes()
    {
        return $this->canvasDataAttributes;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return Chart
     */
    public function setCanvasDataAttribute($key, $value)
    {
        $this->canvasDataAttributes[$key] = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

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
    public function getDatasets()
    {
        return $this->datasets;
    }

    /**
     * @param Dataset $dataset
     *
     * @return $this
     */
    public function addDataset($dataset)
    {
        $this->datasets[] = $dataset;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $chartOptions = array();
        if (!empty($this->title) || !empty($this->options)) {
            if ($this->title) {
                $chartOptions['title'] = array(
                    'display' => true,
                    'text' => $this->title);
            }
            $chartOptions = array_merge($chartOptions, $this->options);
        }
        return $chartOptions;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param $option
     *
     * @param $value
     *
     * @return $this
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $chartData = array();
        $dataFields = array('labels');
        foreach ($dataFields as $field) {
            if ($this->{$field}) {
                $chartData[$field] = $this->{$field};
            }
        }
        $chartData['datasets'] = $this->datasets;
        return $chartData;
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

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $chart = array();
        $fields = array('type');
        foreach ($fields as $field) {
            if ($this->{$field}) {
                $chart[$field] = $this->{$field};
            }
        }

        // Data
        $chart['data'] = $this->getData();

        // Options
        $chart['options'] = $this->getOptions();
        return $chart;
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->jsonSerialize());
    }

}
