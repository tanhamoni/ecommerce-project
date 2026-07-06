<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function contactMessages()
    {
        $messages = ContactMessage::orderBy('id', 'desc')->get();
        return view('admin.contact.list', compact('messages'));
    }

    public function deletecontactMessages ($id)
    {
        $message = ContactMessage::find($id);
        $message->delete();

        toastr()->success('Deleted successfully');
        return redirect()->back();
    }
}
