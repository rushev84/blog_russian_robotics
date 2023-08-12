<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleXMLElement;

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

        $xml = new SimpleXMLElement($xmlContent);

//        dd($xml);

        foreach ($xml->children() as $item) {
            if (isset($item->Category->Elements)) {
                $categoryName = (string) $item->Category->Name;
                $categorySlug = Str::slug($categoryName);

                $category = Category::create([
                    'name' => $categoryName,
                    'slug' => $categorySlug,
                ]);
                foreach ($item->Category->Elements->children() as $element) {
                    $postTitle = (string) $element->Name;
                    $postSlug = Str::slug($postTitle);

                    Post::create([
                        'title' => $postTitle,
                        'description' => $element->Description,
                        'slug' => $postSlug,
                        'category_id' => $category->id,
//                        'pict1' => (string) $element->Pict1,
//                        'pict2' => (string) $element->Pict2,
                    ]);
                }
            }
        }




        return response()
            ->json(['success' => true])
            ->header('Content-Type', 'application/json');
    }
}
