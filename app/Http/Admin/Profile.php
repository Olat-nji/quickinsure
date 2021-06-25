<?php

namespace App\Http\Admin;

use App\Models\Insurance;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{

    public $user;
    
    public function mount($id){
        $this->user=User::find($id);
    }


    public function approve($id){
$insurance = Insurance::find($id);
$insurance->status='Approved';
$insurance->save();
    }

    public function disapprove($id){
        $insurance = Insurance::find($id);
$insurance->status='Disapproved';
$insurance->save();
    }
    

    public function render()
    {
        return view('admin.profile');
    }
}
