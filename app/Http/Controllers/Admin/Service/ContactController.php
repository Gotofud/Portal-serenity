<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Service\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::all();
        return view('admin.service.contact.index', compact('contact'));
    }

    public function reply(Contact $contact)
    {
        return view('admin.service.contact.reply', compact('contact'));
    }
    public function show(Contact $contact)
    {
        return view('admin.service.contact.detail', compact('contact'));
    }

    // kirim email manual
    public function sendReply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        Mail::to($contact->email)
            ->send(new SendEmail($contact,  $request->reply));
            
        $contact->reply = $request->reply;
        $contact->replied_at = now();
        $contact->save();

        return redirect()
            ->route('service.contact.index')
            ->with('success', 'Balasan berhasil dikirim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()
            ->route('service.contact.index')
            ->with('success', 'Balasan berhasil dihapus');
    }
}
