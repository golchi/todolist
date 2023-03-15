<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
//use Illuminate\Support\Facades\Log;

use App\Models\listItem;

class listItemController extends Controller
{
    //Default homepage
    public function index() : View {
        $pending = listItem::where('is_complete','0')->get();
        $completed = listItem::where('is_complete','1')->get();
        return view('welcome', [
            'pending'=> $pending,
            'completed'=> $completed
        ]);
    }


    //Save listItem on submit
    public function saveItem(Request $request) {
        $listItem = new listItem();
        $listItem->name = $request->listItem;
        $listItem->is_complete = 0;
        $listItem->save();
        return redirect('/');
    }

    //Save listItem on submit
    public function complete(Request $request) {
        $listItem = listItem::find($request->id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }
}
