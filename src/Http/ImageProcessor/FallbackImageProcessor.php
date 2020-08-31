<?php

namespace larsvg\lvgimages\Http\ImageProcessor;

class FallbackImageProcessor extends ImageProcessor
{

    /**
     * @return string
     */
    protected function scaleImage(): string
    {
        return $this->scaleOriginal();
    }

}
