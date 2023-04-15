<?php

namespace App\Http\Livewire;

use App\Events\SendContactAdminEmailEvent;
use App\Models\Contact;
use Livewire\Component;
use App\Events\SendContactMailEvent;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $status = false;

    public function submit()
    {
        $contact = $this->validate([
            'name' => 'required|max: 255',
            'email' => 'required|email|unique:contacts|max:255', 
            'subject' => 'required|max: 255',
            'message' => 'required',     
        ]);

        Contact::create($contact);
        
        SendContactMailEvent::dispatch($contact);
        SendContactAdminEmailEvent::dispatch($contact);

        $this->status = true;
        $this->reset('name', 'email', 'subject', 'message');

        // return back()->with('success', 'Thanks for your message! We will get back to you soon!');
    }
   
    public function render()
    {
        return view('livewire.contact-form');
    }
}
