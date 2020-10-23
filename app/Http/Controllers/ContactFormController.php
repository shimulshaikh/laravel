<?php

namespace App\Http\Controllers;

use App\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
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
        $contactForms = ContactForm::latest()->get();
        return view('website.backend.contactForm.index', compact('contactForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.contactForm.create');
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
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'messageForm' => 'required'
            ]);
             
             
                $contactForm = new ContactForm();

                $contactForm->name = request('name');
                $contactForm->email = request('email');
                $contactForm->subject = request('subject');
                $contactForm->messageForm = request('messageForm');

                $contactForm->save();

                return redirect()->route('contactForm.index')
                   ->with('add_ContractForm','Form has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactForm = ContactForm::findorFail($id);    
        return view('website.backend.contactForm.edit', compact('contactForm')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'messageForm' => 'required'
            ]);
             
             
                $contactForm = ContactForm::findorFail($request->id);

                $contactForm->name = request('name');
                $contactForm->email = request('email');
                $contactForm->subject = request('subject');
                $contactForm->messageForm = request('messageForm');

                $contactForm->save();

                return redirect()->route('contactForm.index')
                   ->with('update_ContractForm','Form has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactForm = ContactForm::findorFail($id);
        $contactForm->delete();
        return back()->with('Delete','Form has been deleted successfully');
    }
}
