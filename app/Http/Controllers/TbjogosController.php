<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tbjogos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TbjogosController extends Controller
{
    //mostrar registros
    public function index()
    {
        //buscando os sabores
        $registros = tbjogos::all();
 
        $contador = $registros->count();
 
        if($contador > 0){
            return Response()->json([
                'sucesso'=> true,
                'mensagem'=> 'Jogo localizado',
                'data'=> $registros,
                'total' => $contador,
            ],200);
        }else{
            return Response()->json([
                'sucesso'=> false,
                'mensagens' => 'Erro ao achar o jogo'
            ],404);
        }
    }

    public function store(Request $request)
    {
        //validando dos recebidos
        $validator = Validator::make($request->all(), [
            'Titulo' => 'required',
            'descricao' => 'required',
            'ano' => 'required',
            'genero' => 'required',
            'plataformas' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Registro invalido',
                'erros' => $validator->errors()
            ], 400); // retorna php (bad request) se houver erro de validação
        }
 
        //Dados do jogo no banco de dados
        $registros = tbjogos::create($request->all());
        if ($registros) {
            return response()->json([
                'sucesso' => true,
                'mensagem' => 'Registro criado com sucesso',
                'data' => $registros
            ], 201);
        } else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Erro ao criar o registro'
            ], 500); //retorna HTTP 500
        }
    }

    public function show($id)
    {
        //buscando as informações do jogo
            $registros = tbjogos::find($id);
 
            //verificando se o jogo existe
            if ($registros) {
                return response()->json([
                    'sucesso' => true,
                    'mensagem' => 'Informações do jogo localizadas com sucesso',
                    'data' => $registros
                ], 200); //retorna HTTP 200 com os dados do sabor
            } else {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => 'Informações do jogo nao localizadas'
                ], 404); //retorna HTTP 404 se o sabor nao for encontrado
            }
    }
    public function update(Request $request,string $id)
    {
            //validando os dados recebidos
            $validator = Validator::make($request->all(), [
                'Titulo' => 'required',
                'descricao' => 'required',
                'ano' => 'required',
                'genero' => 'required',
                'plataformas' => 'required',
            ]);
 
            if ($validator->fails()) {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => 'Registro invalido',
                    'erros' => $validator->errors()
                ], 400); //retorna HTTP 400 se houver erro de validação
            }
 
            //criptomoeda no banco
            $registroBanco = tbjogos::find($id);
 
            if ($registroBanco) {
                return response()->json([
                    'sucesso' => true,
                    'mensagem' => 'Informações do jogo, nao encontradas',
                ], 404);
            };

            //atualizando os dados
            $registroBanco->Titulo = $request->Titulo;
            $registroBanco->descricao = $request->descricao;
            $registroBanco->ano = $request->ano;
            $registroBanco->genero = $request->genero;
            $registroBanco->plataformas = $request->plataformas;
 
         //salvando as alteracoes
         if ($registroBanco->save()) {
            return response()->json([
                'sucesso' => true,
                'mensagem' => 'Informações do jogo atualizadas com sucesso',
                'data' => $registroBanco
            ], 200); //retorna HTTP 200 com os dados atualizados
        } else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Erro ao atualizar as informações do jogo'
            ], 500); //retorna HTTP 500 se houver erro ao salvar
        }
    }
    public function destroy($id)
    {
       //buscando as informações do jogo
    $registroBanco = tbjogos::find($id);
 
    if (!$registroBanco) {
        return response()->json([
            'sucesso' => false,
            'mensagem' => 'Informações sobre o jogo nao encontradas'
        ], 404);
    }
    //deletando o sabor
    if ($registroBanco->delete()) {
        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Informações do jogo deletadas com sucesso'
        ], 200); //retorna HTTP 200 se as informações forem deletadas
    }
 
    return response()->json([
        'sucesso' => false,
        'mensagem' => 'Erro ao deletar as informações'
    ], 500); //retorna HTTP 500 se houver erro ao deletar
    }
}
