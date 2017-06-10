<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showSpendingInputPage()
    {
        return view('spending');
    }

    public function showSummaryPage()
    {
        return view('summary');
    }

    public function showCategoryPage()
    {
        return view('category');
    }
}
