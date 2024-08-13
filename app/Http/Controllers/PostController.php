<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index() {
        return view('post-index');
    }

    public function create() {
        return 'createe';
    }

    public function delete($id) {
        return 'delete' . ' - ' . $id;
    }
}
