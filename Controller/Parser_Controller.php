<?php

class Parser_Controller{
    public function is_function($text) {
        // Define la expresión regular
        $pattern = "/^\s*(def|function|public|private|protected)?\s*(static)?\s*\w+\s*\([^)]*\)\s*(:|{)/";
    
        // Utiliza preg_match para evaluar el texto con la expresión regular
        $res = preg_match($pattern, $text);
        return $res;
    }
}
