<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Producer;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF;
use PDF;

class ProducersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producer = Producer::all();
        return view('admins.producers.home', compact('producer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.producers.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        if ($request->file('file')) {
            $files = $request->file('file')->store('img/producers', 'public');
        }
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $producer = new Producer();

        $producer->nama = $request->nama;
        $producer->ttl = $request->ttl;
        $producer->kota = $request->kota;
        $producer->image = $files;
        $producer->save();
        return redirect()->route('producers')
            ->with('success', 'Producer created successfully.');
        //Redirect ke halaman books/index.blade.php dengan pesan success

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show(Producer $producer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(Producer $producer)
    {
        return view('admins.producers.edit', compact('producer'));
        // dd($producer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producer $producer)
    {
        // Validate the request...
        if ($request->file('file')) {
            $files = $request->file('file')->store('img/producers', 'public');
        }
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $producer = Producer::findOrFail($producer->id);
        $producer->nama = $request->nama;
        $producer->ttl = $request->ttl;
        $producer->kota = $request->kota;

        $producer->image = $files;
        $producer->update();
        return redirect()->route('producers')
            ->with('success', 'Produser created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producer $producer)
    {
        $producer = Producer::findOrFail($producer->id);
        $producer->delete();
        return redirect()->route('producers')
            ->with('danger', 'Producers deleted successfully.');
    }
    public function print()
    {
        $producer = Producer::all();
        $pdf = PDF::loadView('admins.producers.print', compact('producer'));
        return $pdf->download('laporan_producer.pdf');
        // return $pdf->download('laporan.pdf');
    }
}
