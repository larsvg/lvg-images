<?php

namespace larsvg\lvgimages\Http\ImageProcessor;

use WebPConvert\Convert\Exceptions\ConversionFailedException;
use WebPConvert\WebPConvert;

class WebPProcessor extends ImageProcessor
{

    /**
     * @return string
     * @throws ConversionFailedException
     */
    protected function scaleImage(): string
    {
        $scaledImage = $this->scaleOriginal();
        $name        = ($this->width ?? '-') . 'x' . ($this->height ?? '-') . '.' . 'webp';
        $destination = $this->rootPath . $name;
        WebPConvert::convert($scaledImage, $destination, []);
        return $destination;
    }
}
