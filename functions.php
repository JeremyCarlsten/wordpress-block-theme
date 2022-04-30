<?php
function block_theme_files()
{
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Pacifico&display=swap');
    wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css');
    wp_enqueue_style('wbt_main_styles', get_theme_file_uri('/build/style-index.css'));
}

add_action('wp_enqueue_scripts', 'block_theme_files');

function theme_features()
{
    add_theme_support('editor-styles');
    add_editor_style(array('https://fonts.googleapis.com/css2?family=Pacifico&display=swap', 'build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'theme_features');

class PlaceholderBlock
{

    public function __construct($name)
    {
        $this->name = $name;
        add_action('init', [$this, 'onInit']);
    }

    public function ourRenderCallback($attributes, $content)
    {
        ob_start();
        require get_theme_file_path("/src/{$this->name}.php");
        return ob_get_clean();
    }

    public function onInit()
    {
        wp_register_script($this->name, get_stylesheet_directory_uri() . "/src/{$this->name}.js", array('wp-blocks', 'wp-editor'));

        register_block_type("wbt/{$this->name}", array(
            'editor_script' => $this->name,
            'render_callback' => [$this, 'ourRenderCallback'],
        ));
    }
}

new PlaceholderBlock('header');

class JSXBlock
{
    public function __construct($name, $renderCallback = null, $data = null)
    {
        $this->name = $name;
        $this->data = $data;
        $this->renderCallback = $renderCallback;
        add_action('init', [$this, 'onInit']);
    }

    public function ourRenderCallback($attributes, $content)
    {
        ob_start();
        require get_theme_file_path("/src/{$this->name}.php");
        return ob_get_clean();
    }

    public function onInit()
    {
        wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/index.js", array('wp-blocks', 'wp-editor'));

        if ($this->data) {
            wp_localize_script($this->name, $this->name, $this->data);
        }

        $ourArgs = array(
            'editor_script' => $this->name,
        );

        if ($this->renderCallback) {
            $ourArgs['render_callback'] = [$this, 'ourRenderCallback'];
        }

        register_block_type("wbt/{$this->name}", $ourArgs);
    }
}

new JSXBlock('banner', true);
