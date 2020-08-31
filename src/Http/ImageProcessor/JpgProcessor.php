<?php

namespace larsvg\lvgimages\Http\ImageProcessor;

use Spatie\Glide\GlideImage;

class JpgProcessor extends ImageProcessor
{

    protected function scaleImage()
    {
        dd(GlideImage::create($this->originalImage)
            ->modify(['w' => $this->width])
            ->save($this->targetFolder.'/scaled.jpg'));
    }

}
