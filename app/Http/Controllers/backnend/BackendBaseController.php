<?php

namespace App\Http\Controllers\backnend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    protected function __loadDataToView($viewPath)
    {
        view()->composer($viewPath, function ($view) {
            $view->with('route', $this->route);
            $view->with('panel', $this->panel);
            $view->with('view',$this->view);
            $view->with('title',$this->title);
        });
        return $viewPath;
    }
}
