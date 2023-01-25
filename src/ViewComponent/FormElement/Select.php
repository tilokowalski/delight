<?php

namespace Delight\ViewComponent\FormElement;
class Select extends \Delight\ViewComponent\FormElement {

    private $options;

    public function add_option($value, $title) {
        $this->options[$value] = $title;
    }

    public function get_options() {
        return $this->options;
    }

}