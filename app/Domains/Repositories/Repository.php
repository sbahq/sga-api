<?php

namespace App\Domains\Repositories;

use App\Domains\Validations\Validation;
use App\Exceptions\CustomException;

abstract class Repository
{

    protected $model;
    protected $rules = [];
    protected $customMessages = [];
    protected $validate;

    public function __construct()
    {
        $this->validate = new Validation();
    }

    protected function findCustom($id)
    {
        return $this->model::find($id);
    }

    protected function findAllCustom()
    {
        return $this->model::all();
    }

    protected function findByCustom($field, $value)
    {
        return $this->model::where($field, $value)->get();
    }

    protected function findLikeByCustom($field, $value)
    {
        return $this->model::where($field, 'LIKE', "%{$value}%")->get();
    }

    public function find($id)
    {
        $item = $this->model::find($id);
        $response = [];
        $response = $this->validate->getSuccessMessage();
        $response['items'] = $item->toArray();
        return $response;
    }

    public function findAll()
    {
        $list = $this->model::all();
        $response = [];
        if( count($list) > 0 ){
            $items = [];
            foreach ($list as $l) {
                $item = [];
                $item = $l->toArray();
                array_push($items, $item);
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $items;
        } else {
            $message = ['message' => 'Nenhum registro encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function findBy($field, $value)
    {
        $list = $this->model::where($field, $value)->get();
        $items = [];
        $response = [];
        if (count($list) > 0) {
            foreach ($list as $l) {
                $item = [];
                $item = $l->toArray();
                array_push($items, $item);
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $items;
        } else {
            $message = ['message' => 'Nenhum registro encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }
        return $response;
    }

    public function findLikeBy($field, $value)
    {
        $list = $this->model::where($field, 'LIKE', "%{$value}%")->get();
        $items = [];
        $response = [];
        if (count($list) > 0) {
            foreach ($list as $l) {
                $item = [];
                $item = $l->toArray();
                array_push($items, $item);
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $items;
        } else {
            $message = ['message' => 'Nenhum registro encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }

        return $response;
    }

    public function findMultipliWhere(array $request)
    {
        $list = $this->model::where(function($whereFunction) use ($request){
            foreach($request['select'] as $req){

                if( isset( $req['where'] ) ) {
                    foreach($req['where'] as $where){
                        if( $where['type'] == "" || $where['type'] == 'and'  )
                            $whereFunction->where($where['property'],$where['comparator'],$where['value']);
                        else
                            $whereFunction->orWhere($where['property'],$where['comparator'],$where['value']);
                    }
                }

                if( isset( $req['whereNull'] ) ) {
                    foreach($req['whereNull'] as $where){
                        $whereFunction->whereNull($where['property']);
                    }
                }

                if( isset( $req['whereNotNull'] ) ) {
                    foreach($req['whereNotNull'] as $where){
                        $whereFunction->whereNotNull($where['property']);
                    }
                }

                if( isset( $req['whereIn'] ) ) {
                    foreach($req['whereIn'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereIn($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereIn($where['property'],$where['values'], $where['type']);
                    }
                }

                if( isset( $req['whereNotIn'] ) ) {
                    $type = '';
                    $property = '';
                    $values = [];

                    foreach($req['whereNotIn'] as $key => $where){
                        if( $key == 'type' ) $type = $where;
                        if( $key == 'property' ) $property = $where;
                        if( $key == 'values' ) $values = $where;
                    }
                        if( $type == '' || $type == 'and' )
                        $whereFunction->whereNotIn($property,$values);
                        else if( $type == 'or' )
                            $whereFunction->whereNotIn($property,$values, $type);
                }

                if( isset( $req['between'] ) ) {
                    foreach($req['between'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereBetween($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereNotBetween($where['property'],$where['values'], $where['type']);
                    }
                }

                if( isset( $req['notBetween'] ) ) {
                    foreach($req['notBetween'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereNotBetween($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereNotBetween($where['property'],$where['values'], $where['type']);
                    }
                }
            }
            })->get();
    

        $items = [];
        $response = [];
        if (count($list) > 0) {
            foreach ($list as $l) {
                $item = [];
                $item = $l->toArray();
                array_push($items, $item);
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $items;
        } else {
            $message = ['message' => 'Nenhum registro encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }

        return $response;

    }

    public function findMultipliWhereOrder(array $request)
    {
        $list = $this->model::where(function($whereFunction) use ($request){
            foreach($request['select'] as $req){

                if( isset( $req['where'] ) ) {
                    foreach($req['where'] as $where){
                        if( $where['type'] == "" || $where['type'] == 'and'  )
                            $whereFunction->where($where['property'],$where['comparator'],$where['value']);
                        else
                            $whereFunction->orWhere($where['property'],$where['comparator'],$where['value']);
                    }
                }

                if( isset( $req['raw'] ) ) {
                    foreach($req['raw'] as $where){
                        $whereFunction->where($where['property'],$where['comparator'],$where['value']);
                    }
                }

                if( isset( $req['whereNull'] ) ) {
                    foreach($req['whereNull'] as $where){
                        $whereFunction->whereNull($where['property']);
                    }
                }

                if( isset( $req['whereNotNull'] ) ) {
                    foreach($req['whereNotNull'] as $where){
                        $whereFunction->whereNotNull($where['property']);
                    }
                }

                if( isset( $req['whereIn'] ) ) {
                    foreach($req['whereIn'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereIn($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereIn($where['property'],$where['values'], $where['type']);
                    }
                }

                if( isset( $req['whereNotIn'] ) ) {
                    foreach($req['whereNotIn'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereNotIn($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereNotIn($where['property'],$where['values'], $where['type']);
                    }
                }

                if( isset( $req['between'] ) ) {
                    foreach($req['between'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereBetween($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereNotBetween($where['property'],$where['values'], $where['type']);
                    }
                }

                if( isset( $req['notBetween'] ) ) {
                    foreach($req['notBetween'] as $where){
                        if( $where['type'] == '' || $where['type'] == 'and' )
                            $whereFunction->whereNotBetween($where['property'],$where['values']);
                        else if( $where['type'] == 'or' )
                            $whereFunction->whereNotBetween($where['property'],$where['values'], $where['type']);
                    }
                }
            }
            })
            ->orderBy( $request['order-field'], 'asc')
            ->get();
    

        $items = [];
        $response = [];
        if (count($list) > 0) {
            foreach ($list as $l) {
                $item = [];
                $item = $l->toArray();
                array_push($items, $item);
            }
            $response = $this->validate->getSuccessMessage();
            $response['items'] = $items;
        } else {
            $message = ['message' => 'Não encontrado'];
            $response = $this->validate->getErrorMessage($message);
        }

        return $response;

    }

    public function save(array $data)
    {
        if (isset($data['guid']))
            $data['id'] = $this->findBy('guid', $data['guid'])['items'][0]['id'];
        $this->model->rules($data);
        $validator = $this->model->validation($data);
        if ($validator->fails()) {
            throw new CustomException($validator->errors());
        }
        $response = [];
        $response = $this->validate->getSuccessMessage();


        if (isset($data['guid'])) {
            $response['items'] = $this->update($data, $data['id']);
        } else {
            $data['guid'] = \App\Helpers\AppHelper::instance()->generateGUID();
            $response['items'] = $this->create($data);
        }
        return $response;
    }

    protected function create(array $data)
    {
        return $this->model::create($data);
    }

    protected function update(array $data, $id)
    {
        $model = $this->model->find($id);
        if (!\is_null($model)) {
            if ($this->model->find($id)->update($data)) {
                $model = $this->model->find($id);
            }
        }
        return $model;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function paginate($pages)
    {
        $pagination = $this->model->paginate(($pages * 10));
        $registros = $this->model->offset(($pages * 10))->limit(10)->get();
        return [
            'pagination' => $pagination,
            'registros' => $registros,
        ];
    }
}
