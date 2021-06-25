<div>
   <main class="px-6">
         <a href="{{url('profile')}}" class="text-center border-2 border-purple-700 ml-6 py-2 hover:bg-purple-700 hover:text-white rounded-full text-black text-lg mt-1 block w-24">Back</a>
         <form wire:submit.prevent="save" method="post">
            <input type="file" wire:model.lazy="image" class="w-28 h-12 mx-auto block my-6">
            @error('image')<span class="text-red-500">{{$message}}</span>@enderror
         <div class="grid md:grid-cols-2 gap-x-8 mt-6 md:flex md:justify-around">
         <div>
             <label for="fName" class="font-medium text-lg">Full name</label>
             <input type="text" wire:model.lazy="name" id=""  required placeholder="Change Full name" class="w-72 sm:80 w-full block h-14 px-2 text-md border-2 border-purple-700  text-black rounded-md">
             @error('name')<span class="text-red-500">{{$message}}</span>@enderror
         </div>
         <div>
            <label for="email" class="font-medium text-lg">E-mail</label>
            <input type="email" wire:model.lazy="email" id=""  required placeholder="Change E-mail" class="w-72 sm:80 w-full block h-14 px-2 text-md border-2 border-purple-700  text-black rounded-md">
            @if($email==auth()->user()->email)
            @error('email')<span class="text-red-500">{{$message}}</span>@enderror
            @endif
        </div>
        <div class="mt-4 md:mt-0">
            <label for="date" class="font-medium text-lg">Date of birth</label>
            <input type="text" wire:model.lazy="date_of_birth" required  id="date"  class="w-72 sm:80 w-full block h-14 px-2 text-md border-2 border-purple-700  text-black rounded-md">
            @error('date_of_birth')<span class="text-red-500">{{$message}}</span>@enderror
        </div>
        <div class="mt-4 md:mt-0">
           <label for="fName" class="font-medium text-lg">State of origin</label>
           <input type="text" wire:model.lazy="state_of_origin" id="" required  placeholder="Change State of Origin" class="w-72 sm:80 w-full block h-14 px-2 text-md border-2 border-purple-700  text-black rounded-md">
           @error('state_of_origin')<span class="text-red-500">{{$message}}</span>@enderror
       </div>
    </div>
    <button class="w-28 mt-4 h-12 rounded-full border-2 border-purple-700 mb-12 block mx-auto hover:bg-purple-700 hover:text-white">Submit</button>
</form>
     </main>
</div>
