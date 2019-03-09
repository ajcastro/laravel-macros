<?php

use Illuminate\Foundation\Testing\TestResponse;

TestResponse::macro('showError', function () {
    if ($this->isServerError()) {
        dd(array_except($this->getOriginalContent(), ['trace']));
    }
});

TestResponse::macro('dd', function () {
    $this->showError();

    dd($this->getContent());
});

TestResponse::macro('ddO', function () {
    $this->showError();

    dd($this->getOriginalContent());
});

TestResponse::macro('ddo', function () {
    dd($this->getOriginalContent());
});

TestResponse::macro('ddr', function () {
    ddr($this->getOriginalContent());
});
