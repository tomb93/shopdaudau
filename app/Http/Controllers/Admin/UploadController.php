<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UploadService;

class UploadController extends Controller
{
    protected $upload;
    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }
}
