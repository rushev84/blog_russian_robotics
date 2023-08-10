<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $content = $request->input('content');

        // Сохранение сообщения в БД

        $message = new Message;
        $message->name = $name;
        $message->phone = $phone;
        $message->email = $email;
        $message->content = $content;
        $message->save();

        // Отправка письма на почту

        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'content' => $content,
        ];

        Mail::to('admin@balita.com')->send(new ContactMail($data));

        return response()
            ->json(['success' => true,])
            ->header('Content-Type', 'application/json');
    }
}
