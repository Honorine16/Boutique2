@if (Route::has('login'))
<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class=""
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class=""
        >
            Se connecter
        </a>

    
    @endauth
</nav>
@endif