<?php

namespace Delight;

use Delight\Application;
use Delight\Assert;

abstract class ViewComponent {

    private $name;
    private $classes;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    private function get_component_name() {
        $reflection_class = new \ReflectionClass(get_called_class());
        return strtolower($reflection_class->getShortName());
    }

    public function get_component_file() {
        $content_file = 'vendor/tilokowalski/delight/assets/html/vc' . $this->get_component_name() . '.phtml';
        $content_file = Application::prepare_url($content_file);
        if (!file_exists($content_file)) {
            $content_file = 'assets/html/vc/' . $this->get_component_name() . '.phtml';
            $content_file = Application::prepare_url($content_file);
            Assert::file_exists($content_file, 'missing vc content file: ' . $content_file);
        }
        return $content_file;
    }

    public function render() {
        include $this->get_component_file();
    }

    public function add_class(string $class) {
        $this->classes[] = $class;
    }

    public function get_class_list() {
        return implode(" ", $this->classes);
    }

}