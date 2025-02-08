<?php
namespace FlarumExt\FeaturedImage;

use Flarum\Extend;
use Voloder\FlarumFeaturedImage\Api\Controllers\FeaturedImageController;

return [
    (new Extend\Frontend("forum"))
        ->js(__DIR__ . "/js/dist/forum.js"),

    (new Extend\Routes('api'))
        ->post('/featured-image/upload', 'featured-image.upload', FeaturedImageController::class)
];