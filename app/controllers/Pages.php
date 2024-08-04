<?php

class Pages extends Controller
{
    public function index()
    {
        return $this->view('pages/index');
    }
}
