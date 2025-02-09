<?php

namespace Voloder\FlarumFeaturedImage\Api\Controllers;


use Flarum\Http\RequestUtil;
use Flarum\Settings\SettingsRepositoryInterface;
use FoF\Upload\Api\Controllers\UploadController;
use FoF\Upload\Exceptions\InvalidUploadException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Tobscure\JsonApi\Document;


class FeaturedImageController extends UploadController
{
    /**
     * @var SettingsRepositoryInterface
     */
    protected SettingsRepositoryInterface $settings;

    /**
     * @throws InvalidUploadException
     */
    protected function data(ServerRequestInterface $request, Document $document): \Illuminate\Support\Collection
    {
        try {
            $file = $request->getUploadedFiles()["featuredImage"];
            $extension = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);

            if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "webp" && $extension !== "gif") {
                throw new InvalidUploadException("Invalid file type", 400);
            }

            $this->compress($file->getStream()->getMetadata("uri"), $file->getStream()->getMetadata("uri"), 50);

            $request = $request->withUploadedFiles(["files" => [$file]]);
            return parent::data($request, $document);
        } catch (\Exception $e) {
            error_log('Error in FeaturedImageController: ' . $e->getMessage());
            throw $e;
        }
    }

    function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        elseif ($info['mime'] == 'image/webp')
            $image = imagecreatefromwebp($source);

        list($width, $height) = getimagesize($image);
        $r = $width / $height;

        if($width > 800) {
            $width = 800;
            $height = 800 / $r;
        }

        imagecopyresampled($image, $image, 0, 0, 0, 0, $width, $height, $info[0], $info[1]);
        imagewebp($image, $destination, $quality);

        return $destination;
    }
}