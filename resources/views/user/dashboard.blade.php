<div>
    <div>
        <main>
            <div class="flex justify-around px-2 md:px-24 mb-4">
                <button class="rounded-md border-2 border-purple-600 py-3 md:px-4 px-2 text-white bg-purple-700" onclick="addInsure()">Add insurance</button>
                <button class="rounded-md mx-8 border-2 border-purple-600 py-3 md:px-4 px-2 text-white bg-purple-700" onclick="claims()">My plans</button>
                <button class="rounded-md border-2 border-purple-600 py-3 md:px-4 px-2 text-white bg-purple-700" onclick="safelock()">Safe lock</button>
            </div>
        </main>
        <div class="mt-10">
            <div class="hidden" id="safelockk" wire:ignore.self>
                <h1 class="text-2xl text-center text-black font-bold">Safe lock</h1>
                <div class="overview grid md:grid-cols-2 gap-x-8 md:px-32">
                    @if(auth()->user()->safelocks!=null)
                    @foreach (auth()->user()->safelocks as $safe)
                    <div class="safelock  mt-4 px-8 py-12 w-80 md:w-full mx-auto md:mx-0  rounded-md bg-purple-600 text-white">
                        <h4 class="text-lg font-bold">Savings({{$safe->per}})</h4>
                        <h2 class="text-3xl font-bold">{{$safe->savings}}</h2>
                        <p class="mt-2">Total saved: 40000</p>
                        <div class="flex justify-between font-bold mb-5">
                            <p>Created at : {{$safe->created_at}}</p>
                            <p>Expired at : {{$safe->expire_at}}</p>

                        </div>
                        @if($safe->closed=='')

                        @else
                        <p>Closed at : {{$safe->updated_at}}</p>
                        @endif
                        @if($safe->account_number!='')
                        <p>Account Number : <span class="font-bold">{{$safe->account_number}}</span> </p>
                        @endif
                        @if($safe->closed=='')
                        @if($safe->account_number=='')
                        <button class="px-4 py-2 text-purple-600 bg-white rounded-md " wire:click="withdrawing({{$safe->id}})">Withdraw</button>
                        @else
                        <button class="mt-10 px-4 py-2 text-purple-600 bg-white rounded-md line-through">Withdrawn</button>
                        @endif


                        <button class="px-4 py-2 text-purple-600 bg-white rounded-md " wire:click="closing({{$safe->id}})">Close</button>
                        @else
                        <button class="mt-10 px-4 py-2 text-purple-600 bg-white rounded-md line-through">Closed</button>
                        @endif

                    </div>
                    @endforeach
                    @endif

                </div>
                <button class="block w-36 text-center mx-auto mt-6 bg-purple-600 px-5 py-2 rounded-md text-white" onclick="claim()">Add new</button>
            </div>

            <div class="addsafe hidden fixed top-20 bg-white rounded-md py-6" id="safelock" wire:ignore.self>
                <form action="" class="relative px-12 mx-auto">
                    <h1 class="text-3xl text-black text-center font-bold">Add new saving</h1>
                    <label class="font-bold block my-2" for="">Amount*</label>
                    <input type="number" placeholder="Amount to save" class="px-2 rounded-sm block py-3 border-purple-700   w-full" name="" id="">
                    <label class="font-bold block my-2" for="">Account*</label>
                    <input type="number" placeholder="Account to Withdraw from" class="px-2 rounded-sm block py-3 border-purple-700   w-full" name="" id="">
                    <label class="font-bold block my-2" for="">Date to end saving*</label>
                    <input type="date" class="px-2 rounded-sm block py-3 border-purple-700   w-full mb-4" name="" id="">
                    <label for="" class="font-bold mr-4 mt-6">Automatic withdraw</label>
                    <input type="checkbox" name="" id="">
                    <input type="submit" value="Submit" class="mt-4 w-40 mx-auto block py-3 bg-purple-600 rounded-md text-white">
                </form>
            </div>

            <div class="overview grid md:grid-cols-2 gap-x-8 md:px-32" id="overview" wire:ignore.self>
                <h1 class="text-2xl text-center font-bold text-black col-span-2">My plans</h1>
                @if(auth()->user()->insurances!=null)
                @foreach (auth()->user()->insurances as $insurance)
                <div class="mt-4 px-8 py-12 w-80 md:w-full mx-auto md:mx-0  rounded-md bg-purple-600 text-white">
                    <h4 class="text-xl">Insurance type:</h4>
                    <h2 class="text-3xl font-bold">{{ucwords($insurance->type)}}</h2>
                    <p class="mt-2">Status: {{$insurance->status}}</p>
                    <div class="flex justify-between font-bold mb-3">
                        <p>Created at : {{$insurance->created_at}}</p>
                        <p>Expired at : {{$insurance->expired_at}} </p>
                    </div>
                    @if($insurance->expired_at=='')
                    <button class="px-4 block rounded-md bg-white text-purple-600 text-center w-24 py-3" wire:click="claiming({{$insurance->id}})">Claim</button>
                    @else
                    <button class="mt-10 px-4 py-2 text-purple-600 bg-white rounded-md line-through">Claimed</button>
                    @endif
                </div>
                @endforeach
                @endif

            </div>


            <div class=" flex justify-center w-full">
                <div class="hidden  px-8 py-6 bg-white forms w-full" id="forms" wire:ignore.self>
                    <select name="" id="insureType" class=" top-20  text-black border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2" onchange="insure()">
                        <option value="1">--Select Insurance Type--</option>
                        <option value="2">Life Insurance</option>
                        <option value="3">Medical Insurance</option>
                        <option value="4">Property Insurance</option>
                        <option value="5">Car Insurance</option>
                    </select>
                    <form wire:submit.prevent="addLife" id="life" class="mt-8 hidden" wire:ignore.self>
                        <h1 class="text-3xl font-bold text-purple-700 text-center mb-8">Life Insurance</h1>
                        <input type="text" wire:model.lazy="next_of_kin" id="lifeInsure" placeholder="Next of kin" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="address_of_next_of_kin" id="" placeholder="Address of next of kin" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="bank_information" id="" placeholder="Bank information" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="asset_worth" id="" placeholder="Asset worth" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="submit" value="Submit" class="block px-6 py-2 bg-purple-700 rounded text-white mx-auto">
                    </form>
                    <form wire:submit.prevent="addMedical" id="Medical" class="mt-8 hidden" wire:ignore.self>
                        <h1 class="text-3xl font-bold text-purple-700 text-center mb-8">Medical Insurance</h1>
                        <input type="text" wire:model.lazy="name_of_doctor" id="lifeInsure" placeholder="Name of doctor" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="name_of_patient" id="" placeholder="Name of patient" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="sickness_diagnosis" id="" placeholder="Sickness Diagnosis" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="treatment" id="" placeholder="Treatment" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="submit" value="Submit" class="block px-6 py-2 bg-purple-700 rounded text-white mx-auto">
                    </form>
                    <form wire:submit.prevent="addProperty" id="Property" class="mt-8 hidden" wire:ignore.self>
                        <h1 class="text-3xl font-bold text-purple-700 text-center mb-8">Property Insurance</h1>
                        <input type="text" wire:model.lazy="property_list" id="lifeInsure" placeholder="Property List" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="zip_code" id="" placeholder="Zip code" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="company_verifier" id="" placeholder="Company verifier" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="property_address" id="" placeholder="Property address" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="submit" value="Submit" class="block px-6 py-2 bg-purple-700 rounded text-white mx-auto">
                    </form>
                    <form wire:submit.prevent="addCar" id="Car" class="mt-8 hidden" wire:ignore.self>
                        <h1 class="text-3xl font-bold text-purple-700 text-center mb-8">Car Insurance</h1>
                        <input type="text" wire:model.lazy="licence_no" id="lifeInsure" placeholder="License No" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="licence_held" id="" placeholder="License Held" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="text" wire:model.lazy="car_type" id="" placeholder="Car Type" class="  border-purple-700 px-2 py-3 block mx-auto w-full rounded mb-2">
                        <input type="submit" value="Submit" class="block px-6 py-2 bg-purple-700 rounded text-white mx-auto">
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div x-data="{open :@entangle('withdrawshow')}">
        <div class="center w-screen fixed top-20" x-show="open">
            <div class="w-80 md:w-96 relative mx-auto px-6 py-8 bg-white rounded-md shadow-md">
                <p class="text-right font-bold text-3xl cursor-pointer" wire:click="withdrawclose">x</p>
                <h1 class="text-3xl text-center text-black my-4 font-medium">Withdraw</h1>
                <div>
                    <form wire:submit.prevent="withdraw">
                        <label for="" class="block font-bold my-3">Account number</label>
                        <input type="text" wire:model="account_number" placeholder="Account number here" class="w-full block rounded-sm border-purple-700   py-3 px-3">
                        <label for="" class="block font-bold my-3">Email</label>
                        <input type="email" wire:model="email" placeholder="Email here" class="w-full block rounded-sm border-purple-700   py-3 px-3">
                        <label for="" class="block font-bold my-3">Password</label>
                        <input type="password" wire:model="password" placeholder="Password here" class="w-full block rounded-sm border-purple-700   py-3 px-3">
                        <input type="submit" value="Submit" class="px-7 py-3 block mt-4 bg-purple-600 rounded-md text-white mx-auto">
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div x-data="{open :@entangle('claimshow')}">
                <div class="center w-screen fixed top-20" x-show="open">
                    <div class="w-80 md:w-96 relative mx-auto p-6 bg-white rounded-md shadow-md">
                        <p class="text-right font-bold text-3xl cursor-pointer" wire:click="claimclose">x</p>
                        <h1 class="text-3xl text-center text-black my-4 font-medium">Claim</h1>
                        <div>
                            <form wire:submit.prevent="claim">


                                <label for="" class="block font-bold my-3">Email</label>
                                <input type="email" wire:model="email" placeholder="Email here" class="w-full block  bg-white rounded-sm  py-3 px-3">
                                @error('email')<span class="text-red-500">{{$message}}</span>@enderror
                                <label for="" class="block font-bold my-3">Password</label>
                                <input type="password" wire:model="password" placeholder="Password here" class="w-full block rounded-sm  py-3 px-3">
                                @error('password')<span class="text-red-500">{{$message}}</span>@enderror
                                <input type="submit" value="Submit" class="px-7 py-3 block mt-4 bg-purple-600 rounded-md text-white mx-auto">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="center w-screen fixed top-20 hidden" id="claim" wire:ignore.self>
                <div class="w-80 md:w-96 relative mx-auto p-6 bg-white rounded-md shadow-md">
                    <p class="text-right font-bold text-3xl cursor-pointer" onclick="clsClaim()">x</p>
                    <h1 class="text-3xl text-center text-black my-4 font-medium">Add new Safe Lock</h1>
                    <div>
                        <form wire:submit.prevent="addSafeLock">
                            <label for="" class="block font-bold my-3">Savings (&#8358;)</label>
                            <input type="text" wire:model="savings" required placeholder="3000" class="w-full block rounded-sm  py-3 px-3">
                            <label for="" class="block font-bold my-3">Interval</label>
                            <select wire:model="per" required class="w-full block rounded-sm  py-3 px-3">
                                <option>Per Day</option>
                                <option>Per Week</option>
                                <option>Per Month</option>
                                <option>Per Year</option>
                            </select>
                            <label for="" class="block font-bold my-3">Expire At</label>
                            <input type="date" wire:model="expire_at" required placeholder="mm/dd/yyyy" format="dd-mm-yyyy" class="w-full block rounded-sm  py-3 px-3">

                            <input type="submit" value="Submit" class="px-7 py-3 block mt-4 bg-purple-600 rounded-md text-white mx-auto">
                        </form>
                    </div>
                </div>
            </div>




            <div>
                <div x-data="{open :@entangle('closeshow')}">
                    <div class="center w-screen fixed top-20" x-show="open">
                        <div class="w-80 md:w-96 relative mx-auto p-6 bg-white rounded-md shadow-md">
                            <p class="text-right font-bold text-3xl cursor-pointer" wire:click="closeclose">x</p>

                            <div>
                                <form wire:submit.prevent="close">
                                    <label for="" class="block font-bold my-3">Are you sure you want to close this safelock ?</label>

                                    <label for="" class="block font-bold my-3">Email</label>
                                    <input type="email" wire:model="email" placeholder="Email here" class="w-full block  bg-white rounded-sm  py-3 px-3">
                                    @error('email')<span class="text-red-500">{{$message}}</span>@enderror
                                    <label for="" class="block font-bold my-3">Password</label>
                                    <input type="password" wire:model="password" placeholder="Password here" class="w-full block rounded-sm  py-3 px-3">
                                    @error('password')<span class="text-red-500">{{$message}}</span>@enderror
                                    <input type="submit" value="Close Safelock" class="px-7 py-3 block mt-4 bg-purple-600 rounded-md text-white mx-auto">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
