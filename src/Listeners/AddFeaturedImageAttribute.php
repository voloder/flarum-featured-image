<?php

namespace Voloder\FlarumFeaturedImage\Listeners;

use Flarum\Api\Serializer\UserSerializer;
use Flarum\Settings\Event\Serializing;

class AddFeaturedImageAttribute
{
    public function handle(Serializing $event) {
        if ($event->isSerializer(UserSerializer::class)) {
            $event->attributes['featuredImage'] = $event->model->featuredImage;
        }
    }
}