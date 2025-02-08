<?php

namespace Voloder\FlarumFeaturedImage\Listeners;

use Flarum\User\Event\Saving;
use Illuminate\Support\Facades\Log;

class SaveFeaturedImage
{
    public function handle(Saving $event)
    {
        try {
            $user = $event->user;
            $data = $event->data;

            if (isset($data["attributes"]["featuredImage"])) {
                $user->featured_image = $data["attributes"]["featuredImage"];
                $user->save();
            }
        } catch (\Exception $e) {
            error_log('Error in SaveFeaturedImage: ' . $e->getMessage());
            throw $e;
        }

    }
}