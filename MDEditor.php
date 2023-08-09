<?php

class MDEditor
{
    
    public function __construct(Type $var = null) {
        $this->var = $var;
    }

    public function md2html(string $md_file_path, string $html_file_path)
    {
        if (!file_exists( $md_file_path ))
            throw new Exception("File does not exist.", 1);
            
    }
}

?>