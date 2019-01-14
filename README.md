# Image resizer plugin for CakePHP
[![Latest Stable Version](https://poser.pugx.org/kaliel/cakephp-image/v/stable)](https://packagist.org/packages/kaliel/cakephp-image)
[![License](https://poser.pugx.org/kaliel/cakephp-image/license)](https://packagist.org/packages/kaliel/cakephp-image)
[![Total Downloads](https://poser.pugx.org/kaliel/cakephp-image/downloads)](https://packagist.org/packages/kaliel/cakephp-image)

This branch is designed to be used with **CakePHP 3.7+**

## What it does

Simple, lightweight plugin, that provides a Helper to resize your pictures on the fly using intervention/image.

## Installation

```
composer require kaliel/cakephp-image
```

Add the plugin in the **bootstrap** function of your **Application.php**:
```
$this->addPlugin('Image');
```

## Configuration

By default, generated thumbnail will be renamed like this :

```Filename_WidthxHeight_Quality.Extension```

So requesting a thubmnail of 640x480 with a 60 quality from the original file kitty.jpg will generate, in the same directory, the file :
```kitty_640x480_60.jpg```


## Usage

In your template files (*.ctp), you can either print an html image tag of your thumbnail, or get a thumbnail url, from original large picture.

#### Html image tag of thumbnail from original image
```
$this->Image->resize('original_large.jpg', 80, 80, 60, true, ['alt' => 'image alternative text']);
```

The `resize()` function takes 6 arguments.
* $url : file path relatrive to img folder
* $width : width of the thumbnail
* $height: height of the thumbnail
* $quality : quality of the generated thumbnail, from 0 to 100
* $optimize : boolean, whether or not the image needs to be optimized using [jpegoptim](http://freshmeat.sourceforge.net/projects/jpegoptim)/[optipng](http://optipng.sourceforge.net/)
* $options : array of options for the html image tag, [more infos here](https://book.cakephp.org/3.0/en/views/helpers/html.html#linking-to-images)

#### Get a thumbnail url from original file

```
$this->Image->resizeUrl('original_large.jpg', 80, 80, 60, true);
```
The `resizeUrl()` function takes 5 arguments which are described above from resize function except the $options array.
