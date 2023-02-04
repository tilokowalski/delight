<?php

namespace Delight\ViewComponent\FormElement;

use Delight\ViewComponent\FormElement\TextArea;

class TinyMCE extends TextArea {

    const DEFAULT_PLUGINS = 'fullscreen table charmap lists wordcount';
    const DEFAULT_TOOLBAR = 'undo redo | formatselect | bold italic underline | fontsize | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | fullscreen removeformat';

    private string $plugins;
    private string $toolbar;

    public function set_plugins(string $plugins): void {
        $this->plugins = $plugins;
    }

    public function set_toolbar(string $toolbar): void {
        $this->toolbar = $toolbar;
    }

    public function get_plugins(): string {
        if ($this->plugins == null) return self::DEFAULT_PLUGINS;
        return $this->plugins;
    }

    public function get_toolbar(): string {
        if ($this->toolbar == null) return self::DEFAULT_TOOLBAR;
        return $this->toolbar;
    }


}