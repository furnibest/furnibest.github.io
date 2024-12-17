<?php
function checkAdminAccess() {
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        
    }
}
?>
