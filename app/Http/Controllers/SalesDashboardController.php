<?php

namespace App\Http\Controllers;

use App\Models\Breads;
use Illuminate\Http\Request;

class SalesDashboardController extends Controller
{
    //

    public function inventory()
    {
        $inventories = Breads::latest()->get();

        return view('application.inventory', compact('inventories'));
    }

    public function update(Request $request, $id)
    {

        \DB::beginTransaction();
        try {
            $bread = Breads::find($id)
                ->update($request->all());

            \DB::commit();

            return redirect()->back();
        }
        catch (\Exception $exception){

            \DB::rollBack();

            dd($exception);
        }
    }

    public function delete($id)
    {
        Breads::find($id)
            ->delete();

        return redirect()->back();
    }
}
