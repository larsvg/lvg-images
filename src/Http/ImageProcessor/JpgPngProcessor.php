<?php

namespace larsvg\lvgimages\Http\ImageProcessor;

use Spatie\Glide\GlideImage;

class JpgPngProcessor extends ImageProcessor
{

    protected function scaleImage()
    {
        $name = ($this->width ?? '-') . 'x' . ($this->height ?? '-') . '.' . $this->image->clientExtension();

        return GlideImage::create($this->originalImage)
            ->modify(['w' => $this->width])
            ->save($this->targetFolder . '/' . $name);
    }

}
