<?php

namespace Delight\ViewComponent\FormElement;
class ImageUpload extends \Delight\ViewComponent\FormElement {

    private $prefilled_value;

    public function set_prefilled_value(?string $prefilled_value = null) {
        $this->prefilled_value = $prefilled_value;
        return $this;
    }

    public function get_prefilled_value() {
        return $this->prefilled_value;
    }

    public function get_value() {
        return $_FILES[$this->get_name()]['tmp_name'];
    }

}