<?php

use \Illuminate\Database\Query\Builder;
use \Illuminate\Database\Eloquent\Builder as EloquentBuilder;

/**
 * toRawSql()
 */
Builder::macro('toRawSql', function() {
    return array_reduce($this->getBindings(), function($sql, $binding) {
        return preg_replace('/\?/', is_numeric($binding) ? $binding : "'".$binding."'" , $sql, 1);
    }, $this->toSql());
});
EloquentBuilder::macro('toRawSql', function() {
    return ($this->getQuery()->toRawSql());
});

/**
 * dd()
 * Only enable this macro on local and testing environment
 */
if (app()->environment('local', 'testing')) {
    Builder::macro('dd', function($params = null) {
        $arr = array_filter([$params, $this->toRawSql()]);
        call_user_func_array('dd', $arr);
    });
    EloquentBuilder::macro('dd', function($params = null) {
        $arr = array_filter([$params, $this->toRawSql()]);
        call_user_func_array('dd', $arr);
    });
}

/**
 * log()
 */
Builder::macro('log', function() {
    logger($this->toRawSql());

    return $this;
});
EloquentBuilder::macro('log', function() {
    logger($this->toRawSql());

    return $this;
});
