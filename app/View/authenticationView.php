<?php

class authenticationView {
    public function showHome($error = null) {
        require 'templates/login.phtml';
    }

    public function showCalzado($calzados, $marca){
        require 'templates/calzados.phtml';
    }

    public function showError($error){
        require 'templates/showError.phtml';
    }
    
    public function showLogin($error = null){
        require 'templates/login.phtml';
    }

}