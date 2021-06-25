<div>
    <h1 class="mt-2 ml-3">You're logged in as: {{auth()->user()->name}}</h1>
    <form action="">
        <input type="search" wire:model="q" class="px-3 w-96 bg-gray-300 rounded-md block mx-auto mt-5 py-3" placeholder="Search by name" id="">
    </form>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col mt-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                


                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$user->name}}
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$user->email}}</div>

                                </td>
                                


                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                
                                    <a  href="{{url('/admin/users/'.$user->id)}}" class="text-center w-28 bg-green-600 rounded-md text-white font-medium py-3 px-3 " >View Details</a>
                                    {{-- <button href="#" class=" px-3 text-center bg-red-600 hover:bg-red-700 rounded-md text-white font-medium py-3 w-28 ml-4">Delete</button> --}}
                                </td>
                                



                            </tr>
                            





<!-- This example requires Tailwind CSS v2.0+ -->





                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    

</div>
