<?php

class Parser_Controller{
    public function is_function($text) {
        $patterns = [
            'python' => "/^\s*def\s+\w+\s*\([^)]*\)\s*:/",
            'php' => "/^\s*(public|private|protected)?\s*(static)?\s*function\s+\w+\s*\([^)]*\)\s*{/",
            'java' => "/^\s*(public|private|protected)?\s*(static)?\s*\w+\s+\w+\s*\([^)]*\)\s*{/",
            'javascript' => "/^\s*function\s+\w+\s*\([^)]*\)\s*{/"
        ];

        foreach ($patterns as $lang => $pattern) {
            if (preg_match($pattern, trim($text))) {
                return $lang;
            }
        }
        return false;
    }
}
