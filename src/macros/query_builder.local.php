<?php

// Only enable this macros on local and testing environment
if (!app()->environment('local', 'testing')) {
    return;
}

\Illuminate\Database\Query\Builder::macro('toRawSql', function() {
    return array_reduce($this->getBindings(), function($sql, $binding) {
        return preg_replace('/\?/', is_numeric($binding) ? $binding : "'".$binding."'" , $sql, 1);
    }, $this->toSql());
});
\Illuminate\Database\Eloquent\Builder::macro('toRawSql', function() {
    return ($this->getQuery()->toRawSql());
});

\Illuminate\Database\Query\Builder::macro('dd', function($params = null) {
    $arr = array_filter([$params, $this->toRawSql()]);
    call_user_func_array('dd', $arr);
});
\Illuminate\Database\Eloquent\Builder::macro('dd', function($params = null) {
    $arr = array_filter([$params, $this->toRawSql()]);
    call_user_func_array('dd', $arr);
});

\Illuminate\Database\Query\Builder::macro('log', function() {
    logger($this->toRawSql());

    return $this;
});
\Illuminate\Database\Eloquent\Builder::macro('log', function() {
    logger($this->toRawSql());

    return $this;
});
