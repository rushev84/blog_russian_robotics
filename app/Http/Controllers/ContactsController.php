<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('contacts.index', compact(
            'categories',
        ));
    }

    public function create_message(Request $request)
    {
        $message = new Message;
        $message->name = $request->input('name');
        $message->phone = $request->input('phone');
        $message->email = $request->input('email');
        $message->content = $request->input('content');
        $message->save();

        return response()
            ->json(['success' => true,])
            ->header('Content-Type', 'application/json');
    }
}
