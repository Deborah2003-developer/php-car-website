<?php
    session_start();
  
    function errorMsg() {
        if (isset($_SESSION['error_msg'])) {
            $output = "<div class='alert alert-danger m-1'>";
            $output .= htmlentities($_SESSION['error_msg']);
            $output .= "</div>";
    
            $_SESSION['error_msg'] = null;
            return $output;
        }
    }

    function successMsg() {
        if (isset($_SESSION['success_msg'])) {
            $output = "<div class='alert alert-success m-1'>";
            $output .= htmlentities($_SESSION['success_msg']);
            $output .= "</div>";
    
            $_SESSION['success_msg'] = null;
            return $output;
        }
    }

    function checkForLogin(){
        if (!isset($_SESSION['user'])) {
           header("Location: ../index");
        }
    }

    function adminCheck() {
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin' ) {
            header("Location: ../assets/app/logout");
        }
    }