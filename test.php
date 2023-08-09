<?php

require_once "MDEditor.php";

$mde = new MDEditor;

$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );

var_dump( $html );

// file_put_contents("./samples/2-which-search-engine-En.html", $html);

?> 
