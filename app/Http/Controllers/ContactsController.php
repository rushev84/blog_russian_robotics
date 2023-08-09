<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
