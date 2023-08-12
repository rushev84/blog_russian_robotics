<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadDataController extends Controller
{
    public function uploadData(Request $request)
    {
//        $xmlFile = $request->file('choose_xml');
//
//        $destinationPath = storage_path('app/upload');
//        $filename = uniqid('uploaded_', true) . '.xml';
//
//        $xmlFile->move($destinationPath, $filename);

        $xmlPath = storage_path('app/upload/uploaded.xml');

        $xmlContent = file_get_contents($xmlPath);
//        $xmlContent->xml();


//                $xml = simplexml_load_file($xmlPath);

        $xml = new \SimpleXMLElement($xmlContent);

        dd($xml);

        return response()
            ->json(['success' => true])
            ->header('Content-Type', 'application/json');
    }
}
