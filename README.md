# lvgimages
Easily convert images to specific formats and sizes in your Laravel application.

This package uploads an image based on a `Illuminate\Http\UploadedFile` instance to your public folder.
The images can be scaled and converted to WebP.

Here's an example of how the package can be used:

```php
foreach ($images as $image) {
    new WebPProcessor($image, 512, 256);
    new WebPProcessor($image, 768, 384);
    new WebPProcessor($image, 1024, 512);
    new JpgPngProcessor($image, 1024, 512);
}
```

## Installation

You can install the package through Composer.

```bash
composer require larsvg/lvgimages
```

Publish configuration to your project

```bash
php artisan vendor:publish --tag=lvgimages
```

Images are saved to the `public/image` directory. The fourth parameter can be optionally used to structurize the images in folders.

As a result you get nicely structurized responsive images, a use case could be the HTML picture tag.

```html
<picture>
    <source srcset="{{ url('images/512x256.webp') }}" sizes="(max-width: 512px)" type="image/webp">
    <source srcset="{{ url('images/768x512.webp') }}" sizes="(min-width: 512px) and (max-width: 768px)" type="image/webp">
    <source srcset="{{ url('images/1024x512.webp') }}" sizes="(min-width: 768px) and (max-width: 1024px)" type="image/webp">
    <source srcset="{{ url('images/1536x1024.webp') }}" sizes="(min-width: 1024px)" type="image/webp">
    <source srcset="{{ url('images/1536x1024.jpg') }}" type="image/jpeg">
    <img src="{{ url('images/1536x1024.jpg') }}" alt="Responsive image">
</picture>
```
