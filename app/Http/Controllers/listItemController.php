<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

use App\Models\listItem;

/**
 *
 */
class listItemController extends Controller
{
    /**
     * Default homepage - Display all items
     * @return View
     */
    public function index() : View {
        $pending = listItem::where('is_complete','0')->get();
        $completed = listItem::where('is_complete','1')->get();
        return view('listItem.list', [
            'pending'=> $pending,
            'completed'=> $completed
        ]);
    }

    /**
     * Display listItem Edit form
     * @param $id
     * @return View
     */
    public function editFormItem($id) : View {
        $listItem = listItem::find($id);
        return view('listItem.edit', [
            'listItem' => $listItem
        ]);
    }


    /**
     * Save edited listItem on submit
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function editItem(Request $request) {
        //var_dump($request);
        //exit;
        $listItem = listItem::find($request->id);
        $listItem->name = $request->listItem;
        $listItem->update();
        return redirect('/');
    }

    /**
     * Save listItem on submit
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function saveItem(Request $request) {
        $listItem = new listItem();
        $listItem->name = $request->listItem;
        $listItem->is_complete = 0;
        $listItem->save();
        return redirect('/');
    }

    /**
     * Mark listItem completed on submit
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function complete(Request $request) {
        $listItem = listItem::find($request->id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }

    /**
     * Delete listItem
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function deleteItem($id) {
        listItem::find($id)->delete();
        return redirect('/');
    }
}
