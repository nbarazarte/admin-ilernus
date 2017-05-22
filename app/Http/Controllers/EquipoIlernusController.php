<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Personas;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PHPMailer;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class EquipoIlernusController extends Controller
{
   
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function crearCuenta()
    {

        $generos = DB::table('cat_datos_maestros')
        ->where('str_tipo', 'genero')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })
        ->lists('str_descripcion');

        //dd($gerencias);die(); 

        return \View::make('directores.crearCuenta', compact('generos'));
    }

  /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCrearCuenta(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        $this->create($request->all());

        //return redirect($this->redirectPath()); 
        Session::flash('message','¡El director ha sido creado con éxito!');
        return Redirect::to('/Crear-Persona-Ilernus'); 
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                
            'str_nombre' => 'required|max:255',
            'str_sexo' => 'required|max:255',
            'str_tipo' => 'required|max:255',
            'str_cargo' => 'required|max:255',
            'str_cv_corto' => 'required',            
            'str_cv' => 'required',  
            'str_imagen' => 'required|max:255',           

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        $orden = DB::table('tbl_equipoilernus')
                ->where('str_tipo', $data['str_tipo'])
                ->max('str_orden');
            
        //dd($orden);die();

        $str_orden = $orden + 1;

        if(!empty($data['blb_img'])){

            return Personas::create([

                'lng_idadmin' =>  Auth::user()->id,
                'str_nombre' => $data['str_nombre'],
                'str_sexo' => $data['str_sexo'],
                'str_cargo' => $data['str_cargo'],
                'str_cv_corto' => $data['str_cv_corto'],
                'str_cv' => $data['str_cv'],
                'str_tipo' => $data['str_tipo'],
                'blb_img' => $data['blb_img'],
                //'blb_img' => base64_encode(file_get_contents($data['blb_img'])),
                'str_orden' => $str_orden,
                'str_imagen' => $data['str_imagen'],

            ]);

        }else{

            return Personas::create([

                'lng_idadmin' =>  Auth::user()->id,
                'str_nombre' => $data['str_nombre'],
                'str_sexo' => $data['str_sexo'],
                'str_cargo' => $data['str_cargo'],
                'str_cv_corto' => $data['str_cv_corto'],
                'str_cv' => $data['str_cv'],
                'str_tipo' => $data['str_tipo'],
                'str_orden' => $str_orden,
                'str_imagen' => $data['str_imagen'],

            ]);            
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function buscarCuenta()
    {

        $directores = DB::table('tbl_equipoilernus as ei')
                ->join('tbl_admin as admin', 'ei.lng_idadmin', '=', 'admin.id')
                
                ->select('ei.id','ei.str_nombre','ei.str_sexo','ei.str_tipo','ei.str_cargo', 'ei.str_imagen','ei.str_orden','admin.name as usuario')
                ->orderBy('ei.str_orden','asc')
                ->get();

                //dd($directores);die();
        
        return \View::make('directores.buscarCuenta', compact('directores'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function estatusUsuario($id, $estatus)
    {
    
        $estatusUsuario = DB::update('update tbl_admin set str_estatus = "'.$estatus.'", lng_idadmin = '.Auth::user()->id.' where id = '.$id.' and bol_eliminado = 0');
         
        return $estatusUsuario;
    }

    public function verCuenta($id)
    {
    
        $usuarios = DB::table('tbl_admin')->where('id', $id)->get();

        $generos = DB::table('cat_datos_maestros')
        ->where('str_tipo', 'genero')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })
        ->lists('str_descripcion');

        $roles = DB::table('cat_datos_maestros')
        ->where('str_tipo', 'rol')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })
        ->lists('str_descripcion');

        $gerencias = DB::table('cat_datos_maestros')
        ->where('str_tipo', 'gerencia')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })
        ->lists('str_descripcion');

        $estatus = DB::table('cat_datos_maestros')
        ->where('str_tipo', 'estatus')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })
        ->lists('str_descripcion');                

        //dd($generos);die();
        return \View::make('directores.cuenta', compact('usuarios','generos', 'roles','gerencias','estatus'));
    }

    public function editarCuenta(Request $request)
    {
        
        /*$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }*/

        $user = User::find($request->id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message','¡Se han editado los datos personales con éxito!');
        return Redirect::to('/Ver-Persona-Ilernus-'.$request->id); 

    }

    public function editarImagen(Request $request)
    {
        
        $user = User::find($request->id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message','¡Se ha cambiado la imágen de perfil con éxito!');
        return Redirect::to('/Ver-Persona-Ilernus-'.$request->id); 

    }

    public function eliminarImagen(Request $request)
    {
        
        $imagen = DB::update('update tbl_admin set blb_img = null where id = '.$request->id.' and bol_eliminado = 0');    

        Session::flash('message','¡Se ha eliminado la imágen de perfil con éxito!');
        return Redirect::to('/Ver-Persona-Ilernus-'.$request->id); 

    }

    public function eliminarCuenta(Request $request)
    {
        
        $cuenta = DB::update('update tbl_admin set bol_eliminado = 1 where id = '.$request->id.' and bol_eliminado = 0');

        Session::flash('message','¡Se ha eliminado la cuenta con éxito!');
        return Redirect::to('/Ver-Persona-Ilernus-'.$request->id); 

    }











    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
