<?php

class Parser_Controller {
    public function is_function($text) {
        $text = trim($text);
        $patterns = [
            'python3' => "/^\s*def\s+\w+\s*\([^)]*\)\s*:/",
            'php' => "/^\s*(public|private|protected)?\s*(static)?\s*function\s+\w+\s*\([^)]*\)\s*{/",
            'csharp' => "/^\s*(public|private|protected)?\s*(static)?\s*(void|int|string|double|bool|char|float)\s+\w+\s*\([^)]*\)\s*{/",
            'java' => "/^\s*(public|private|protected)?\s*(static)?\s*\w+\s+\w+\s*\([^)]*\)\s*{/",
        ];

        foreach ($patterns as $lang => $pattern) {
            if (preg_match($pattern, $text) === 1) {
                return $lang;
            }
        }
        return false;
    }
    function fixIndentation($text, $indentation = '    ') {
        return preg_replace_callback("/\n/", function($matches) use ($indentation) {
            return $matches[0] . $indentation;
        }, $text);
    }
    
}