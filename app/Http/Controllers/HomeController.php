<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use App\Models\kuisioner;
use App\Models\Menu;
use App\Models\Promo;

class HomeController extends Controller
{

    public function index()
    {

        $about = About::all();
        $contact = Contact::all();
        $menu = Menu::all();
        $promo = Promo::all();

        return view('home',compact('about','contact','menu', 'promo') );
    }
}
