<?php

require_once "./includes/parsedown/Parsedown.php";
require_once "./includes/mpdf/vendor/autoload.php";
require_once "./includes/html2text/Html2Text.php";
require_once "./includes/Text_LanguageDetect/Text/LanguageDetect.php";

class MDEditor
{
    private $parser;
    private $document_style;
    private $document_title;
    private $document_width; //In pixels
    private $local_style;
    private $overflow;
    private $asset_mathJax_js;
    private $asset_highlight_min_js;
    private $asset_highlightjs_default_min_css;
    private $local_mathJax_js;
    private $local_highlight_min_js;
    private $local_highlightjs_default_min_css;


    //Constructor
    public function __construct( string $document_style = "toggle_darkmodeblack_white", string $document_title = "Document", $document_width = "default", bool $local_style = false, string $overflow = "break" ) {
        $this->parser = new Parsedown();
        $this->setDocumentStyle($document_style);   //Default value
        $this->setDocumentTitle($document_title);   //Default value
        $this->setDocumentWidth($document_width);   //Default value
        $this->setLocalStyle($local_style);         //Default value
        $this->setOverflow($overflow);              //Default value
        $this->asset_mathJax_js                     = "https://tadavomnist.github.io/assets/js/MathJax.js";
        $this->asset_highlight_min_js               = "https://tadavomnist.github.io/assets/js/highlight.min.js";
        $this->asset_highlightjs_default_min_css    = "https://tadavomnist.github.io/assets/css/highlightjs.default.min.css";
        $this->local_mathJax_js                     = realpath( "./assets/js/MathJax.js" );
        $this->local_highlight_min_js               = realpath( "./assets/js/highlight.min.js");
        $this->local_highlightjs_default_min_css    = realpath( "./assets/css/highlightjs.default.min.css");

    }

    //Converts Markdown file to HTML
    public function md2html(string $md_file_path)
    {
        if (!file_exists( $md_file_path ))
            throw new Exception("File does not exist.", 1);
        $markdown = file_get_contents( $md_file_path );
        $raw_html = $this->parser->text($markdown);
        $html_body = $this->ApplyNl2br( $raw_html );
        return  $this->createHeader() . $html_body . $this->createFooter(); //HTML
    }

    //Converts Markdown data to HTML
    public function mddata2html(string $markdown)
    {
        $raw_html = $this->parser->text($markdown);
        $html_body = $this->ApplyNl2br( $raw_html );
        return  $this->createHeader() . $html_body . $this->createFooter(); //HTML
    }

    // Only performs nl2br() on Paragraphs
    public function ApplyNl2br(string $raw_html)
    {
        $stack = [];

        // Iterate HTML content by tags
        $array = explode( ">" , $raw_html );
        foreach ($array as $key => $value) {
            // Pushes
            if ( strpos( $value, "<pre" ) !== false )
                $stack[] = "pre";
            if ( strpos( $value, "<table" ) !== false )
                $stack[] = "table";
            if ( strpos( $value, "<ul" ) !== false )
                $stack[] = "ul";

            if( empty( $stack ) )
                $array[ $key ] = nl2br( $value );

            if ( strpos( $value, "</pre" ) !== false )
                $stack = $this->popStack( $stack, "pre" );
            if ( strpos( $value, "</table" ) !== false )
                $stack = $this->popStack( $stack, "table" );
            if ( strpos( $value, "</ul" ) !== false )
                $stack = $this->popStack( $stack, "ul" );
        }

        return implode( ">" , $array );
    }
    // Pops a tag from stack
    public function popStack(array $stack, string $tagName)
    {
        $stack = array_reverse($stack);
        foreach ($stack as $key => $value)
            if ( $value == $tagName )
            {
                unset($stack[ $key ]);
                break;
            }
        return array_reverse($stack);
    }


    //Getter for $document_style
    public function getDocumentStyle()
    {
        return $this->document_style;
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
    public function setDocumentStyle( string $style )
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
        $this->document_style = $style;
        else{
            throw new Exception("Inappropriate document style.", 1);
            return false;
        }
        return true;
    }

