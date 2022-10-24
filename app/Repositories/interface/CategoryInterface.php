<?php
namespace App\Repositories\interface;

interface CategoryInterface{
    public function list();
    public function get($category);
    public function store(array $data);
    public function update($id,array $data);
    public function delete($id);

}
