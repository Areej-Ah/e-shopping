<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\Slider;
use App\Models\News;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Team;
use App\Models\SubService;


class PagesController extends Controller
{
    public function home()
    {
        $setting= Setting::first();
        $services= Service::where('active', '1')->get();
        $sliders= Slider::where('active', '1')->get();
        $news= News::where('active', '1')->take(4)->get();
        $customers= Customer::where('show', '1')->get();
        $teams= Team::where('active', '1')->get();
        $sliders = Slider::where('active', '1')->get();
        $socialMedia= SocialMedia::where('active', '1')->get();

        return view('frontend.home', compact('setting', 'services', 'customers', 'teams','sliders','socialMedia','news'));

    }


    public function about()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $services= Service::where('active', '1')->get();

        return view('frontend.about', compact('setting', 'socialMedia', 'services'));
    }


    public function services()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $services= Service::where('active', '1')->get();
        return view('frontend.services', compact('setting', 'socialMedia', 'services'));
    }


    public function service($id)
    {

        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $service = Service::find($id);
        $services= Service::where('active', '1')->get();

        return view('frontend.service', compact('setting', 'socialMedia', 'service', 'services'));
    }


    public function news()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $news= News::where('active', '1')->get();
        $last= News::where('active', '1')->latest()->first();
        $services= Service::where('active', '1')->get();

        return view('frontend.news', compact('setting', 'socialMedia', 'news','last', 'services'));
    }


    public function new($id)
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::all();
        $new = News::find($id);
        $news= News::where('active', '1')->get();
        $services= Service::where('active', '1')->get();

        return view('frontend.new_item', compact('setting', 'socialMedia', 'new', 'news','services'));
    }


    public function contact()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $services= Service::where('active', '1')->get();

        return view('frontend.contact', compact('setting', 'socialMedia', 'services'));
    }

    public function jobs()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::all();
        $services= Service::where('active', '1')->get();

        return view('frontend.jobs', compact('setting', 'socialMedia', 'services'));
    }

    public function images()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $images= Photo::where('active', '1')->get();
        $services= Service::where('active', '1')->get();

        return view('frontend.images', compact('setting', 'socialMedia', 'images', 'services'));
    }

    public function videos()
    {
        $setting= Setting::first();
        $socialMedia= SocialMedia::where('active', '1')->get();
        $videos= Video::where('active', '1')->get();
        $services= Service::where('active', '1')->get();

        return view('frontend.videos', compact('setting', 'socialMedia', 'videos', 'services'));
    }
}
