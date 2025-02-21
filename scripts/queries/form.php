<?php
    function get_form_data($fields) {
        $data = [];
        foreach($fields as $field) {
            if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
                echo "Error: Missing field '$field'.";
                return;
            }
            $data[$field] = trim($_POST[$field]);
        }
        return $data;
    }
?>