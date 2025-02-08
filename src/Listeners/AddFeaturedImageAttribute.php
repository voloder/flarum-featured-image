<?php

namespace Voloder\FlarumFeaturedImage\Listeners;

use Flarum\Api\Serializer\UserSerializer;
use Flarum\User\User;

class AddFeaturedImageAttribute
{
    /**
     * @param UserSerializer $serializer
     * @param User $user
     * @param array $attributes
     *
     * @return array
     */
    public function __invoke(UserSerializer $serializer, User $user, array $attributes): array
    {
        $attributes["featuredImage"] = $user->featuredImage;
        return $attributes;
    }
}