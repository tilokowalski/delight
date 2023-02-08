<?php

namespace Delight\ViewComponent\FormElement;
class ImageUpload extends \Delight\ViewComponent\FormElement {

    public function __construct(string $name, ?string $title = null, ?bool $required = false) {
        parent::__construct($name, $title, $required);
        $this->add_class('vc-imgupload');
    }

    public function get_value() {
        return $_FILES[$this->get_name()]['tmp_name'];
    }

}