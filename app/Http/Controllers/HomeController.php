<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function home() {
        $view = DB::table('hotels')
                ->orderBy('view_count', 'desc')
                ->get();
        return Inertia::render('Home', ['view' => $view]);
    }
}
