<x-guest-layout page="Login">
    <div class="px-12 mt-2">
        <!-- FORM SECTION-->

        <form class="md:px-20 lg:px-48 mt-4 md:grid md:grid-cols-2 md:gap-x-14 w-80 md:w-full mx-auto" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="text-center ">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            <x-validation-errors class="mb-4" />
            @if (session('status'))
            <div class="mb-4 font-medium text-center text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif</div>
            <h1 class="col-span-2 my-2 text-3xl text-purple-700 text-center font-bold">Forgot Password</h1>
            
            <div class="md:col-span-1">
                <label for="email" class="block font-medium text-md my-2">Email</label>
                <input  placeholder="Enter your email" type="email" name="email" :value="old('email')" required   class="w-72 sm:80 w-full block h-14 px-2 text-md border-2 border-purple-700  text-white rounded-md" placeholder="Enter your email" required minlength="8">
            </div>
            <div class="md:col-span-1">
                <label for="password" class="block font-medium text-md my-2">Password</label>
                <input type="password" name="password" required autocomplete="current-password" class="w-72 sm:80 w-full block h-14 px-2 text-md border-2 border-purple-700  text-white rounded-md" placeholder="Enter your password" required minlength="8">
            </div>
            <a href="#" class="col-span-2 text-right block mt-4 text-purple-600" onclick="pass()">Forgot password?</a>
            <input type="submit" value="Submit" class="text-white w-28 rounded-md block col-span-2 bg-purple-700 mt-6 shadow-md h-12 mx-auto">

        </form>
    </div>
</x-guest-layout>
