<?php

namespace App\Http\Controllers;

Use App\Equipo;
Use App\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class EquipoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $op = $request->user()->authorizeRoles(['READ', 'ADMIN']);
        if($op){
            if($request->get('search')){
                $equipos = Equipo::where("name", "LIKE", "%{$request->get('search')}%")->get();;
                return view('equipo.index', ['equipos' => $equipos]);
            }
            else
                return view('equipo.index', ['equipos' => Equipo::all()]);
        }
        else
            return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $op = Auth::user()->authorizeRoles(['CREATE', 'ADMIN']);
        if($op)
            return view('equipo.create');
        else
            return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $op = $request->user()->authorizeRoles(['CREATE', 'ADMIN']);
        if($op){            
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'max:255',
            ]);

            $equipo = new Equipo([
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ]);
    
            $equipo->save();

            Log::info($request->ip().'  Usuario '.$request->user()->name.'('.$request->user()->id.') ingreso equipo '.$equipo);
            return redirect('/equipo');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::info('Showing user equipo for user: '.$id);
        $op = Auth::user()->authorizeRoles(['READ', 'ADMIN']);
        if($op)
            return view('equipo.show', ['equipo' => Equipo::findOrFail($id)]);
        else
            return redirect()->back(); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Log::info('Editing user equipo for user: '.$id);
        $op = Auth::user()->authorizeRoles(['UPDATE', 'ADMIN']);
        if($op)
            return view('equipo.edit', ['equipo' => Equipo::findOrFail($id)]);
        else
            return redirect()->back(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $op = $request->user()->authorizeRoles(['UPDATE', 'ADMIN']);
        if($op){
            $request->validate([
                'name' => 'required|max:255',
                'description' => 'max:255',
            ]);
    
            Equipo:: find($id)->update($request->all());
            Log::info($request->ip().'  Usuario '.$request->user()->name.'('.$request->user()->id.') actualizo equipo '.$id);
            return redirect()->route('equipo.index');
        }

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
        $op = Auth::user()->authorizeRoles(['DELETE', 'ADMIN']);
        
        if($op){
            $equipo = Equipo::find($id);
            $equipo->comentarios()->delete();
            $equipo->delete();
            Log::info(' Usuario '.$request->user()->name.'('.$request->user()->id.') elimino equipo '.$id);
            return redirect()->route('equipo.index');
        }
        return redirect()->back();
        
    }
}
