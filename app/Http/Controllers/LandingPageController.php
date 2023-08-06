<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('landing.index', compact('data'));
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function about()
    {
        return view('landing.about');
    }

    public function buy($id)
    {
        $data = Product::findOrFail($id);
        return view('landing.buy')->with([
            'data' => $data
        ]);
    }

    public function payment(Request $request, $id)
    {
        $data = Product::findOrFail($id);
        $order_pcs = $request->order_pcs;
        $merk_hp = $request->merk_hp;
        $tipe_hp = $request->tipe_hp;
        $total_bayar = $data->price * $order_pcs;

        return view('landing.payment')->with([
            'data' => $data,
            'order_pcs' => $order_pcs,
            'total_bayar' => $total_bayar,
            'merk_hp' => $merk_hp,
            'tipe_hp' => $tipe_hp,
        ]);
    }

    public function order(Request $request)
    {
        if($request->type_of_payment == "Transfer" && $request->proof_of_payment == null)
        {
            return redirect()->back()->with('toast_error', 'Upload Bukti Transfer!');
        }

        $validatedData = $request->validate([
            'users_id' => 'required',
            'product_id' => 'required',
            'order_pcs' => 'required',
            'merk_hp' => 'required',
            'tipe_hp' => 'required',
            'price_total' => 'required',
            'order_time' => 'required',
            'type_of_payment' => 'required',
            'proof_of_payment' => 'image|file|max:2048',
            'status' => 'required',
            'notes' => 'required',
        ]);

        $validatedData['users_id'] = $request->users_id;
        $validatedData['product_id'] = $request->product_id;

        if($request->file('proof_of_payment')) {
            $validatedData['proof_of_payment'] = $request->file('proof_of_payment')->store('buktitf');
        }

        Payment::create($validatedData);
        return redirect('pesanan')->with('toast_success', 'Product Order Successfully!');
    }
}