    //Getter for $document_title
    public function getDocumentTitle()
    {
        return $this->document_title;
    }

    //Setter for $document_title
    public function setDocumentTitle( string $title )
    {
        $this->document_title = $title;
        return true;
    }

    //Getter for $document_width
    public function getDocumentWidth()
    {
        return $this->document_width;
    }

    //Setter for $document_width
    /*
        Valid inputs:
                        "default"
                        Positive int numbers representing pixels
    */
    public function setDocumentWidth( string $document_width )
    {
        if ($document_width == "default")
            $this->document_width = "default";
        else{
            if ( (string)(int)$document_width == $document_width && (int)$document_width > 0  )
                $this->document_width = $document_width;
            else{
                throw new Exception("Inappropriate document width.", 1);
                return false;
            }
        }
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
     /*
        Valid inputs:
                       "scroll" 
                       "break" 
    */
    public function setOverflow( string $overflow )
    {
        if($overflow == "scroll" || $overflow == "break")
        $this->overflow = $overflow;
        else{
            throw new Exception("Inappropriate overflow format.", 1);
            return false;
        }
        return true;
    }

    //Creates first part of HTML 
    public function createHeader()
    {
        $header = '<!DOCTYPE HTML><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"/><meta charset="utf-8"/><title>';
        $header .= $this->getDocumentTitle();
        $header .= '</title> <link href="';
        $header .= ($this->getLocalStyle()) ? $this->local_highlightjs_default_min_css : $this->asset_highlightjs_default_min_css ;
        $header .= '" rel="stylesheet"/><style type="text/css">';
        $header .= '*,pre code,table,table tr{padding:0}hr,html{overflow:hidden}*{box-sizing:border-box;outline:0;margin:0}body,html{position:relative;width:100vw;height:100vh}html{color-scheme:light}body{padding:10px 15px;overflow:hidden auto;overflow-wrap:break-word;word-wrap:break-word;font:16px/1.4 Helvetica,Arial,sans-serif;color:#333}body,html,table tr{background-color:#fff}.highlight pre,code,pre,tt{background-color:#f8f8f8;direction:ltr!important}table tr :is(th,td){border:1px solid #ccc;text-align:left;padding:6px 13px;margin:0}strong,table tr th{font-weight:700}h1{font-size:2em;margin:.67em 0;text-align:center}h2{font-size:1.75em}h3{font-size:1.5em}h4{font-size:1.25em}h1,h2,h3,h4,h5,h6{position:relative;box-sizing:content-box;font-weight:700;padding:15px 0;line-height:1.1}h1,h2{border-bottom:1px solid #eee}hr{height:0;margin:15px 0;border:0;border-bottom:1px solid #ddd}a{color:#4183c4}a.absent{color:#c00}ol,ul{padding-left:15px;margin:0 7px}ol{list-style-type:lower-roman}table tr{border-top:1px solid #ccc;margin:0}table tr:nth-child(2n){background-color:#aaa}table tr :is(th,td) :first-child{margin-top:0}table tr :is(th,td) :last-child{margin-bottom:0}img{max-width:100%;pointer-events:none}blockquote{padding:0 15px;border-left:4px solid #ccc}';
        $header .= ($this->getOverflow() == "break" )?
        'code,tt{margin:0 2px;padding:0 5px;overflow-wrap:break-word;border:1px solid #eaeaea;border-radius:3px}tt{white-space:nowrap}':
        'code,tt{display:block;overflow:auto hidden;margin:0 2px;padding:0 5px;white-space:nowrap;border:1px solid #eaeaea;border-radius:3px}';
        $header .= 'pre code{white-space:pre;border:none}.highlight pre,pre{border:1px solid #ccc;font-size:13px;line-height:19px;overflow:auto;padding:6px 10px;margin:.8em 0 1em;border-radius:3px;max-width:calc(100% - 2px)}';
        $header .= ( $this->getDocumentWidth() == "default" )?
        '#container{width:100%;}':
        '#container{max-width:' . $this->getDocumentWidth() . 'px;margin: 0 auto;}';

        if( $this->getDocumentStyle() == "toggle_darkmodegray_white" || $this->getDocumentStyle() == "toggle_darkmodegray_dark" )
        $header .= '.dark-mode{background-color:#333;color:#fff;}.dark-mode table tr{background-color:#333}.dark-mode table tr:nth-child(2n){background-color:#000}.dark-mode code{background-color:#212121;color:rgb(0,183,255);}.dark-mode pre{background-color:#433f3f !important;}*,*:before,*:after{box-sizing:border-box;}.toggle{cursor:pointer;display:inline-block;}.toggle-switch{display:inline-block;background:#ccc;border-radius:16px;width:58px;height:32px;position:relative;vertical-align:middle;transition:background 0.25s;}.toggle-switch:before,.toggle-switch:after{content:"";}.toggle-switch:before{display:block;background:linear-gradient(to bottom,#fff 0%,#eee 100%);border-radius:50%;box-shadow:0 0 0 1px rgba(0,0,0,0.25);width:24px;height:24px;position:absolute;top:4px;left:4px;transition:left 0.25s;}.toggle:hover .toggle-switch:before{background:linear-gradient(to bottom,#fff 0%,#fff 100%);box-shadow:0 0 0 1px rgba(0,0,0,0.5);}.toggle-checkbox:checked + .toggle-switch{background:#3e96df;}.toggle-checkbox:checked + .toggle-switch:before{left:30px;}.toggle-checkbox{position:absolute;visibility:hidden;}.toggle-label{margin-left:5px;position:relative;top:2px;}';
     
        if( $this->getDocumentStyle() == "toggle_darkmodeblack_white" || $this->getDocumentStyle() == "toggle_darkmodeblack_dark" )
        $header .= '.dark-mode{background-color:#000;color:#fff;}.dark-mode table tr{background-color:#000}.dark-mode table tr:nth-child(2n){background-color:#333}.dark-mode code{background-color:#212121;color:rgb(0,183,255);}.dark-mode pre{background-color:#433f3f !important;}*,*:before,*:after{box-sizing:border-box;}.toggle{cursor:pointer;display:inline-block;}.toggle-switch{display:inline-block;background:#ccc;border-radius:16px;width:58px;height:32px;position:relative;vertical-align:middle;transition:background 0.25s;}.toggle-switch:before,.toggle-switch:after{content:"";}.toggle-switch:before{display:block;background:linear-gradient(to bottom,#fff 0%,#eee 100%);border-radius:50%;box-shadow:0 0 0 1px rgba(0,0,0,0.25);width:24px;height:24px;position:absolute;top:4px;left:4px;transition:left 0.25s;}.toggle:hover .toggle-switch:before{background:linear-gradient(to bottom,#fff 0%,#fff 100%);box-shadow:0 0 0 1px rgba(0,0,0,0.5);}.toggle-checkbox:checked + .toggle-switch{background:#3e96df;}.toggle-checkbox:checked + .toggle-switch:before{left:30px;}.toggle-checkbox{position:absolute;visibility:hidden;}.toggle-label{margin-left:5px;position:relative;top:2px;}';
    
        if( $this->getDocumentStyle() == "dark_gray" )
        $header .= '*,html,body{background-color:#333;color:#fff;}code{background-color:#212121 !important;color:rgb(0,183,255) !important;}pre{background-color:#433f3f !important;}';

        if( $this->getDocumentStyle() == "dark_black" )
        $header .= '*,html,body{background-color:#000;color:#fff;}code{background-color:#212121 !important;color:rgb(0,183,255) !important;}pre{background-color:#433f3f !important;}';

        $header .= '</style></head><body><div id="container">';

        if( $this->getDocumentStyle() == "toggle_darkmodeblack_white" || $this->getDocumentStyle() == "toggle_darkmodegray_white" )
        $header .= '<div id="container"><label class="toggle"><input class="toggle-checkbox" type="checkbox" id="dark-mode-toggle"><div class="toggle-switch"></div><span class="toggle-label">Dark mode</span></label>';
            
        if( $this->getDocumentStyle() == "toggle_darkmodeblack_dark" || $this->getDocumentStyle() == "toggle_darkmodegray_dark" )
        $header .= '<div id="container"><label class="toggle"><input class="toggle-checkbox" type="checkbox" checked="checked" id="dark-mode-toggle"><div class="toggle-switch"></div><span class="toggle-label">Dark mode</span></label>';

        return $header;
    }

    //Creates last part of HTML
    public function createFooter()
    {
        $footer = '</div><script src="';
        $footer .= ($this->getLocalStyle()) ? $this->local_highlight_min_js : $this->asset_highlight_min_js ;
        $footer .= '"></script><script>hljs.initHighlightingOnLoad();</script><script src="';
        $footer .= ($this->getLocalStyle()) ? $this->local_mathJax_js : $this->asset_mathJax_js ;
        $footer .= '" type="text/javascript"></script>';
        $footer .= '<script type="text/javascript">MathJax.Hub.Config({"showProcessingMessages" : false,"messageStyle" : "none","tex2jax": { inlineMath: [ [ "$", "$" ] ] }});</script>';
        $footer .= '<script>document.addEventListener("DOMContentLoaded", ev => document.body.querySelectorAll("#container > *").forEach(elm => elm.setAttribute("dir", "auto")));</script>';
        
        if(
            $this->getDocumentStyle() == "toggle_darkmodeblack_white" ||
            $this->getDocumentStyle() == "toggle_darkmodegray_white" ||
            $this->getDocumentStyle() == "toggle_darkmodeblack_dark" ||
            $this->getDocumentStyle() == "toggle_darkmodegray_dark"
        )
        $footer .= '<script>const toggleButton = document.getElementById("dark-mode-toggle");const container = document.getElementById("container");const body = document.body;if (toggleButton.checked) {enableDarkMode();}toggleButton.addEventListener("click", () => {if (!toggleButton.checked) {disableDarkMode();} else {enableDarkMode();}});function enableDarkMode() {body.classList.add("dark-mode");localStorage.setItem("darkModeEnabled", true);}function disableDarkMode() {body.classList.remove("dark-mode");localStorage.removeItem("darkModeEnabled");}</script>';
        
        $footer .= '</body></html>';

        return $footer;
    }

    public function html2pdf(string $htmlFile, string $exportFileName = NULL, bool $removeToggleBtn = TRUE)
    {
        $html = file_get_contents( $htmlFile );
        
        $cwd = getcwd();
        chdir( dirname(realpath( $htmlFile )) );

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
        $mpdf->autoLangToFont = true;
        $mpdf->autoScriptToLang = true;
        $mpdf->showImageErrors = true;
        $mpdf->SetDisplayMode("fullpage");
        if($removeToggleBtn) $html = $this->removeToggleBtn( $html );

        $html2text = new \Html2Text\Html2Text( $html );@

        $ld = new Text_LanguageDetect();
        $language = $ld->detectSimple( $html2text->getText() );

        if ($language == "farsi" || $language == "arabic") {
            // TODO: Add support of Hebrew
            $mpdf->SetDirectionality('rtl');
        }
        
        @$mpdf->WriteHTML( $html );

        ob_start();
        $mpdf->Output();
        $pdf = ob_get_clean();

        chdir($cwd);

        if( $exportFileName !== NULL )
        {
            file_put_contents( $exportFileName, $pdf );
            return $exportFileName;
        }
        return $pdf;
    }

    public function removeToggleBtn( string $html )
    {
        return str_replace( '<label class="toggle"><input class="toggle-checkbox" type="checkbox" id="dark-mode-toggle"><div class="toggle-switch"></div><span class="toggle-label">Dark mode</span></label>' , '', $html );
    }
}

?>
