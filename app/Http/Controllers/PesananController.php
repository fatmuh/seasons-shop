<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    public function index()
    {
        $data = Payment::all();
        return view('admin.pesanan.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $item = Payment::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect('admin/pesanan')->with('toast_success', 'Status Pesanan Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $item = Payment::findOrFail($id);
        if($item->proof_of_payment){
            Storage::delete($item->proof_of_payment);
        }
        $item->delete();
        return redirect('admin/pesanan')->with('toast_success', 'Payment Deleted Successfully!');
    }

    public function indexUser()
    {
        $users_id = auth()->user()->id;
        $data = Payment::where('users_id', $users_id)->get();
        return view('pesanan.index', compact('data'));
    }
}
