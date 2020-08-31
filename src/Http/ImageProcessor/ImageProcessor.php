<?php

namespace larsvg\lvgimages\Http\ImageProcessor;


use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Void_;
use Spatie\Glide\GlideImage;

abstract class ImageProcessor
{

    protected UploadedFile $image;
    protected ?int         $width;
    protected ?int         $height;
    protected string       $targetFolder;
    protected string       $originalImage;

    /**
     * ImageProcessor constructor.
     *
     * @param UploadedFile $image
     * @param int|null     $width
     * @param int|null     $height
     * @param string       $targetFolder
     */
    public function __construct(UploadedFile $image, int $width = null, int $height = null, string $targetFolder = '')
    {
        $this->height       = $height;
        $this->width        = $width;
        $this->image        = $image;
        $this->targetFolder = public_path('images') . $targetFolder;

        $this->saveOriginalImage();

        $this->scaleImage();
    }

    /**
     * @return string
     */
    private function saveOriginalImage(): string
    {
        $name = 'original.' . $this->image->clientExtension();
        $this->image->move($this->targetFolder, $name);
        $this->originalImage = $this->targetFolder . '/' . $name;

        return $this->originalImage;
    }

    abstract protected function scaleImage();

}
