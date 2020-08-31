# lvgimages
Easily convert images to specific formats and sizes in your Laravel application.

This package uploads an image based on a `Illuminate\Http\UploadedFile` instance to your public folder.
The images can be scaled and converted to WebP.

Here's an example of how the package can be used:

```php
foreach ($images as $image) {
    new WebPProcessor($image, 400, 300);
    new WebPProcessor($image, 800, 600);
    new WebPProcessor($image, 1200, 900);
    new JpgPngProcessor($image, 1200, 900);
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
