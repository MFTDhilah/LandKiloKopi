<?php

namespace App\Http\Controllers;

use App\Models\kuisioner;
use Illuminate\Http\Request;
use File;

class KuisionerController extends Controller
{
    public function index()
    {
        return view('kuisioner.kuisioner');
    }

    public function store(Request $request)
    {
        $kuisioner = kuisioner::create($request->except(['_token','submit']));
        if($request->hasFile('poto')){
            $request->file('poto')->move('poto/',$request->file('poto')->getClientOriginalName());
            $kuisioner->poto=$request->file('poto')->getClientOriginalName();
            $kuisioner->save();
        }
        return redirect('/home')->with('success', 'Kuisioner Berhasil Di Kirim');
    }
}