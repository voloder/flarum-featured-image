<?php

namespace FlarumExt\FeaturedImage;

use Flarum\Api\Serializer\UserSerializer;
use Flarum\Extend;
use Flarum\User\Event\Saving;
use Flarum\User\User;
use Voloder\FlarumFeaturedImage\Api\Controllers\FeaturedImageController;
use Voloder\FlarumFeaturedImage\Listeners\AddFeaturedImageAttribute;
use Voloder\FlarumFeaturedImage\Listeners\SaveFeaturedImage;

return [
    (new Extend\Frontend("forum"))
        ->js(__DIR__ . "/js/dist/forum.js")
        ->css(__DIR__ . "/assets/forum.css"),

    (new Extend\Routes('api'))
        ->post('/featured-image/upload', 'featured-image.upload', FeaturedImageController::class),

    (new Extend\Event())
        ->listen(Saving::class, SaveFeaturedImage::class),

    (new Extend\Model(User::class))
        ->cast('featuredImage', 'string'),

    (new Extend\ApiSerializer(UserSerializer::class))
        ->attributes(AddFeaturedImageAttribute::class),
];