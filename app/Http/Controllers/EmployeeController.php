<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')){
            $data = Employee::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }
        
        return view('datapegawai', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahpegawai()
    {
        return view('tambahpegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function insertdata(Request $request)
    {
        // dd($request->all());
        $data = Employee::create($request->all());

        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('foto')) {
            // save the foto file in dir
            // $request->foto->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            
            // get the file name and save in db
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();

            // method 2. save in this dir
            // $request->foto->storeAs('public/',$data->foto);

            // method 3.
            $request->foto->storeAs('public/images',$data->foto);
        }

        return redirect()->route('pegawai')
        ->with('success', 'Pegawai baru telah didaftarkan.');

    }

    public function tampilkandata($id)
    {
        // $data = Employee::find($id);
        $data = Employee::findOrFail($id);
        // dd($data);
        return view('tampilkandata',compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')
        ->with('success', 'Data telah dikemaskini.');
    }

    public function delete($id)
    {
        // dd($id);
        // $data = Employee::find($id);
        $data = Employee::findOrFail($id);
        $data->delete();
        return redirect()->route('pegawai')
        ->with('success', 'Data telah dihapus.');
    }
}
