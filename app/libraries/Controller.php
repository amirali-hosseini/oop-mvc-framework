<?php

class Controller
{

    public function model(string $model)
    {

        if (file_exists(APP_ROOT . '/models/' . $model . '.php')) {

            require_once APP_ROOT . '/models/' . $model . '.php';

            return new $model;
        }

        die("Model $model does not exists.");
    }

    public function view(string $view)
    {
        if (file_exists(APP_ROOT . '/views/' . $view . '.php')) {

            require_once APP_ROOT . '/views/' . $view . '.php';

            return;
        }

        die("View $view does not exists.");
    }
}
