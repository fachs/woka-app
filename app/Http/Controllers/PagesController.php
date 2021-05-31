<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Worker;
use App\Models\Order;
use App\Models\Service;


class PagesController extends Controller
{
    public function profil() {
        // $profil = Worker::findOrFail(1);
        $profil = Worker::where('user_id', Auth::user()->id)->firstOrFail();
        $dataOrder = Order::where('customer_id', Auth::user()->id)->get();
        // $dataService = Service::where('id', $dataOrder->service_id)->get();
        // , 'service' => $dataService
        return view('profil.index',['profil' => $profil, 'order' => $dataOrder]);
    }

    public function profilWorker() {
        // $profil = Worker::findOrFail(1);
        // $profil = Worker::where('id', $id)->firstOrFail();
        
        // return view('profil.worker',compact('profil'));
        return view('profil.worker');
    }

    public function pesanan() {
        
        $ord_menunggu = Order::where('worker_id', Auth::user()->id)->where('status','menunggu')->get();
        $ord_proses = Order::where('worker_id', Auth::user()->id)->where('status','diproses')->get();
        $ord_ditolak = Order::where('worker_id', Auth::user()->id)->where('status','ditolak')->get();
        $ord_selesai = Order::where('worker_id', Auth::user()->id)->where('status','selesai')->get();

        return view('pesanan',['ord_menunggu' => $ord_menunggu,'ord_proses' => $ord_proses,'ord_ditolak' => $ord_ditolak,'ord_selesai' => $ord_selesai]);
    }

    public function search(Request $request)
    {
        $cate = Service::pluck('kategori');

        $categories = collect($cate);

        $counted = $categories->countBy();

        $counted->all();

        $keyword = $request->keyword;
        // $service = Service::where(['kategori', 'like', "%" . $keyword . "%"],['nama', 'like', "%" . $keyword . "%"]);

        return view('search.index',['cate' => $counted,'keyword' => $keyword]);
    }

}

