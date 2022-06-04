<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getLink($any)
    {
        $getData = DB::table('srt_links')->where('srt', $any)->first();
        if (!$getData == null) {
            return redirect()->to($getData->link);
        } else {
            return view('404');
        }
    }
}
