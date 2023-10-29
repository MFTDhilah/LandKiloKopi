<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use App\Models\Menu;
use App\Models\Promo;

class HomeController extends Controller
{

    public function index()
    {

        $about = About::where('enabled','!=',0)->get();
        $contact = Contact::where('enabled','!=',0)->get();
        $menu = Menu::where('enabled','!=',0)->get();
        $promo = Promo::where('enabled','!=',0)->get();

        return view('home',compact('about','contact','menu', 'promo') );
    }
}
