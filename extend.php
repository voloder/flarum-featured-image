<?php
namespace FlarumExt\FeaturedImage;

use Flarum\Extend;
use Flarum\User\User;

return [
    (new Extend\Frontend("forum"))
        ->js(__DIR__ . "/js/dist/forum.js"),

    (new Extend\ApiController())
        ->addInclude(['upload-image']),
];