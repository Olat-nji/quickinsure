<div>
    <main class="px-6">
        <a href="{{url('profile/edit')}}" class="text-center border-2 border-purple-700 ml-6 py-2 hover:bg-purple-700 hover:text-white rounded-full text-black text-lg mt-1 block w-24">Edit</a>
        <div class="w-40 mx-auto h-40 rounded-full shadow-md">
            <img src="{{Auth::user()->profile_photo_url}}" class="w-40 h-40 rounded-full outline-none object-cover">
        </div>
        <div class="grid md:grid-cols-2 mt-6 md:flex md:justify-around">
            <div class="mt-4">
                <label for="fName" class="font-medium block text-center text-lg">Full name</label>
                <p class="text-xl -mt-2 text-center">{{Auth::user()->name}}</p>
            </div>
            <div class="mt-4">
                <label for="fName" class="font-medium block text-center text-lg">E-mail</label>
                <p class="text-xl -mt-2 text-center">{{Auth::user()->email}}</p>
            </div>
            <div class="mt-4">
                <label for="fName" class="font-medium block text-center text-lg">Date of birth</label>
                <p class="text-xl -mt-2 text-center">{{Auth::user()->date_of_birth}}</p>
            </div>
            <div class="mt-4 mb-12">
                <label for="fName" class="font-medium block text-center text-lg">State of origin</label>
                <p class="text-xl -mt-2 text-center">{{Auth::user()->state_of_origin}}</p>
            </div>
        </div>
    </main>
</div>
</div>
