<?php

namespace Delight\ViewComponent;

use Delight\ViewComponent\Form;
use Delight\Exception\NotImplemented;

class FormElement extends \Delight\ViewComponent {

    private $form;

    private $title;
    private $required;
    private $prefilled_value;

    private $inline = true;

    public function __construct(string $name, ?string $title = null, ?bool $required = false) {
        $this->set_title($title);
        $this->set_required($required);
        parent::__construct($name);
    }
    
    public function get_form() {
        return $this->form;
    }

    public function get_title() {
        return $this->title;
    }

    public function is_required() {
        return $this->required;
    }

    public function get_inline() {
        return $this->inline;
    }

    public function set_form(Form $form): self {
        $this->form = $form;
        return $this;
    }

    public function set_title(?string $title = null): self {
        $this->title = $title;
        return $this;
    }
    
    public function set_required(?bool $required = true): self {
        $this->required = $required;
        return $this;
    }

    public function set_inline(?bool $inline = true) {
        $this->inline = $inline;
        return $this;
    }

    public function is_set() {
        switch ($this->form->get_method()) {
            case 'POST': return isset($_POST[$this->get_name()]);
            case 'GET': return isset($_GET[$this->get_name()]);
            default: throw new NotImplemented('no implementation for form method ' . $this->form->get_method());
        }
    }

    public function get_value() {
        if (!$this->is_set()) return null;
        switch ($this->form->get_method()) {
            case 'POST': return $_POST[$this->get_name()];
            case 'GET': return $_GET[$this->get_name()];
            default: throw new NotImplemented('no implementation for form method ' . $this->form->get_method());
        }
    }

    public function set_prefilled_value(?string $prefilled_value = null) {
        $this->prefilled_value = $prefilled_value;
        return $this;
    }

    public function get_prefilled_value() {
        return $this->prefilled_value;
    }

}