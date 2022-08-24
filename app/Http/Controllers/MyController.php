<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    protected $itensPagina;

    public function findAll()
    {
        $list = $this->service->findAll();
        if( $list['status'] == 'success' ) return response()->json($list, 200);
        else return response()->json($list, 500);
    }

    public function find($id)
    {
        $list = $this->service->find($id);
        return response()->json($list, 200);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        //$data = (array)json_decode( file_get_contents('php://input') );
        $dados = (array) $data;
        if (isset($dados['id'])) {
            if (empty(trim($dados['id']))) {
                unset($dados['id']);
            }
        }
        $retorno = $this->service->save($dados);
        return response()->json($retorno, 200);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function findBy(Request $request)
    {
        $post = $request->all();
        return $this->service->findBy($post['property'], $post['value']);
    }

    public function findLikeBy(Request $request)
    {
        $post = $request->all();
        return $this->service->findLikeBy($post['property'], $post['value']);
    }

    public function paginate($page = '')
    {
        $pages = (empty($page) ? 0 : $page);
        $pagination = $this->service->paginate($pages);
        return $pagination;
    }
}
