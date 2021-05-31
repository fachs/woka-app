<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Worker;
use App\Models\User;
use App\Models\Service;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataOrder = Order::where('customer_id', Auth::user()->id)->orderBy('created_at', 'desc')->firstOrFail();
        $dataService = Service::where('id', $dataOrder->service_id)->first();

        return view('pesan.ringkasan',['service' => $dataService]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bayar()
    {
        $dataOrder = Order::where('customer_id', Auth::user()->id)->orderBy('created_at', 'desc')->firstOrFail();
        $dataService = Service::where('id', $dataOrder->service_id)->first();

        return view('pesan.bayar',['service' => $dataService]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function done()
    {
        $dataOrder = Order::where('customer_id', Auth::user()->id)->orderBy('created_at', 'desc')->firstOrFail();

        return view('pesan.selesai',['order' => $dataOrder]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workId = Service::where('id',$request->service_id)->first();

        $order = Order::create([
            'order_number' => 'ORD-'.strtoupper(uniqid()),
            'status' => 'menunggu',
            'worker_id' => $workId->workers_id,
            'customer_id' => Auth::user()->id,
            'service_id' => $request->service_id
        ]);
    
        $order->save();

        return redirect('order/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bayarStore(Request $request)
    {
        //
        return redirect('order/done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::find($request->ord_id);

        if ($request->status == 'Terima') {
            $order->status = 'diproses';
        } else if ($request->status == 'Selesai'){
            $order->status = 'selesai';
        } else {
            $order->status = 'ditolak';
        }

        $order->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
