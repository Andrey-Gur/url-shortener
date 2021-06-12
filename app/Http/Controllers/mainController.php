<?php

namespace App\Http\Controllers;

use App\Models\links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mainController extends Controller
{
    public function index() {
        return view('main');
    }

    public function getLinks() {
        $links = links::where('creatorId', Auth::user()->id)->get();
        return view('ownLinks', compact('links'));
    }
}
