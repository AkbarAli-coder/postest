<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('welcome',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $this->validate($request,[
            'customer_name' => 'required',
            'product_id' => 'required',
            'sale_qty' => 'required',

        ]);



            $Invoice = Invoice::create([
                'date' => now()->format('Y-m-d'),
                'customer_name' => $request->customer_name,
                'vat' => $request->vat,
                'total_amount' => $request->estimated_amount,
                'discount_amount' => $request->discount_amount,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,

            ]);

            return redirect()->back();

    }



    public function getproduct(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::where('id',$product_id)->first();

        return response()->json($product);
    }


}
