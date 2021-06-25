<?php

namespace App\Http\User;

use App\Models\Insurance;
use App\Models\CarInsurance;
use App\Models\PropertyInsurance;
use App\Models\LifeInsurance;
use App\Models\MedicalInsurance;
use App\Models\SafeLock;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Dashboard extends Component
{

    public $next_of_kin;
    public $address_of_next_of_kin;
    public $bank_information;
    public $asset_worth;
    public $name_of_doctor;
    public $name_of_patient;
    public $sickness_diagnosis;
    public $treatment;
    public $property_list;
    public $zip_code;
    public $company_verifier;
    public $property_address;
    public $licence_no;
    public $licence_held;
    public $car_type;

    public $savings;
    public $expire_at;


    public $claimingid;
    public $claimshow = false;
    public $ran_no;

    public $email;
    public $password;

    public $withdrawingid;
    public $per;
    public $withdrawshow = false;
    public $account_number;


    public $closeshow = false;
    public $closingid;

    public function mount()
    {
        $this->safelocks = SafeLock::where('user_id', auth()->user()->id)->get();
    }

    public function addLife()
    {

        $life = new LifeInsurance;
        $life->next_of_kin = $this->next_of_kin;
        $life->address_next_of_kin = $this->address_of_next_of_kin;
        $life->bank_information = $this->bank_information;
        $life->asset_worth = $this->asset_worth;
        $life->user_id = auth()->user()->id;
        $life->save();

        $insurance = new Insurance();
        $insurance->user_id = auth()->user()->id;
        $insurance->insurance_id = $life->id;
        $insurance->status='Pending Approval';
        $insurance->type = 'life';
        $insurance->save();
        return redirect()->to('/dashboard');
    }

    public function addMedical()
    {
        $medical = new MedicalInsurance;
        $medical->name_of_doctor = $this->name_of_doctor;
        $medical->name_of_patient = $this->name_of_patient;
        $medical->sickness_diagnosis = $this->sickness_diagnosis;
        $medical->treatment = $this->treatment;
        $medical->save();

        $insurance = new Insurance();
        $insurance->user_id = auth()->user()->id;
        $insurance->insurance_id = $medical->id;
        $insurance->status='Pending Approval';
        $insurance->type = 'medical';
        $insurance->save();

        return redirect()->to('/dashboard');
    }

    public function addProperty()
    {
        $property = new PropertyInsurance;

        $property->property_list = $this->property_list;
        $property->zip_code = $this->zip_code;
        $property->company_verifier = $this->company_verifier;
        $property->property_address = $this->property_address;
        $property->save();

        $insurance = new Insurance();
        $insurance->user_id = auth()->user()->id;
        $insurance->insurance_id = $property->id;
        $insurance->status='Pending Approval';
        $insurance->type = 'property';
        $insurance->save();

        return redirect()->to('/dashboard');
    }

    public function addCar()
    {
        $car = new CarInsurance;

        $car->licence_no = $this->licence_no;
        $car->licence_held = $this->licence_held;
        $car->car_type = $this->car_type;
        $car->save();

        $insurance = new Insurance();
        $insurance->user_id = auth()->user()->id;
        $insurance->insurance_id = $car->id;
        $insurance->status='Pending Approval';
        $insurance->type = 'car';
        $insurance->save();

        return redirect()->to('/dashboard');
    }


    public function addSafeLock()
    {
        $safelock = new SafeLock();
        $safelock->expire_at = $this->expire_at;
        $safelock->savings = $this->savings;
        $safelock->user_id = auth()->user()->id;
        $safelock->per = $this->per;
        $safelock->save();
    }


    public function claiming($id)
    {
        $this->claimingid = $id;
        $this->claimshow = true;
    }
    public function claimclose()
    {

        $this->claimshow = false;
    }

    public function claim()
    {

        if ($this->email == auth()->user()->email) {
            if (Hash::check($this->password, auth()->user()->password)) {
                $insurance = Insurance::find($this->claimingid);
                $insurance->expired_at = date('Y-m-d H:i:s');
                $insurance->save();
                $this->claimshow = false;
            } else {

                $this->addError('password', 'The password field is invalid.');
            }
        } else {
            $this->addError('email', 'The email field is invalid.');
        }
    }






    public function withdrawing($id)
    {
        $this->withdrawingid = $id;
        $this->withdrawshow = true;
    }

    
    public function withdrawclose()
    {

        $this->withdrawshow = false;
    }

    public function withdraw()
    {

        if ($this->email == auth()->user()->email) {
            if (Hash::check($this->password, auth()->user()->password)) {
                $safelock = SafeLock::find($this->withdrawingid);
                $safelock->expire_at = date('Y-m-d H:i:s');
                $safelock->account_number = $this->account_number;
                
                $safelock->save();
                $this->withdrawshow = false;
            } else {

                $this->addError('password', 'The password field is invalid.');
            }
        } else {
            $this->addError('email', 'The email field is invalid.');
        }
    }



    public function closeclose()
    {

        $this->closeshow = false;
    }
    public function closing($id)
    {
        $this->closingid = $id;
        $this->closeshow = true;
        
    }
    public function close(){
        $safelock = SafeLock::find($this->closingid);
        $safelock->closed='yes';
        $safelock->save();
        $this->closeshow = false;

    }






    public function render()
    {

        return view('user.dashboard');
    }
}
