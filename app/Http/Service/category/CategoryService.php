<?php


namespace App\Http\Service\category;


interface CategoryService
{
public function getAll();
public function create($request);
public function findById($id);
public function update($request, $id);
public function delete($id);
}