<?php

declare(strict_types=1);

namespace Meanz3\OpenSource;

class Api {
    public function GetRandomNumber() : int {
        return rand(0, 100);
    }
 }