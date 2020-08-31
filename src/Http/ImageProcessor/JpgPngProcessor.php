<?php

namespace larsvg\lvgimages\Http\ImageProcessor;

use Spatie\Glide\GlideImage;

class JpgPngProcessor extends ImageProcessor
{

    /**
     * @return string
     */
    protected function scaleImage(): string
    {
        return $this->scaleOriginal();
    }

}
