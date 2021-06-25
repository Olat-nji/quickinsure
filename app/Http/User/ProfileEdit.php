<?php

namespace App\Http\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
   
    use WithFileUploads;
public $name;
public $email;
public $image;
public $date_of_birth;
public $state_of_origin;


public function rules(){
    return [
        'email'=>'required|email|unique:users',
        'name'=>'required',
        'image'=>'image|max:1024'
    ];
}
public function updated(){
    
    $this->validate();
}
public function mount(){

$this->name=auth()->user()->name;
$this->email=auth()->user()->email;
$this->date_of_birth=auth()->user()->date_of_birth;
$this->state_of_origin=auth()->user()->state_of_origin;
}
    public function save(){
        
$user =User::find(auth()->user()->id);
$user->name=$this->name;
$user->email=$this->email;
$user->date_of_birth=$this->date_of_birth;
$user->state_of_origin=$this->state_of_origin;
$user->save();

if (isset($this->image)) {
    $user->updateProfilePhoto($this->image);
}
return redirect()->to('/profile');
    }
   
    public function render()
    {
        return view('user.profile-edit');
    }
}
