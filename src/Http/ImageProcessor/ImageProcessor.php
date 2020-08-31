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
    protected string       $saveToFolder;
    protected string       $originalImage;

    /**
     * ImageProcessor constructor.
     *
     * @param UploadedFile $image
     * @param int|null     $width
     * @param int|null     $height
     * @param string       $saveToFolder
     */
    public function __construct(UploadedFile $image, int $width = null, int $height = null, string $saveToFolder = '')
    {
        $this->height       = $height;
        $this->width        = $width;
        $this->image        = $image;
        $this->saveToFolder = public_path('images') . rtrim($saveToFolder, '/') . '/';

        $this->saveOriginalImage();
        $this->scaleImage();
    }

    /**
     * @return string
     */
    private function saveOriginalImage(): string
    {
        $name = 'original.' . $this->image->clientExtension();
        if (!file_exists($this->saveToFolder . $name)) {
            $this->image->move($this->saveToFolder, $name);
        }
        $this->originalImage = $this->saveToFolder . $name;

        return $this->originalImage;
    }

    /**
     * @return string
     */
    protected function scaleOriginal(): string
    {
        $name = ($this->width ?? '-') . 'x' . ($this->height ?? '-') . '.' . $this->image->clientExtension();

        return GlideImage::create($this->originalImage)
            ->modify(['w' => $this->width])
            ->save($this->saveToFolder . $name);
    }

    /**
     * @return string
     */
    abstract protected function scaleImage(): string;

}
