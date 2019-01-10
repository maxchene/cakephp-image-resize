<?php

namespace Image\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Image helper
 */
class ImageHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html'];

    public function resize($url)
    {
        return $this->Html->Image($url);
    }
}
