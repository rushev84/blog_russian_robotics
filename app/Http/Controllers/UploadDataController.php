<?php

namespace App\Http\Controllers;

use App\Services\XmlParserService;
use Illuminate\Http\Request;

class UploadDataController extends Controller
{
    protected $xmlParser;

    public function __construct(XmlParserService $xmlParser)
    {
        $this->xmlParser = $xmlParser;
    }

    public function uploadData(Request $request)
    {
        $xmlFile = $request->file('choose_xml');
        $destinationPath = storage_path('app/upload');
        $filename = uniqid('uploaded_', true) . '.xml';
        $xmlFile->move($destinationPath, $filename);

        $xmlContent = file_get_contents($destinationPath . '/' . $filename);

        $this->xmlParser->parseXml($xmlContent);

        return response()
            ->json(['success' => true])
            ->header('Content-Type', 'application/json');
    }
}
