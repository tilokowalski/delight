<?php

class Delight_Exception_NotImplemented extends Delight_Exception {

    public function __construct(?string $message = null) {
        if (null === $message) $message = 'not implemented';
        parent::__construct($message);
    }
}
