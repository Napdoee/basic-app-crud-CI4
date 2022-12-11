<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function home()
    {
        $data['title'] = 'Home Page';
        return view('pages/home', $data);
    }
    public function about($name = 'Dayat', $age = '18')
    {
        $data = [
            'title' => 'About Page',
            'name' => $name,
            'age' => $age
        ];
        return view('pages/about', $data);
    }
}