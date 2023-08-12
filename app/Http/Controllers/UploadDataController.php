<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleXMLElement;

class UploadDataController extends Controller
{
    public function uploadData(Request $request)
    {
        $xmlFile = $request->file('choose_xml');
        $destinationPath = storage_path('app/upload');
        $filename = uniqid('uploaded_', true) . '.xml';
        $xmlFile->move($destinationPath, $filename);

        $xmlContent = file_get_contents($destinationPath . '/' . $filename);

        $xml = new SimpleXMLElement($xmlContent);

        foreach ($xml->children() as $item) {
            if (isset($item->Category->Elements)) {
                $categoryName = (string) $item->Category->Name;
                $categorySlug = Str::slug($categoryName);

                $category = Category::create([
                    'name' => $categoryName,
                    'slug' => $categorySlug,
                ]);
                foreach ($item->Category->Elements->children() as $element) {

                    $postTitle = '';
                    $postDescription = '';
                    $images = [];

                    foreach ($element as $key => $value) {
                        if($key === 'Name') {
                            $postTitle = (string) $value;
                            continue;
                        }

                        if($key === 'Description') {
                            $postDescription = (string) $value;
                            continue;
                        }

                        $images[] = $value;
                    }

                    $postSlug = Str::slug($postTitle);

                    $post = Post::create([
                        'title' => $postTitle,
                        'description' => $postDescription,
                        'slug' => $postSlug,
                        'category_id' => $category->id,
                    ]);

                    foreach ($images as $image) {
                        $image = Image::create([
                            'url' => (string) $image,
                        ]);
                        PostImage::create([
                            'post_id' => $post->id,
                            'image_id' => $image->id,
                        ]);

                    }

                }
            }
        }

        return response()
            ->json(['success' => true])
            ->header('Content-Type', 'application/json');
    }
}
