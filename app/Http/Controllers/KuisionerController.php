<?php

namespace App\Http\Controllers;

use App\Models\kuisioner;
use App\Models\Questions;
use Illuminate\Http\Request;
use File;

class KuisionerController extends Controller
{
    public function index()
    {
        $quest = Questions::all();
        return view('kuisioner.kuisioner', compact(['quest']));
    }

    public function store(Request $request)
    {
        $kuisioner = kuisioner::create($request->except(['_token','submit']));
        if($request->hasFile('poto')){
            $request->file('poto')->move('poto/',$request->file('poto')->getClientOriginalName());
            $kuisioner->poto=$request->file('poto')->getClientOriginalName();
            $kuisioner->save();
        }
        return redirect('https://wa.me/6283140457656?text=Halo%20kak%20aku%20udah%20isi%20kuesioner%20nihhh%2C%20code%20promo%20buat%20aku%20mana%20yaaa%3F%3F%3F%3F');
    }
}