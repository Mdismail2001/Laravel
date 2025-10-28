<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $title;
    public $links;
    public $username;

    public function __construct($title = 'TaskManager', $links = [], $username = 'Guest')
    {
        $this->title = $title;
        $this->links = $links;
        $this->username = $username;
    }

    public function render()
    {
        return view('components.navbar');
    }
}
