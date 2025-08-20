<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function AboutUs(){
        $page_heading = 'About Our Guru Dham';

        $setting = Settings::where('page_heading', $page_heading)->first();

        if (!$setting) {
            abort(404, 'Page settings not found.');
        }

        $description = $setting->content;

        return view('front.pages.about-us', compact('page_heading', 'description'));
    }

    public function babamoni(){
        $page_heading = 'Sri Srimat Swami Swarupananda Paramhansa Dev';

        $setting = Settings::where('page_heading', $page_heading)->first();

        if (!$setting) {
            abort(404, 'Page settings not found.');
        }

        $description = $setting->content;

        return view('front.pages.babamoni', compact('page_heading', 'description'));
    }
}
