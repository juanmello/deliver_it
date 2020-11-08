<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Validator;

class PassportController extends Controller
{

    public function getLogin(Request $request)
    {
        return $this->falhaLogin();
    }

    public function postLogin(Request $request)
    {
        $this->validaRequest($request);

        $usuario = Usuario::where('email',$request->email)->first();

        if( is_null($usuario) ){
            return $this->falhaLogin();
        }

        if (!Hash::check($request->password, $usuario->password)) {
            return $this->falhaLogin();
        }

        return $this->sucessoLogin($usuario);
    }

    private function validaRequest(Request $request)
    {
        $validacao = Validator::make($request->all(),[
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if ($validacao->fails()) {
            return $this->falhaLogin();
        }
    }

    private function falhaLogin()
    {
        $retorno = [
            'status' => 'fail',
            'data' => 'Credenciais invalidas',
        ];

        return response()->json($retorno, 401);
    }

    private function sucessoLogin($usuario)
    {
        $token = $usuario->createToken(env('PASSPORT_TOKENNAME', 'ikkipassport'))->accessToken;

        $retorno = [
            'status' => 'success',
            'data' => [
                'token' => $token,
            ],
        ];

        return response()->json($retorno);
    }
}
