<?php

namespace Delight\Exception;

class NotImplemented extends \Delight\Exception {

    public function __construct(?string $message = null) {
        if (null === $message) $message = 'not implemented';
        parent::__construct($message);
    }
    
}
