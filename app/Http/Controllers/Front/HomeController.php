<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }
    
    public function features()
    {
        return view('front.features');
    }
    
    public function pricing()
    {
        return view('front.pricing');
    }
    
    public function solutions()
    {
        return view('front.solutions');
    }
    
    public function integrations()
    {
        return view('front.integrations');
    }
    
    public function about()
    {
        return view('front.about');
    }
    
    public function contact()
    {
        return view('front.contact');
    }
    
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);
        
        // Process contact form
        // You can add email sending logic here
        
        return redirect()->route('contact')->with('success', 'Thank you for contacting us! We\'ll get back to you soon.');
    }
    
    public function careers()
    {
        return view('front.careers');
    }
    
    public function blog()
    {
        return view('front.blog');
    }
    
    public function terms()
    {
        return view('front.terms');
    }
    
    public function privacy()
    {
        return view('front.privacy');
    }
    
    public function help()
    {
        return view('front.help');
    }
    
    public function apiDocs()
    {
        return view('front.api-docs');
    }
    
    public function status()
    {
        return view('front.status');
    }
}