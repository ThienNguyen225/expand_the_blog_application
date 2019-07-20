<?php


namespace App\Http\Service\blog;


interface BlogService
{
public function getAll();
public function create($object);
public function findById($id);
public function update($request, $id);
public function delete($id);
}