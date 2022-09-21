<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    # This is for backend list
    public function list()
    {
        $contacts = Contact::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.Contact.index',compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect()->route('contact.list')
                        ->with('success','Contact deleted successfully');
    }
}
