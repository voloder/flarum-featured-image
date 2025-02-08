<?php

namespace Voloder\FlarumFeaturedImage\Listeners;

use Flarum\User\Event\Saving;

class SaveFeaturedImage
{

    public function handle(Saving $event)
    {
        $user = $event->user;
        $data = $event->data;

        if (isset($data["attributes"]["featuredImage"])) {
            $user->featuredImage = $data["attributes"]["featuredImage"];
        }
    }
}