<?php

if (! function_exists('getRouteParamId')) {
    /**
     * Retrieve a route parameter by key and return its id if it's an object with an 'id' property,
     * or the parameter itself otherwise.
     */
    function getRouteParamId(string $key): mixed
    {
        $param = request()->route($key);

        return is_object($param) && property_exists($param, 'id') ? $param->id : $param;
    }
}
