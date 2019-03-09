<?php

use \Illuminate\Http\Request;

Request::macro('cast', function ($key, $callback) {
    $keys = is_array($key) ? $key : func_get_args();

    $keys = array_filter($keys, function ($key) {
        return is_scalar($key);
    });

    $result = [];

    foreach ($keys as $k) {
        $result[$k] = $callback($this->input($k));
    }

    return $key === $keys ? $result : head($result);
});

Request::macro('bool', function ($key) {
    return $this->cast($key, function ($value) {
        return to_bool($value);
    });
});

Request::macro('int', function ($key) {
    return $this->cast($key, function ($value) {
        return to_int($value);
    });
});

Request::macro('float', function ($key) {
    return $this->cast($key, function ($value) {
        return to_float($value);
    });
});
