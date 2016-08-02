<?php

namespace App\Traits;

trait HasSlug {

    public static function generateSlug($title)
    {
        $newSlug = str_slug($title);
        $index = 0;
        // dd(ArticleGroup::where('slug', $slug)->get()->count());
        while (static::whereSlug($newSlug)->exists()) {
            $index++;
            $newSlug .= "-$index";
        }
        return $newSlug;
    }
}
