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
        return view('listItem.list', [
            'pending'=> $pending,
            'completed'=> $completed
        ]);
    }
    public function editFormItem($id) : View {
        $listItem = listItem::find($id);
        return view('listItem.edit', [
            'listItem' => $listItem
        ]);
    }


    //Save listItem on submit
    public function editItem(Request $request) {
        //var_dump($request);
        //exit;
        $listItem = listItem::find($request->id);
        $listItem->name = $request->listItem;
        $listItem->update();
        return redirect('/');
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
