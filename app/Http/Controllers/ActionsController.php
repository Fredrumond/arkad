<?php

namespace App\Http\Controllers;

use App\Components\ArkadCrawlerComponent;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/actives/actions",
     *     tags={"Ativos"},
     *     summary="Retorna lista de ações",
     *     description="Utilize este método para listar as ações cadastrado na base.
                       Leia a documentação sobre paginação e filtros de busca.",
     *
     *      @OA\Parameter(
     *          name="codes",
     *          description="Atributa para listar os ativos para consulta",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(response="200", description="Consulta realizada com sucesso.")
     * )
     */

    public function index(Request $request)
    {
        $searchQuerey = $request->query('codes');
        return ArkadCrawlerComponent::searchActive("acoes",explode(',',$searchQuerey));
    }

    public function show($code)
    {
       return ArkadCrawlerComponent::searchActive("acoes",[$code]);
    }
}
