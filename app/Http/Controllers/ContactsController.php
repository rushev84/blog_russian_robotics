<?php

namespace App\Http\Controllers;

use App\Mail\NewMessageNotification;
use App\Mail\CustomerMail;
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
        $message = new Message;
        $message->name = $request->input('name');
        $message->phone = $request->input('phone');
        $message->email = $request->input('email');
        $message->content = $request->input('content');
        $message->save();


        // Отправка уведомления на почту
        $recipientEmail = 'rushev84@yandex.ru';
        $notification = new NewMessageNotification();
        \Illuminate\Support\Facades\Notification::route('mail', $recipientEmail)
            ->notify($notification);

        return response()
            ->json(['success' => true,])
            ->header('Content-Type', 'application/json');
    }

    public function contact()
    {
        $data = [
            'subject' => 'test subject',
            'body' => 'test body',
        ];

        Mail::to('hello@example.com')->send(new CustomerMail($data));

        return 'Email sent';
    }
}
