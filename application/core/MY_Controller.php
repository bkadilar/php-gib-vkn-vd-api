<?php
class My_Controller extends CI_Controller
{

    public $user = false;
    public $client = false;
    public $core_settings = false;
    // Theme functionality
    protected $theme_view = 'site';
    protected $content_view = '';
    protected $view_data = array();

    public function __construct()
    {   
        parent::__construct();
    }

    public function _output($output)
    {
        // set the default content view
        if ($this->content_view !== false && empty($this->content_view)) {
            $this->content_view = $this->router->class . '/' . $this->router->method;
        }

        //render the content view
        $yield = file_exists(APPPATH . 'views/b5yazilim/' . $this->content_view . EXT) ? $this->load->view('b5yazilim/' . $this->content_view, $this->view_data, true) : false;

        //render the theme
        if ($this->theme_view) {
            echo $this->load->view('b5yazilim/theme/' . $this->theme_view, array('yield' => $yield), true);
        } else {
            echo $yield;
        }

        echo $output;
    }

}