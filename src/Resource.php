<?php
namespace JSefton\Resourceable;

class Resource
{
    public static function load(string $string)
    {
        $stringParts = explode('::', $string);
        $class = $stringParts[0];
        $id = $stringParts[1];

        return $class::find($id);
    }

    public static function create(string $string)
    {
        return new $string();
    }
}
