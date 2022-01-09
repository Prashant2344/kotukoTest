<?php

namespace App\Http\Traits;

trait SlugCheckTrait
{
    public function checkSlugValidation($slug)
    {
        $regex = '/ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+/*+.,?;{}|\/`';
        $result = strpbrk($regex, $slug);

        return $result ? false : true;
    }
}
