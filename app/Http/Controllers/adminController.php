<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\links;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index() {
        $links = links::paginate(15);
        $users = User::all();

        $day = 0;

        $r = 0;

        foreach ($links as $link) {
            if($link->created_at->format('y-m-d') == now()->format('y-m-d')) {
                $day++;
            }
        }

        return view('admin.adminIndex', compact('links', 'day'));
   }
}
