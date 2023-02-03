<?php

namespace Delight\ViewComponent;

use Delight\Assert;
use Delight\ViewComponent\FormElement;
use Delight\ViewComponent\FormElement\Input;

class Form extends \Delight\ViewComponent {

    const METHODS_VALID = array('POST', 'GET');

    private $form_elements = [];

    private $method;
    private $action;

    private $submitable = true;
    private $cancelable = true;

    private $submit_title = 'Senden';
    private $cancel_title = 'Abbrechen';

    public function __construct(string $name, ?string $method = 'post', ?string $action = null) {
        $this->set_method($method);
        $this->action = $action;
        parent::__construct($name);
    }

    public function get_form_elements() {
        return $this->form_elements;
    }

    public function get_method() {
        return $this->method;
    }

    public function get_action() {
        return $this->action;
    }

    public function is_submitable() {
        return $this->submitable;
    }

    public function is_cancelable() {
        return $this->cancelable;
    }


    public function set_method(string $method): self {
        $method = strtoupper($method);
        Assert::in_array($method, self::METHODS_VALID, 'method ' . $method . ' is not an implemented form method');
        $this->method = $method;
        return $this;
    }

    public function set_submitable(?bool $submitable = true): self {
        $this->submitable = $submitable;
        return $this;
    }

    public function set_cancelable(?bool $cancelable = true): self {
        $this->cancelable = $cancelable;
        return $this;
    }

    public function add_element(FormElement $form_element): self {
        $form_element->set_form($this);
        $this->form_elements[] = $form_element;
        return $this;
    }

    public function is_submitted(): bool {
        foreach ($this->form_elements as $form_element) {
            if (!$form_element->is_required()) continue;
            if ($form_element instanceof Input && $form_element->get_type() === 'checkbox') continue;
            if (!$form_element->is_set()) return false;
        }
        return true;
    }

    public function set_submit_title(string $title): self {
        $this->submit_title = $title;
        return $this;
    }

    public function get_submit_title() {
        return $this->submit_title;
    }

    public function set_cancel_title(string $title): self {
        $this->cancel_title = $title;
        return $this;
    }

    public function get_cancel_title() {
        return $this->cancel_title;
    }

    public function get_class_list() {
        $this->add_class("form");
        return parent::get_class_list();
    }
    
    public function set_inline(?bool $inline = true) {
        foreach ($this->get_form_elements() as $element) {
            $element->set_inline($inline);
        }
    }

}