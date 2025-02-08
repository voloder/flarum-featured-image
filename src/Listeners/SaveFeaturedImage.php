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
                $user->featuredImage = $data["attributes"]["featuredImage"];
                $user->save();
            }
        } catch (\Exception $e) {
            Log::error('Error in SaveFeaturedImage: ' . $e->getMessage());

            throw $e;
        }

    }
}