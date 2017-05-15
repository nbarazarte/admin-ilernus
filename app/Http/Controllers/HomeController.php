<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PHPMailer;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function denegado()
    {
        return \View::make('errors.denegado');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getRecuperar()
    {
        return \View::make('recuperar');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRecuperar(Request $request)
    {

        //Mi variable bandera para establecer si pasa o no a determinada vista:
        $flag = false;
 
            $user = User::where('email',$request->email)->first();
            //var_dump($user->id);
            //die();

        if (!empty($user)) {
            $flag = true;
                       
            $clave = $this->generarCodigo(8);
            
            $id = $user->id;
            
            $nombre = $user->str_nombre;
            
            $apellido = $user->str_apellido;
            
            //die($id);
            $user = User::find($id);
            $user->password = $clave;
            $user->save();

            $message = '<table>

        <tr>
            <td>
                <img src="smarty/assets/images/LOGOS-ILERNUS-FINAL-2017-02.png" alt="Logo de iLernus">
    
            </td>       
        </tr>
        <tr>
            
            <td>
                <p>
                    <b>*** POR FAVOR NO RESPONDA ESTE CORREO ***</b>
                </p>
                
                <p>
                    <b>Este correo electronico ha sido enviado por ilernus.com</b>
                    <br><br>
                    Estimada(o) '.ucfirst($nombre).' '.ucfirst($apellido).',
                </p>
                                
            </td>
        </tr>       
        
        <tr>
            <td>
                <p>
                    Usted solicitó recuperar la clave de su cuenta. A continuación su nueva clave de acceso:<br><br>
                
                    <b>Clave: '.$clave.'</b><br>
                    
                    Para cambiar su clave, podra hacerlo en su panel de administración en la opción <b>Mi Cuenta</b> y luego en la opción <b>Clave</b>
                    
                </p>
                <p>
                    Por favor, conserve este mensaje para una futura referencia.<br>
                    Muchas gracias,             
                </p>
                
                <p>
                    El equipo de iLernus<br>
                    www.iLernus.com
                </p>
                
            </td>
        </tr>
        
    </table>';
            
            /*
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $cabeceras .= "Content-Type: image/png";
            $cabeceras .= 'To: <'.$request->email.'>' . "\r\n";   
            $cabeceras .= 'From: Troovami <troovami@gmail.com>' . "\r\n";
        
            if (!mail($request->email, 'Recuperar Clave - Troovami.com', $message, $cabeceras)) {
                //echo "Error: " . $mail->ErrorInfo;
                Session::flash('message','Error!, el mensaje no se pudo enviar');
            } else {
                Session::flash('message','Su clave fue enviada exitosamente a su dirección de correo electrónico');
            }
            */


            
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Username = "atrellus@gmail.com";
            $mail->Password = "falcor90dbb";
            $mail->setFrom('admin@ilernus.com', 'ilernus.com');
            $mail->addAddress($request->email);
            $mail->Subject = 'Recuperar Clave - iLernus.com';
            //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
            //$mail->msgHTML('<img src="autostars/images/trovami-logo-beta.png" alt="Logo">Su nueva clave es:  '.$clave);
                        
            $mail->msgHTML($message);
                        
            $mail->AltBody = 'Recuperar Clave';
            //$mail->addAttachment('images/imagen_adjunta.png');
             
            if (!$mail->send()) {
                //echo "Error: " . $mail->ErrorInfo;
                Session::flash('message','Error!'.$mail->ErrorInfo);
            } else {
                Session::flash('message','Su clave fue enviada exitosamente a su dirección de correo electrónico');
            }
            

            return Redirect::to('/Recuperar-Clave');    
        }   

        if ($flag == false) {
            //echo "no existe";
             Session::flash('message','Error!, la dirección de correo eletrónico no existe en el sistema');
             return Redirect::to('/Recuperar-Clave'); 
        }

    }
    
    
    public function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
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
