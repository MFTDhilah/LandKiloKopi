<?php

namespace App\Http\Controllers;

use App\Models\kuisioner;
use App\Models\pertanyaan;
use Illuminate\Http\Request;
use File;

class KuisionerController extends Controller
{
    public function index()
    {
        $pertanyaan = pertanyaan::all();
        return view('kuisioner.kuisioner', compact(['pertanyaan']));
    }

    public function store(Request $request)
    {
        $kuisioner = kuisioner::create($request->except(['_token','submit']));
        if($request->hasFile('poto')){
            $request->file('poto')->move('poto/',$request->file('poto')->getClientOriginalName());
            $kuisioner->poto=$request->file('poto')->getClientOriginalName();
            $kuisioner->save();
        }
        return redirect('https://wa.me/6283140457656');
    }
}