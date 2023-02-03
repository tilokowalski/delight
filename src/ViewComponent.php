<?

namespace Delight;

use Delight\Application;
use Delight\Assert;

abstract class ViewComponent {

    protected $name;
    private $classes;

    public function __construct(string $name) {
        $this->name = $name;
        $this->add_class("delight-vc");
    }

    public function get_name() {
        return $this->name;
    }

    private function get_component_name() {
        return explode('/', str_replace('\\', '/', get_called_class()), 2)[1];
    }

    public function get_component_file() {
        $content_file = 'vendor/tilokowalski/delight/assets/html/' . $this->get_component_name() . '.phtml';
        $content_file = Application::prepare_url($content_file);
        if (!file_exists($content_file)) {
            $content_file = 'assets/html/' . $this->get_component_name() . '.phtml';
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