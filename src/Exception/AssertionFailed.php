<?php

class Delight_Exception_AssertionFailed extends Delight_Exception {

    public function __construct(?string $message = null) {
        if (null === $message) $message = 'assertion failed';
        parent::__construct($message);
    }
}
