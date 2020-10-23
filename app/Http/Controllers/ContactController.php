<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('website.backend.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
                'location' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'phone' => 'required'
            ]);
             
             
                $contact = new Contact();

                $contact->location = request('location');
                $contact->email = request('email');
                $contact->address = request('address');
                $contact->phone = request('phone');

                $contact->save();

                return redirect()->route('contact.index')
                   ->with('add_Contract','Contact has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findorFail($id);    
        return view('website.backend.contact.edit', compact('contact')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
                'location' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'phone' => 'required'
            ]);
             
                $contact = Contact::findorFail($request->id);

                $contact->location = request('location');
                $contact->email = request('email');
                $contact->address = request('address');
                $contact->phone = request('phone');

                $contact->save();

                return redirect()->route('contact.index')
                   ->with('update_Contract','Contact has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findorFail($id);
        $contact->delete();
        return back()->with('Delete','contact has been deleted successfully');
    }
}
