<?php

require_once "./includes/Parsedown.php";

class MDEditor
{
    private $parser;
    private $document_style;
    private $document_title;
    private $local_style;
    private $overflow;
    private $asset_mathJax_js;
    private $asset_highlight_min_js;
    private $asset_highlightjs_default_min_css;
    private $local_mathJax_js;
    private $local_highlight_min_js;
    private $local_highlightjs_default_min_css;


    public function __construct( string $documnet_style = "toggle_darkmode_white", string $document_title = "Documnet", bool $local_style = false, string $overflow = "break" ) {
        $this->parser = new Parsedown();
        $this->documnet_style   = $documnet_style;  //Default value
        $this->document_title   = $document_title;  //Default value
        $this->local_style      = $local_style;     //Default value
        $this->overflow      = $overflow;     //Default value
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

    //Getter for $overflow
    public function getOverflow()
    {
        return $this->overflow;
    }

    //Setter for $overflow
    public function setOverflow( bool $overflow )
    {
        $this->overflow = $overflow;
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
        $header .= '*,pre code,table,table tr{padding:0}hr,html{overflow:hidden}*{box-sizing:border-box;outline:0;margin:0}body,html{position:relative;width:100vw;height:100vh}html{color-scheme:light}body{padding:10px 15px;overflow:hidden auto;overflow-wrap:break-word;word-wrap:break-word;font:16px/1.4 Helvetica,Arial,sans-serif;color:#333}body,html,table tr{background-color:#fff}.highlight pre,code,pre,tt{background-color:#f8f8f8;direction:ltr!important}table tr :is(th,td){border:1px solid #ccc;text-align:left;padding:6px 13px;margin:0}strong,table tr th{font-weight:700}h1{font-size:2em;margin:.67em 0;text-align:center}h2{font-size:1.75em}h3{font-size:1.5em}h4{font-size:1.25em}h1,h2,h3,h4,h5,h6{position:relative;box-sizing:content-box;font-weight:700;padding:15px 0;line-height:1.1}h1,h2{border-bottom:1px solid #eee}hr{height:0;margin:15px 0;border:0;border-bottom:1px solid #ddd}a{color:#4183c4}a.absent{color:#c00}ol,ul{padding-left:15px;margin:0 7px}ol{list-style-type:lower-roman}table tr{border-top:1px solid #ccc;margin:0}table tr:nth-child(2n){background-color:#aaa}table tr :is(th,td) :first-child{margin-top:0}table tr :is(th,td) :last-child{margin-bottom:0}img{max-width:100%;pointer-events:none}blockquote{padding:0 15px;border-left:4px solid #ccc}';
        $header .= '';
    }

    //Creates last part of HTML
    public function createFooter()
    {
        # code...
    }
}

?>