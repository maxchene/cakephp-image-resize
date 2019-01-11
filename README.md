# Image resizer plugin for CakePHP

This branch is designed to be used with **CakePHP 3.7+**

## What it does

This is a lightweight, simple plugin that provides a Helper that resize your pictures on the fly using intervention/image.

## Installation

```
composer require kaliel/cakephp-image
```

Add the plugin in the **bootstrap** function of your **Application.php**:
```
$this->addPlugin('Image');
```

## Configuration


## Usage

In your template files (*.ctp), you can either print an html image tag of your thumbnail, or get a thumbnail url, from original large picture.

Exemple of Html image tag of thumbnail from original image :
```
$this->Image->resize('original_large.jpg', 80, 80, 60, true, ['alt' => 'image alternative text']);
```

The `resize()` function takes 6 arguments.
* $url : file path relatrive to img folder
* $width : width of the thumbnail
* $height: height of the thumbnail
* $quality : quality of the generated thumbnail, from 0 to 100
* $optimize : boolean, whether or not the image needs to be optimized using jpegoptim/optipng
* $options : array of options for the html image tag, [more infos here](https://book.cakephp.org/3.0/en/views/helpers/html.html#linking-to-images)
