<?php
    
namespace App\Http\Controllers;
    
use App\Models\Komdas;
use Illuminate\Http\Request;
    
class KomdasController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:komda-list|komda-create|komda-edit|komda-delete', ['only' => ['index','show']]);
         $this->middleware('permission:komda-create', ['only' => ['create','store']]);
         $this->middleware('permission:komda-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:komda-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komdas = Komdas::latest()->paginate(5);
        return view('komdas.index',compact('komdas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('komdas.create');
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
            'wilayah' => 'required',
        ]);
    
        Komdas::create($request->all());
    
        return redirect()->route('komdas.index')
                        ->with('success','komda created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\komda  $komda
     * @return \Illuminate\Http\Response
     */
    public function show(Komdas $komda)
    {
        return view('komdas.show',compact('komda'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\komda  $komda
     * @return \Illuminate\Http\Response
     */
    public function edit(Komdas $komda)
    {
        return view('komdas.edit',compact('komda'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\komda  $komda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komdas $komda)
    {
         request()->validate([
             'wilayah' => 'required',
        ]);
    
        $komda->update($request->all());
    
        return redirect()->route('komdas.index')
                        ->with('success','komda updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\komda  $komda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komdas $komda)
    {
        $komda->delete();
    
        return redirect()->route('komdas.index')
                        ->with('success','komda deleted successfully');
    }
}