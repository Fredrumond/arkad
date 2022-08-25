<?php

namespace App\Http\Controllers;

use App\Components\ArkadCrawlerComponent;
use Illuminate\Http\Request;

class FundsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/actives/funds",
     *     tags={"Ativos"},
     *     summary="Retorna lista de fundos imobiliarios",
     *     description="Utilize este método para listar os fundos imobiliarios cadastrado na base.
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
        return ArkadCrawlerComponent::searchActive("fundos",explode(',',$searchQuerey));
    }

    public function show($code)
    {
        return ArkadCrawlerComponent::searchActive("fundos",[$code]);
    }
}
