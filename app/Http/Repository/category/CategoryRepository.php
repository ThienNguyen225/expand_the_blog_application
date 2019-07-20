<?php


namespace App\Http\Repository\category;


interface CategoryRepository
{
    public function getAll();
    public function create($object);
    public function findById($id);
    public function update($object);
    public function delete($object);
}