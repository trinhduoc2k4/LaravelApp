<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Mechanic;
use App\Models\Role;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getId($user_id) {
        $userData = Role::where('id', $user_id)->first();
        return response()->json([
            'data' => $userData->users
        ]);
    }
}
