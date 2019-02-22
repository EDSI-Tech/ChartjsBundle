<?php

namespace fados\ChartjsBundle\Model;

use fados\ChartjsBundle\Utils\ChartType;

class Chart implements \JsonSerializable
{

    const KEY_ID = 'id';
    const KEY_TITLE = 'title';
    const KEY_TYPE = 'type';
    const KEY_LABELS = 'labels';
    const KEY_DATA = 'data';
    const KEY_DATASETS = 'datasets';
    const KEY_WIDTH = 'width';
    const KEY_HEIGHT = 'height';
    const KEY_OPTIONS = 'options';

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

    /** @var array */
    private $rawOptions;

    /**
     * Chart constructor.
     *
     * @param string $domId
     */
    public function __construct($domId = "chart")
    {
        $this->canvasAttributes = array(self::KEY_ID => htmlspecialchars(trim($domId)));
        $this->canvasDataAttributes = array();
        $this->datasets = array();
        $this->options = array();
        $this->rawOptions = array();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->canvasAttributes[self::KEY_ID];
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->canvasAttributes[self::KEY_ID] = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        if (array_key_exists(self::KEY_WIDTH, $this->canvasAttributes)) {
            return $this->canvasAttributes[self::KEY_WIDTH];
        }
        return null;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->canvasAttributes[self::KEY_WIDTH] = htmlspecialchars(trim($width));
    }

    /**
     * @return string|null
     */
    public function getHeight()
    {
        if (array_key_exists(self::KEY_HEIGHT, $this->canvasAttributes)) {
            return $this->canvasAttributes[self::KEY_HEIGHT];
        }
        return null;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->canvasAttributes[self::KEY_HEIGHT] = htmlspecialchars(trim($height));
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
                $chartOptions[self::KEY_TITLE] = array(
                    'display' => true,
                    'text' => $this->title);
            }
            $chartOptions = array_merge($chartOptions, $this->options);
        }
        return $chartOptions;
    }

    /**
     * @param array|string $options
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
     * @return mixed
     */
    public function getOption($option)
    {
        return $this->options[$option];
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
     * @return string
     */
    public function getRawOptions()
    {
        $chartOptions = "";
        if ($rawOptions = $this->rawOptions) {
            foreach ($rawOptions as $rawOption) {
                $chartOptions .= $rawOption . ', ';
            }
            $chartOptions = substr($chartOptions, 0, -2);  // remove last ', '
        }
        return "{" . $chartOptions . "}";
    }

    /**
     * @param string $rawOption
     *
     * @return $this
     */
    public function addRawOption($rawOption)
    {
        $this->rawOptions[] = $rawOption;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $chartData = array();
        $dataFields = array(self::KEY_LABELS);
        foreach ($dataFields as $field) {
            if ($this->{$field}) {
                $chartData[$field] = $this->{$field};
            }
        }
        $chartData[self::KEY_DATASETS] = $this->datasets;
        return $chartData;
    }

    /**
     * @return string
     */
    public function getJsonOptions()
    {
        $chartOptions = "";
        if ($options = $this->getOptions()) {
            $chartOptions = json_encode($options);
            if ($rawOptions = $this->rawOptions) {
                $chartOptions = substr($chartOptions, 1);  // remove opening '}'
                $chartOptions = substr($chartOptions, 0, -1);  // remove closing '}'
                $chartOptions .= ', ';
            } else {
                return $chartOptions;
            }
        }
        if ($rawOptions = $this->rawOptions) {
            foreach ($rawOptions as $rawOption) {
                $chartOptions .= $rawOption . ', ';
            }
            $chartOptions = substr($chartOptions, 0, -2);  // remove last ', '
            return "{" . $chartOptions . "}";
        }
        return "{}";
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
        $fields = array(self::KEY_TYPE);
        foreach ($fields as $field) {
            if ($this->{$field}) {
                $chart[$field] = $this->{$field};
            }
        }

        // Data
        $chart[self::KEY_DATA] = $this->getData();

        // Options
        if ($options = $this->getOptions()) {
            $chart[self::KEY_OPTIONS] = $options;
        } elseif ($rawOptions = $this->getRawOptions()) {
            $chart[self::KEY_OPTIONS] = $rawOptions;
        } else {
            $chart[self::KEY_OPTIONS] = array();
        }
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
