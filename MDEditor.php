<?php

require_once "./includes/Parsedown.php";

class MDEditor
{
    private $parser;
    private $document_style;

    public function __construct() {
        $this->parser = new Parsedown();
        $this->documnet_style = "toggle_darkmode_white"; //Default value
    }

    public function md2html(string $md_file_path)
    {
        if (!file_exists( $md_file_path ))
            throw new Exception("File does not exist.", 1);
        $markdown = file_get_contents( $md_file_path );
        return $this->parser->text($markdown); //HTML
    }

    //getter for $document_style
    public function getDocumnetStyle()
    {
        return $this->documnet_style;
    }

    //setter for $document_style
    /*
        Valid inputs:
                       "light" 
                       "dark" 
                       "toggle_darkmode_white" 
                       "toggle_darkmode_dark" 
    */
    public function setDocumnetStyle( string $style )
    {
        if( $style == "light" || $style == "dark" || $style == "toggle_darkmode_white" || $style == "toggle_darkmode_dark"  )
        $this->documnet_style = $style;
        else{
            throw new Exception("Inappropriate documnet style.", 1);
            return false;
        }
        return true;
    }
}

?>