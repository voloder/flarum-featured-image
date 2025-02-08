<?php
namespace Voloder\FlarumFeaturedImage\Api\Controllers;


use Flarum\Http\RequestUtil;
use Flarum\Settings\SettingsRepositoryInterface;
use FoF\Upload\Api\Controllers\UploadController;
use FoF\Upload\Exceptions\InvalidUploadException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Tobscure\JsonApi\Document;


class FeaturedImageController extends UploadController {
    /**
     * @var SettingsRepositoryInterface
     */
    protected SettingsRepositoryInterface $settings;

    /**
     * @throws InvalidUploadException
     */
    protected function data(ServerRequestInterface $request, Document $document): \Illuminate\Support\Collection
    {
        $actor = RequestUtil::getActor($request);

        $files = $request->getUploadedFiles();

        $file = $files["featuredImage"];
        $extension = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);

        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif") {
            throw new InvalidUploadException("Invalid file type", 400);
        }

        $request = $request->withUploadedFiles(["files" => $file]);

        $response = parent::data($request, $document);

        $actor->featuredImage = $response->first()->url;

        return $response;
    }
}