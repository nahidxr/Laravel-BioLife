<?php

namespace App\Interfaces;

interface IBaseRepository
{
    public function myGet();
    public function myFind($id);
    public function myDelete($id);
}
