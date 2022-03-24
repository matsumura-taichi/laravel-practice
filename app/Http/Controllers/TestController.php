<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('index', ['txt' => 'フォームを入力']);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'age' => 'numeric',
            'registered_at' => 'date|nullable',
        ];
        $this->validate($request, $validate_rule);
        return view('index', ['txt' => '正しい入力です']);
    }
}
