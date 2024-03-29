<?php

namespace Image\View\Helper;

use Cake\Filesystem\File;
use Cake\View\Helper;
use Intervention\Image\ImageManager;

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
    protected $_defaultConfig = [
        'afterFilename' => '_',
        'afterWidth' => 'x',
        'afterHeight' => '_'
    ];

    public $helpers = ['Html'];

    public function resize($url, $width = null, $height = null, $quality = 60, $optimize = true, array $options = [])
    {
        return $this->Html->Image($this->resizeUrl($url, $width, $height, $quality, $optimize), $options);
    }

    public function resizeUrl($url, $width = null, $height = null, $quality = 60, $optimize = true)
    {

        $imageFile = new File(WWW_ROOT . 'img' . DS . $url);
        if (!$imageFile->exists()) {
            return null;
        }

        $thumbFileName = $imageFile->name() . $this->getConfig('afterFilename') . $width . $this->getConfig('afterWidth') . $height . $this->getConfig('afterHeight') . $quality . '.' . strtolower($imageFile->ext());
        $newThumbFilePath = $imageFile->Folder->path . DS . $thumbFileName;

        if (!(new File($newThumbFilePath))->exists()) {

            $quality = $quality === null ? 100 : $quality;

            $manager = new ImageManager();
            $manager->make($imageFile->path)
                ->orientate()//prevent weird orientation from iphone pictures
                ->fit($width, $height)
                ->save($newThumbFilePath, $quality)
                ->destroy();

            if ($optimize === true) {
                if ($optimize) {
                    if ($imageFile->ext() == 'jpg' || $imageFile->ext() == 'jpeg' || $imageFile->ext() == 'JPG') {
                        shell_exec('jpegoptim -m90 --strip-all ' . $newThumbFilePath);
                    }

                    if ($imageFile->ext() == 'png') {
                        shell_exec('optipng -o5 -strip all ' . $newThumbFilePath);
                    }

                }
            }
        }

        return str_replace(WWW_ROOT . 'img' . DS, '', $newThumbFilePath);
    }
}
