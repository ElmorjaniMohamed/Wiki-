<?php

namespace App\Controllers;

class WikiController extends Controller {
    public function index() {
        // Add any additional logic if needed
        $this->view('wiki');
    }
}
