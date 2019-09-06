<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Auth;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $agenda = Agenda::orderBy('nama_agenda','ASC')
        ->where('user_id', '=', $user_id)
        ->get();
        
        

        return view('pages.home', compact('agenda'));

    }
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Agenda::create([
            'nama_agenda' => $request->nama_agenda,
            'tanggal_mulai' => $request->tanggal_mulai,
            'durasi' => $request->durasi,
            'lokasi' => $request->lokasi,
            'status' => '0',
            'user_id' => $user_id


            ]);
        return back()->with('success', 'Data berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->update([
            'nama_agenda' => $request->nama_agenda,
            'durasi' => $request->durasi,
            'lokasi' => $request->lokasi,
            'status' => $request->status
            
            ]);
        return redirect('/home')->with('success', 'Data berhasil diubah');
    }



    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();
        return redirect('/home')->with('success', 'Data berhasil dihapus');
    }

    public function status($id)
    {
        $agenda = Agenda::find($id);
        $agenda->update([
            'status' => '1'
            ]);
        return redirect('/home')->with('success', 'Agenda Sudah Dikerjakan');
    }



}