<?php

namespace App\Http\Admin;


use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{

    public $users;
    public $q;
    public $queryString=[
        'q'
    ];
    public function updatingQ(){
        
    }
    public function render()
    {
        if($this->q==''){
            $this->users=User::all();
        }else{

        $this->users=User::where('name','LIKE','%'.$this->q.'%')->get();

        }
        return view('admin.dashboard',[
            'users'=>$this->users
        ]);
    }
}
