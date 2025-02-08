<?php
namespace FlarumExt\FeaturedImage;

use Flarum\Extend;
use Flarum\User\User;

return [
    (new Extend\Frontend("forum"))
        ->js(__DIR__ . "/js/src/forum.js")
];