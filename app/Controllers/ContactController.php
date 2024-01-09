<?php

namespace App\Controllers;

class ContactController extends Controller {
    public function index() {
        // Add any additional logic if needed
        $this->view('contact');
    }
}
