@include('header')
<div id="main">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/home') }}" class="">Home</a>
                @else
                    <a href="{{ route('login') }}" class="">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <h1> TODO LIST - Edit</h1>
        <form method="post" action="/listItem/edit" accept-charset="UTF-8">
            @csrf
            <label for="listItem">List Item</label>
            <input type="hidden" name="id" value="{{ $listItem->id }}" />
            <input type="text" id="listItem" name="listItem" value="{{ $listItem->name }}"/>
            <button type="submit">Submit</button>
        </form>
        </div>
    </div>
</div>
@include('footer')
