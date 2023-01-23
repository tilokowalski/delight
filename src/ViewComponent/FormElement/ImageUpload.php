<?php

namespace Delight\ViewComponent\FormElement;
class ImageUpload extends \Delight\ViewComponent\FormElement {

    public function get_value() {
        return $_FILES[$this->get_name()]['tmp_name'];
    }

}