
<div>
<nav class="bg-white shadow-md w-full"  x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" x-on:click="open = ! open">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <!-- Menu -->
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
        {{-- <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow"> --}}
        {{-- <h1 class=" hidden lg:block text-2xl font-bold cursor-pointer text-white"><a href="{{url('/')}}">QuickInsure</a> </h1> --}}
          <img class="block lg h-8 w-auto" src="{{asset('public/img/workflow-mark-indigo-500.svg')}}" alt="Workflow">
          <h1 class=" hidden lg:block text-2xl font-bold cursor-pointer text-gray-800 pl-2"><a href="{{url('/')}}">QuickInsure</a> </h1>
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <a href="{{url('about')}}" class="@if(request()->routeIs('about')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">About</a>
            @if(auth()->check())
            <a href="{{url('dashboard')}}" class="@if(request()->routeIs('dashboard')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>
            @if(is_admin())
            <a href="{{url('admin/dashboard')}}" class="@if(request()->routeIs('admin-dashboard')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Admin Dashboard</a>
            @endif
            @else
            <a href="{{url('login')}}" class="@if(request()->routeIs('login')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-sm font-medium" >Sign In</a>

            <a href="{{url('register')}}" class="@if(request()->routeIs('register')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
            @endif
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

        <!-- Profile dropdown -->
        @if(Auth::check())
        <div class="ml-3 relative" x-data="{ profile : false}">
          <div >
            <button x-on:click="profile = ! profile" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true" >
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
            </button>
          </div>

          <div  x-show="profile" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="{{url('profile')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a  role="menuitem" tabindex="-1" id="user-menu-item-2" class="block px-4 py-2 text-sm text-gray-700" href="{{route('logout')}}" onclick="event.preventDefault();
                this.closest('form').submit();">Sign Out
                </a>
            </form>
            
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" x-show="open" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-purple-600 hover:text-white" -->
      <a href="{{url('about')}}" class=" block  @if(request()->routeIs('about')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif  text-white px-3 py-2 rounded-md text-base font-medium">About</a>
       @if(auth()->check())
            <a href="{{url('dashboard')}}" class=" block @if(request()->routeIs('dashboard')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
@if (is_admin())
<a href="{{url('admin/dashboard')}}" class=" block @if(request()->routeIs('admin-dashboard')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif text-white px-3 py-2 rounded-md text-base font-medium" aria-current="page">Admin Dashboard</a>
@endif
            {{-- <a href="{{url('profile')}}" class=" block  @if(request()->routeIs('profile')) bg-gray-900 @else text-gray-300 hover:bg-purple-600 @endif  hover:text-white px-3 py-2 rounded-md text-base font-medium">Profile</a> --}}
            @else
            <a href="{{url('login')}}" class="  block @if(request()->routeIs('login')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif  text-white px-3 py-2 rounded-md text-base font-medium">Sign In</a>

            <a href="{{url('register')}}" class=" block @if(request()->routeIs('register')) bg-purple-600 @else text-gray-700 hover:text-white hover:bg-purple-600 @endif  text-white px-3 py-2 rounded-md text-base font-medium">Sign Up</a>
            @endif
    </div>
  </div>
</nav>
</div>