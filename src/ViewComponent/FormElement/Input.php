<?php

namespace Delight\ViewComponent\FormElement;

use Delight\Assert;

class Input extends \Delight\ViewComponent\FormElement {

    private $type;
    private $checked = false;
    private $disabled = false;

    private $step = 1;
    private $min = 0;
    private $max = -1;

    public function __construct(string $name, ?string $title = null, ?bool $required = false) {
        parent::__construct($name, $title, $required);
        $this->add_class('vc-input');
    }

    public static function text(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('text');
    }

    public static function email(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('email');
    }

    public static function phone(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('phone');
    }

    public static function password(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('password');
    }

    public static function date(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('date');
    }

    public static function number(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('number');
    }

    public static function checkbox(string $name, ?string $title = null, ?bool $required = false): self {
        $result = new self($name, $title, $required);
        return $result->set_type('checkbox');
    }

    public static function hidden(string $name, string $value): self {
        $result = new self($name, null, true);
        $result->set_prefilled_value($value);
        return $result->set_type('hidden');
    }

    public function set_type(string $type): self {
        $this->type = $type;
        return $this;
    }

    public function get_type() {
        if (null === $this->type) $this->set_type('text');
        return $this->type;
    }

    public function set_disabled(?bool $disabled = true) {
        $this->disabled = $disabled;
        return $this;
    }

    public function is_disabled() {
        return $this->disabled;
    }

    public function set_prefilled_value($prefilled_value = null) { 
        if ($prefilled_value instanceof \DateTime) Assert::equals($this->get_type(), 'date', 'prefilled value date can not be assigned to input of type ' . $this->get_type());
        Assert::not_equals($this->get_type(), 'checkbox', 'input of type checkbox is to be handled with set_checked');
        parent::set_prefilled_value($prefilled_value);
    }

    public function set_checked(?bool $checked = true): self {
        Assert::equals($this->get_type(), 'checkbox', 'input of type ' . $this->get_type() . ' can not be \'checked\'');
        $this->checked = $checked;
        return $this;
    }

    public function get_checked() {
        return $this->checked;
    }

    public function is_checked() {
        Assert::equals($this->get_type(), 'checkbox', 'input of type ' . $this->get_type() . ' can not be \'checked\'');
        return $this->get_value() === 'on';
    }

    public function set_step($step) {
        Assert::equals($this->get_type(), 'number', 'step can only be set for inputs of type number');
        $this->step = $step;
        return $this;
    }

    public function set_min($min) {
        Assert::equals($this->get_type(), 'number', 'min can only be set for inputs of type number');
        $this->min = $min;
        return $this;
    }

    public function set_max($max) {
        Assert::equals($this->get_type(), 'number', 'max can only be set for inputs of type number');
        $this->max = $max;
        return $this;
    }

    public function set_step_min_max($step, $min, $max) {
        $this->set_step($step);
        $this->set_min($min);
        $this->set_max($max);
    }

    public function get_step() {
        return $this->step;
    }

    public function get_min() {
        return $this->min;
    }

    public function get_max() {
        return $this->max;
    }

}