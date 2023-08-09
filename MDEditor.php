<?php

require_once "./includes/Parsedown.php";

class MDEditor
{
    private $parser;
    private $document_style;
    private $document_title;
    private $local_style;
    private $asset_mathJax_js;
    private $asset_highlight_min_js;
    private $asset_highlightjs_default_min_css;
    private $local_mathJax_js;
    private $local_highlight_min_js;
    private $local_highlightjs_default_min_css;


    public function __construct( string $documnet_style = "toggle_darkmode_white", string $document_title = "Documnet", bool $local_style = false ) {
        $this->parser = new Parsedown();
        $this->documnet_style   = $documnet_style;  //Default value
        $this->document_title   = $document_title;  //Default value
        $this->local_style      = $local_style;     //Default value
        $this->asset_mathJax_js                     = "https://raw.githubusercontent.com/TadavomnisT/MDEditor/main/assets/js/MathJax.js";
        $this->asset_highlight_min_js               = "https://raw.githubusercontent.com/TadavomnisT/MDEditor/main/assets/js/highlight.min.js";
        $this->asset_highlightjs_default_min_css    = "https://raw.githubusercontent.com/TadavomnisT/MDEditor/main/assets/css/highlightjs.default.min.css";
        $this->local_mathJax_js                     = "./assets/js/MathJax.js";
        $this->local_highlight_min_js               = "./assets/js/highlight.min.js";
        $this->local_highlightjs_default_min_css    = "./assets/css/highlightjs.default.min.css";

    }

    public function md2html(string $md_file_path)
    {
        if (!file_exists( $md_file_path ))
            throw new Exception("File does not exist.", 1);
        $markdown = file_get_contents( $md_file_path );
        return $this->parser->text($markdown); //HTML
    }

    //Getter for $document_style
    public function getDocumnetStyle()
    {
        return $this->documnet_style;
    }

    //Setter for $document_style
    /*
        Valid inputs:
                       "light" 
                       "dark_black" 
                       "dark_gray" 
                       "toggle_darkmodeblack_white" 
                       "toggle_darkmodegray_white" 
                       "toggle_darkmodeblack_dark" 
                       "toggle_darkmodegray_dark" 
    */
    public function setDocumnetStyle( string $style )
    {
        if(
            $style == "light" ||
            $style == "dark_black" ||
            $style == "dark_gray" ||
            $style == "toggle_darkmodeblack_white" ||
            $style == "toggle_darkmodegray_white" ||
            $style == "toggle_darkmodeblack_dark" ||
            $style == "toggle_darkmodegray_dark"
        )
        $this->documnet_style = $style;
        else{
            throw new Exception("Inappropriate documnet style.", 1);
            return false;
        }
        return true;
    }

    //Getter for $document_title
    public function getDocumnetTitle()
    {
        return $this->document_title;
    }

    //Setter for $document_title
    public function setDocumnetTitle( string $title )
    {
        $this->document_title = $title;
        return true;
    }

    //Getter for $local_style
    public function getLocalStyle()
    {
        return $this->local_style;
    }

    //Setter for $local_style
    public function setLocalStyle( bool $localstyle )
    {
        $this->local_style = $localstyle;
        return true;
    }

    //Creates first part of HTML 
    public function createHeader()
    {
        $header = '<!DOCTYPE HTML><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"/><meta charset="utf-8"/><title>';
        $header .= $this->getDocumnetTitle();
        $header .= '</title> <link href="';
        $header .= $this->asset_highlightjs_default_min_css;
        $header .= '"stylesheet"/><style type="text/css">';
    }

    //Creates last part of HTML
    public function createFooter()
    {
        # code...
    }
}

?>