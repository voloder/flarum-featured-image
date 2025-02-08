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

            if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif") {
                throw new InvalidUploadException("Invalid file type", 400);
            }

            $request = $request->withUploadedFiles(["files" => [$file]]);
            return parent::data($request, $document);
        } catch (\Exception $e) {
            Log::error('Error in FeaturedImageController: ' . $e->getMessage());
            throw $e;
        }
    }
}