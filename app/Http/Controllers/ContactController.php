<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use File;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    public function create() {
        return view('contact.create')->with('success', 'Berhasil Menambah Data');
    }

    public function store(Request $request) {
        // dd($request->all());
        Contact::create([
            'notelepon' => $request->notelepon,
            'alamat' => $request->alamat,
            'jamoperasional' => $request->jamoperasional,
            'lokasi' => $request->lokasi

        ]);

        return redirect('/contact')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Contact $contact) {
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact) {
        $contact->update([
            'notelepon' => $request->notelepon,
            'alamat' => $request->alamat,
            'jamoperasional' => $request->jamoperasional
        ]);

        return redirect('/contact')->with('success', 'Data berhasil diupdate!');
    }

    public function delete(Contact $contact){
        $contact->delete();
        return redirect('/contact');
    }
}
