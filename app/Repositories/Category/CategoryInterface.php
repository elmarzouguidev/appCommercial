<?php

namespace App\Repositories\Category;

interface CategoryInterface
{

    public function getCategories(array $colunms = []);

    public function getCategory(int $id);

    public function getFirst();

    public function addCategory(array $data);
}
