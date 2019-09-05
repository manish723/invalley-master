<?php

namespace App\Http\Controllers\Cp;

use App\Services\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploaderController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;

        $this->middleware('auth');
    }

    public function postServiceBlockIcon(Request $request)
    {
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $width = 191;
        $height = 172;

        return $this->uploadService->processImage('icons', $request, $allowedFileTypes, $width, $height);
    }
}
