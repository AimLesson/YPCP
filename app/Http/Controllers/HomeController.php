<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Branch;
use App\Models\Profile;
use App\Models\Personalia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first(); 
        $schools = Branch::all();
        $personalia = Personalia::whereNull('branch_id')->get();
        $news = News::with('branch')->where('is_published', true)->orderBy('created_at', 'desc')->get();
        $favoriteNews = News::where('is_favorite', true)->get();


        return view('front.page.home', compact('profile', 'schools','news', 'personalia', 'favoriteNews'));
    }

    public function show($slug)
    {
        $sekolah = Branch::where('slug', $slug)->with('news')->firstOrFail();
        $schools = Branch::all();
        $personalia = Personalia::where('branch_id', $sekolah->id)->get();

        return view('front.page.sekolah', compact('sekolah', 'personalia', 'schools'));
    }

    public function news($slug, $type = null)
    {
        $news = News::with('branch')->where('slug', $slug)->firstOrFail();

        if ($type === 'sekolah') {
            $profile = $news->branch;
            if (!$profile) {
                return abort(404, 'Branch not found.');
            }
        } else {
            // Default profile for non-'sekolah' types
            $profile = Profile::first();
        }
        $schools = Branch::all();
        $relatedNews = News::where('id', '!=', $news->id)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    
        return view('front.page.news', compact('news', 'relatedNews', 'profile', 'schools'));
    }

    public function about(Request $request)
    {
        // Get the slug from the query string
        $slug = $request->query('slug');
    
        if ($slug) {
            // Fetch the branch profile if slug is provided
            $profile = Branch::where('slug', $slug)->with('news')->firstOrFail();
            $personalia = Personalia::where('branch_id', $profile->id)->get();

        } else {
            // Default to the first profile
            $profile = Profile::first();
            $personalia = Personalia::whereNull('branch_id')->get(); // Fetch personalia without branch association
        }
    
        $schools = Branch::all(); // Get all branches
        
    
        return view('front.page.aboutus', compact('profile', 'schools', 'personalia'));
    }

    public function allnews()
    {
        $profile = Profile::first(); 
        $schools = Branch::all();
        $news = News::with('branch')->where('is_published', true)->orderBy('created_at', 'desc')->get();

        return view('front.page.allnews', compact('profile', 'schools','news'));
    }

    public function eksis()
    {
        $profile = Profile::first(); 
        $schools = Branch::all();
        $news = News::with('branch')->where('is_published', true)->orderBy('created_at', 'desc')->paginate(4);

        return view('front.page.eksis', compact('profile', 'schools','news'));
    }
    
    
    

}
