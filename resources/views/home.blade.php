@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class=" col-md-8" >
                            <h2>All items</h2>
                            <form method="post" action="/complete" accept-charset="UTF-8">
                                @csrf
                                <ol>
                                    @foreach($allItems as $item)
                                        <li>{{$item->name}}  |
                                            @if($item->is_complete ==0)
                                                <button type="submit" name="id" value="{{$item->id}}">Mark as complete</button>
                                            @else
                                                <span class="completed">Completed</span>
                                            @endif
                                            <a href="{{url('listItem/edit/'.$item->id)}}">Edit</a>
                                            <a href="{{url('listItem/delete/'.$item->id)}}">Delete</a>
                                        </li>
                                    @endforeach
                                </ol>
                            </form>
                        </div>
                        <div class=" col-md-4" >
                            <h2>Add a new Item</h2>
                            <form method="post" action="/saveItem" accept-charset="UTF-8">
                                @csrf
                                <label for="listItem">New Item</label>
                                <input id="listItem" type="text" name="listItem"/>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
