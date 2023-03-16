<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My TODO LIST</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('/css/app.css')  }}" />
    </head>
    <body class="antialiased">
        @include('menu')
       <div id="main">
            <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">


                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <h1> TODO LIST</h1>
                <div class="items">
                    Pending items are...
                    <form method="post" action="/complete" accept-charset="UTF-8">
                        @csrf
                    <ol>
                        @foreach($pending as $item)
                            <li>{{$item->name}}  | <button type="submit" name="id" value="{{$item->id}}">Mark as complete</button> </li>
                        @endforeach
                    </ol>
                    </form>
                    <hr/>
                    <h3>Completed Items are:</h3>
                    <ol>
                        @foreach($completed as $item)
                            <li>{{$item->name}} completed on {{$item->updated_at}}</li>
                        @endforeach
                    </ol>
                </div><br/>

                <form method="post" action="/saveItem" accept-charset="UTF-8">
                    @csrf
                    <label for="listItem">New Item</label>
                    <input type="text" name="listItem"/>
                    <button type="submit">Submit</button>
                </form>
                </div>
            </div>
       </div>

