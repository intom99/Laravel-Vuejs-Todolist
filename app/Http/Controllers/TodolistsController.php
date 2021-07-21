<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodolistsController extends Controller
{
    //

    public function index()
    {
        $result = DB::table('contents')->orderBy('id', 'desc')->get();
        return response()->json($result);
    }

    public function store()
    {
        $title = request('title');
        $content = request('content');
        DB::table('contents')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'title' => $title,
            'content' => $content,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Data added successfully'
        ]);
    }

    public function update($id)
    {
        $title = request('title');
        $content = request('content');
        DB::table('contents')->where('id', $id)->update([
            'updated_at' => date('Y-m-d H:i:s'),
            'title' => $title,
            'content' => $content,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Data updated successfully'
        ]);
    }

    public function destroy($id)
    {
        DB::table('contents')->where('id', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted successfully'
        ]);
    }
}
