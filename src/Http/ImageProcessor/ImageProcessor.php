<?php

namespace larsvg\lvgimages\Http\ImageProcessor;


use Illuminate\Http\UploadedFile;

abstract class ImageProcessor
{

    public function __construct(UploadedFile $image, int $width, int $height)
    {

    }

}
