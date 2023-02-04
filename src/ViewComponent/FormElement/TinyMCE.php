<?php

namespace Delight\ViewComponent\FormElement;

use Delight\ViewComponent\FormElement\TextArea;

class TinyMCE extends TextArea {

    const DEFAULT_PLUGINS = 'fullscreen table charmap lists wordcount paste autosave textcolor';
    const DEFAULT_TOOLBAR_1 = 'undo redo | preview | fullscreen removeformat restoredraft';
    const DEFAULT_TOOLBAR_2 = 'formatselect | bold italic underline | fontsize forecolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent';

    private ?string $plugins = null;
    private ?string $toolbar_1 = null;
    private ?string $toolbar_2 = null;

    public function set_plugins(string $plugins): void {
        $this->plugins = $plugins;
    }

    public function set_toolbar_1(string $toolbar_1): void {
        $this->toolbar_1 = $toolbar_1;
    }

    public function set_toolbar_2(string $toolbar_2): void {
        $this->toolbar_2 = $toolbar_2;
    }

    public function get_plugins(): string {
        if ($this->plugins == null) return self::DEFAULT_PLUGINS;
        return $this->plugins;
    }

    public function get_toolbar_1(): string {
        if ($this->toolbar_1 == null) return self::DEFAULT_TOOLBAR_1;
        return $this->toolbar_1;
    }

    public function get_toolbar_2(): string {
        if ($this->toolbar_2 == null) return self::DEFAULT_TOOLBAR_2;
        return $this->toolbar_2;
    }
    
}