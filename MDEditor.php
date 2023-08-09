<?php

require_once "./includes/Parsedown.php";

class MDEditor
{
    private $parser;
   
    public function __construct() {
        $this->parser = new Parsedown();
    }

    public function md2html(string $md_file_path)
    {
        if (!file_exists( $md_file_path ))
            throw new Exception("File does not exist.", 1);
        $markdown = file_get_contents( $md_file_path );
        return $this->parser->text($markdown); //HTML
    }
}

?>