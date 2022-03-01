<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\AppRepository;

class CategoryRepository extends AppRepository implements CategoryInterface
{

    private $model;

    private $instance;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * @return Category
     */
    public function __instance(): Category
    {
        if (!$this->instance) {
            $this->instance = $this->model;
        }

        return $this->instance;
    }

    /**
     * @return mixed
     */
    public function getCategories(array $colunms = [])
    {
        if (isset($colunms) && is_array($colunms) && count($colunms)) {
            
            return $this->__instance()->all($colunms);
        }
        return $this->__instance()->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategory(int $id)
    {
        return $this->__instance()->find($id);
    }

    public function getFirst()
    {

        return $this->__instance()->first();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addCategory(array $data)
    {
        return $this->__instance()->create($data);
    }
}
