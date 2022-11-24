<?php

class Delight_ViewComponent_FormElement_Select extends Delight_ViewComponent_FormElement {

    private $options;

    public function add_option($key, $value) {
        $this->options[$key] = $value;
    }

}