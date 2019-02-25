<?php

\Illuminate\Http\Request::macro('cast', function ($key, $callback) {
    $keys = is_array($key) ? $key : func_get_args();
    $result = [];
    foreach ($keys as $k) {
        $result[$k] = $callback($this->input($k));
    }

    return $key === $keys ? $result : head($result);
});

\Illuminate\Http\Request::macro('bool', function ($key) {
    return $this->cast($key, function ($value) {
        return to_bool($value);
    });
});

\Illuminate\Http\Request::macro('int', function ($key) {
    return $this->cast($key, function ($value) {
        return to_int($value);
    });
});

\Illuminate\Http\Request::macro('float', function ($key) {
    return $this->cast($key, function ($value) {
        return to_float($value);
    });
});
