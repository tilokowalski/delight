<?php

namespace Delight\ViewComponent\FormElement;

use Delight\ViewComponent\FormElement\TextArea;

class TinyMCE extends TextArea {

    private array $plugins = array(
        'fullscreen',
        'lists',
        'wordcount',
        'autosave',
        'textcolor',
    );

    private array $toolbars = array(
        array(
            'undo',
            'redo',
            '|',
            'preview',
            '|',
            'fullscreen',
            'removeformat',
            'restoredraft'
        ),
        array(
            'styles',
            '|',
            'bold', 
            'italic', 
            'underline', 
            '|', 
            'fontsize', 
            'forecolor', 
            '|', 
            'alignleft', 
            'aligncenter', 
            'alignright', 
            'alignjustify', 
            '|', 
            'numlist', 
            'bullist', 
            '|', 
            'outdent', 
            'indent', 
        )
    );
    
    public function set_plugins(array $plugins): void {
        $this->plugins = $plugins;
    }

    public function get_plugins(): array {
        return $this->plugins;
    }

    public function add_plugin(string $plugin): void {
        $this->plugins []= $plugin;
    }

    public function add_plugins(array $plugins): void {
        $this->plugins = array_merge($this->plugins, $plugins);
    }

    public function get_plugin_list(): string {
        return implode(" ", $this->plugins);
    }

    public function set_toolbars(array $toolbars): void {
        $this->toolbars = $toolbars;
    }

    public function get_toolbars(): array {
        return $this->toolbars;
    }

    public function add_toolbar(array $toolbar): void {
        $this->toolbars []= $toolbar;
    }

    public function add_toolbars(array $toolbars): void {
        $this->toolbars = array_merge($this->toolbars, $toolbars);
    }

    public function set_toolbar(int $index, array $toolbar): void {
        $this->toolbars[$index] = $toolbar;
    }

    public function get_toolbar(int $index): array {
        return $this->toolbars[$index];
    }

    public function add_tool(int $toolbar_index, string $tool) {
        $this->toolbars[$toolbar_index] []= $tool;
    }

    public function remove_tool(int $toolbar_index, string $tool) {
        unset($this->toolbars[$toolbar_index][array_search($tool, $this->toolbars[$toolbar_index])]);
    }

    public function get_toolbar_list(): string {
        $result = "";
        foreach ($this->toolbars as $toolbar) {
            $result .= "'";
            $result .= implode(" ", $toolbar);
            $result .= "', ";
        }
        return substr($result, 0, -2);
    }
     
}