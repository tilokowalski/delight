<?php

class Delight_ViewComponent_FormElement_Select extends Delight_ViewComponent_FormElement {

    private $options;

    private $prefilled_value;

    public function add_option($value, $title) {
        $this->options[$value] = $title;
    }

    public function set_prefilled_value($prefilled_value = null) { 
        $this->prefilled_value = $prefilled_value;
        return $this;
    }

    public function get_prefilled_value() {
        return $this->prefilled_value;
    }

}