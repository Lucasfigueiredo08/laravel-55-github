<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $title = "Home Page";

        return view('site.home.index', compact('title'));
    }

    public function promotions()
    {
        $title = 'Promoções';

        return view('site.promotions.list', compact('title'));
    }
}
