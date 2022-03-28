<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from authors');
        return view('index', ['items' => $items]);
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ];
        DB::insert('insert into authors (name, age, nationality) values (:name, :age, :nationality)', $param);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from authors where id = :id', $param);
        return view('edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ];
        DB::update('update authors set name =:name, age =:age, nationality =:nationality where id =:id', $param);
        return redirect('/');
    }
}
