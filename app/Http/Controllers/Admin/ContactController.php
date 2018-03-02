<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    private $per_page = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $contacts = Contact::
            Where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('subject', 'like', '%' . $search . '%')
                ->orWhere('message', 'like', '%' . $search . '%')
                ->latest()
                ->paginate($this->per_page);
        }elseif(Request('archived')){
            $contacts = Contact::whereNotNull('archived_at')->latest()->paginate($this->per_page);
        }
        else {
            $contacts = Contact::whereNull('archived_at')->latest()->paginate($this->per_page);
        }

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        if ($contact->archived_at == null) {
            $contact->update(['archived_at' => Carbon::now()], ['timestamps' => false]);
        } else {
            $contact->update(['archived_at' => null], ['timestamps' => false]);
        }
        session()->flash('success', __('messages.toggled_success'));
        return back();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        session()->flash('success', __('messages.deleted_success'));
        $contact->delete();

        return back();
    }

    public function archive(Contact $contact)
    {
        if ($contact->status === 1) {
            return back()->with('warning', 'پیام مورد نظر خوانده نشده');
        } elseif ($contact->status === 2) {
            $contact->status = 3;
            $contact->save();

            return back()->with('success', 'پیام مورد نظر با موفقیت آرشیو شد');
        } elseif ($contact->status === 3) {
            return back()->with('warning', 'پیام مورد نظر قبلا آرشیو شده');
        } else {
            return back()->with('warning', 'وضعیت نا مشخص');
        }
    }

}
