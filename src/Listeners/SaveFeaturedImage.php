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
            $actor = $event->actor;

            if($actor->id !== $user->id) {
                return;
            }

            if (array_key_exists("featuredImage", $data["attributes"])) {
                $user->featured_image = $data["attributes"]["featuredImage"];
            } else {
                $user->featured_image = $user->featured_image ?? null;
            }
            $user->save();
        } catch (\Exception $e) {
            error_log('Error in SaveFeaturedImage: ' . $e->getMessage());
            throw $e;
        }

    }
}