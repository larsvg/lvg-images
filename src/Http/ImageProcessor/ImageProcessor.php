<?php

namespace larsvg\lvgimages\Http\ImageProcessor;

use Illuminate\Http\UploadedFile;
use Spatie\Glide\GlideImage;

abstract class ImageProcessor
{

    protected UploadedFile $image;
    public ?int            $width;
    public ?int            $height;
    protected string       $fileName;
    protected string       $saveToFolder;
    protected string       $rootPath;
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
        $this->saveToFolder = $saveToFolder;
        $this->rootPath     = public_path('images') . rtrim($this->saveToFolder, '/') . '/';

        $this->saveOriginalImage();
        $this->scaleImage();
    }

    /**
     * @return string
     */
    private function saveOriginalImage(): string
    {
        $name = 'original.' . $this->image->clientExtension();
        if (!file_exists($this->rootPath . $name)) {
            $this->image->move($this->rootPath, $name);
        }
        $this->originalImage = $this->rootPath . $name;

        return $this->originalImage;
    }

    /**
     * @return string
     */
    protected function scaleOriginal(): string
    {
        $this->fileName = ($this->width ?? '-') . 'x' . ($this->height ?? '-') . '.' . $this->image->clientExtension();

        return GlideImage::create($this->originalImage)
            ->modify(['w' => $this->width])
            ->save($this->rootPath . $this->fileName);
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return url($this->saveToFolder . $this->fileName);
    }

    /**
     * @return string
     */
    abstract protected function scaleImage(): string;

}
