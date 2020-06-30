<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;


class UsuarioController extends Controller
{

    public function validateUser(Request $request)
    {

        $username = $request->input('txt_username');
        $clave = $request->input('txt_clave');


        $abogadoUser = DB::table("abogado")
            ->where([
                ['x_login', '=', $username],
                ['x_clave', '=', $clave]
            ])
            ->limit(1)->get();


        if ($abogadoUser != null) {
            //dd($abogadoUser[0]->l_activo);
            if ($abogadoUser[0]->l_activo == 1) {

                $session = new Session();

                $session->set('username', $abogadoUser[0]->x_login);
                $session->set('usernameId', $abogadoUser[0]->n_abogado);

                return redirect('expediente/index')->with(["abogadoUser" => $abogadoUser]);
            }
        } else {
            return redirect('/');
        }

    }

}
