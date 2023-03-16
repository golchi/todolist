@include('header')
<div id="main">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div>
            @if(session()->has('confirmation_message') )
                {{ session()->get('confirmation_message') }}
            @endif
        </div>
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <h1> TODO LIST</h1>
        <div class="items">
            Pending items are...
            <form method="post" action="/complete" accept-charset="UTF-8">
                @csrf
            <ol>
                @foreach($pending as $item)
                    <li>{{$item->name}}  |
                        <button type="submit" name="id" value="{{$item->id}}">Mark as complete</button>
                        <a href="{{url('listItem/edit/'.$item->id)}}">Edit</a>
                        <a href="{{url('listItem/delete/'.$item->id)}}">Delete</a>
                    </li>
                @endforeach
            </ol>
            </form>
            <hr/>
            <h3>Completed Items are:</h3>
            <ol>
                @foreach($completed as $item)
                    <li>
                        {{$item->name}} completed on {{$item->updated_at}} -
                        <a href="{{url('listItem/delete/'.$item->id)}}">Delete</a>
                    </li>
                @endforeach
            </ol>
        </div><br/>

        <form method="post" action="/saveItem" accept-charset="UTF-8">
            @csrf
            <label for="listItem">New Item</label>
            <input id="listItem" type="text" name="listItem"/>
            <button type="submit">Submit</button>
        </form>
        </div>
    </div>
</div>
@include('footer')
