<?php

namespace App\Domains\Services;

abstract class Service
{

    protected $repository;

    public function __construct()
    {
        //
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function findAll(){
        return $this->repository->findAll();
    }

    public function save(array $data){
        return $this->repository->save($data);
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

    public function findBy($field,$value){
        return $this->repository->findBy($field,$value);
    }

    public function findLikeBy($field,$value){
        return $this->repository->findLikeBy($field,$value);
    }

    public function findMultipliWhere(array $data){
        return $this->repository->findMultipliWhere($data);
    }

    public function paginate($pages)
    {
        return $this->repository->paginate($pages);
    }
}
