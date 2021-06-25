<div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <a href="{{url('admin/dashboard')}}" class="text-center border-2 border-purple-700 ml-6 py-2 hover:bg-purple-700 hover:text-white rounded-full text-black text-lg mt-1 block w-24">Go Back</a>
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{$user->name}}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Personal details and application.
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Full name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$user->name}}
                    </dd>
                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Email address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$user->email}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Date of Birth
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$user->date_of_birth}}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        State Of Origin
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$user->state_of_origin}}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Safe Locks
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                        @foreach ($user->safelocks as $safe)

                        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box border-b border-gray-200">
                            <div class="flex items-center  dark:border-dark-5 px-5 py-4">

                                <div class="ml-3 mr-auto">
                                    <a href="" class="font-medium">Savings ({{$safe->per}}): {{$safe->savings}}</a>
                                    
                                    <div class="text-gray-700 dark:text-gray-600 mt-2 ">
                                        <a href="" class="block font-medium mt-5">Details: </a>

                                        Created At : {{$safe->created_at}} <br>
                                        Expire At : {{$safe->expire_at}} <br>
                                        @if($safe->closed=='yes')
                                        Closed At : {{$safe->updated_at}} <br>
                                        @endif
                                        @if($safe->account_number!='')
                                        Account Number : {{$safe->account_number}} <br>
                                        @endif

                                    </div>
                                </div>

                            </div>


                        </div>

                        @endforeach



                    </dd>

                </div>

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Insurance
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                        @foreach ($user->insurances as $insurance)

                        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box border-b border-gray-200">
                            <div class="flex items-center  dark:border-dark-5 px-5 py-4">

                                <div class="ml-3 mr-auto">
                                    <a href="" class="font-medium">Insurance Type: {{ucwords($insurance->type)}}</a>
                                    <div class="flex text-gray-600 truncate text-xs mt-1"> <a class="text-theme-1 dark:text-theme-10 inline-block truncate" href="">Status: {{ucwords($insurance->status)}}</a> <span class="mx-1">•</span> Created At: {{$insurance->created_at}} </div>
                                    <div class="text-gray-700 dark:text-gray-600 mt-2 ">
                                        <a href="" class="block font-medium mt-5">Details: </a>
                                        @php $info = $insurance->info(); @endphp
                                        @if ($insurance->type == 'life')
                                        Next of Kin : {{$info->next_of_kin}} <br>
                                        Address Next of Kin : {{$info->address_next_of_kin}} <br>
                                        Bank Information : {{$info->bank_information }} <br>
                                        Asset Worth : {{$info->asset_worth}} <br>
                                        @endif

                                        @if ($insurance->type == 'medical')

                                        Name of Doctor : {{$info->name_of_doctor}} <br>
                                        Name of Patient : {{$info->name_of_patient}} <br>
                                        Sickness Diagnosis : {{$info->sickness_diagnosis }} <br>
                                        Treatment : {{$info->treatment}}
                                        @endif

                                        @if ($insurance->type == 'property')

                                        Property List : {{$info->property_list}}
                                        Zip Code : {{$info->zip_code}}
                                        Company Verifier : {{$info->company_verifier}}
                                        Property Address : {{$info->property_address}}
                                        @endif

                                        @if ($insurance->type == 'car')

                                        Licence Number : {{$info->licence_no}} <br>
                                        Licence Held : {{$info->licence_held}} <br>
                                        Car Type : {{$info->car_type }} <br>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            @if($insurance->status=='Pending Approval')
                            <div class="px-5 pt-3 pb-5 dark:border-dark-5">
                                <div class="flex text-gray-600 truncate text-xs mt-1">
                                    <button wire:click="approve({{$insurance->id}})" class="mr-5 text-center text-white p-3 transition duration-300 ease-in-out bg-green-600 hover:bg-green-500 dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> Approve</button>
                                    <button wire:click="disapprove({{$insurance->id}})" class=" text-center text-white p-3 transition duration-300 ease-in-out bg-red-600 hover:bg-red-500 dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> Disprove</button>
                                </div>

                            </div>
                            @endif
                        </div>

                        @endforeach



                    </dd>

                </div>


            </dl>
        </div>
    </div>

</div>
