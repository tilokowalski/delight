<?php

namespace Delight\Exception;


class AssertionFailed extends \Delight\Exception {

    public function __construct(?string $message = null) {
        if (null === $message) $message = 'assertion failed';
        parent::__construct($message);
    }
    
}
