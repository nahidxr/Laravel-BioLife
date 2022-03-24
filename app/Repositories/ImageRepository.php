<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Interfaces\IImageRepository;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;

class ImageRepository extends BaseRepository implements IImageRepository
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}
