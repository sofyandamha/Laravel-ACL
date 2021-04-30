<?php
    
namespace App\Http\Controllers;
    
use App\Models\Anggota;
use Illuminate\Http\Request;
    
class AnggotaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:anggota-list|anggota-create|anggota-edit|anggota-delete', ['only' => ['index','show']]);
         $this->middleware('permission:anggota-create', ['only' => ['create','store']]);
         $this->middleware('permission:anggota-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:anggota-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = Anggota::latest()->paginate(5);
        return view('anggotas.index',compact('anggotas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggotas.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'komdas_id' => 'required',
			'nama' => 'required',
			'jabatan' => 'required',
			'alamat' => 'required',
			
        ]);
    
        Anggota::create($request->all());
    
        return redirect()->route('anggotas.index')
                        ->with('success','anggota created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        return view('anggotas.show',compact('anggota'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        return view('anggotas.edit',compact('anggota'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
         request()->validate([
             'komdas_id' => 'required',
			'nama' => 'required',
			'jabatan' => 'required',
			'alamat' => 'required',
        ]);
    
        $anggota->update($request->all());
    
        return redirect()->route('anggotas.index')
                        ->with('success','anggota updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
    
        return redirect()->route('anggotas.index')
                        ->with('success','anggota deleted successfully');
    }
}