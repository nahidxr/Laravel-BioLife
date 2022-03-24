<?php

namespace App\Interfaces;

interface ICategoryRepository extends IBaseRepository
{
    public function CreateCategory($request);
    public function UpdateCategory($request, $id);
}
