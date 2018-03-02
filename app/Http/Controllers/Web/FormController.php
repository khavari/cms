<?php

namespace App\Http\Controllers\Web;

use App\Events\ContactUs;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{

    // submit contact form from contact_form widgets
    public function contact(ContactRequest $request)
    {
        $request->merge(['ip' => $request->ip()]);
        $contact = Contact::create($request->all());
        session()->flash('success', __('messages.created_success'));
        event(new ContactUs($contact));
        return back();
    }
}
