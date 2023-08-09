<?php

require_once "MDEditor.php";
$mde = new MDEditor;

$mde->setDocumentStyle("light");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("dark_black");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("dark_gray");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodeblack_white");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodegray_white");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodeblack_dark");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodegray_dark");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentWidth(960);

$mde->setDocumentStyle("light");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("dark_black");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("dark_gray");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodeblack_white");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodegray_white");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodeblack_dark");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);

$mde->setDocumentStyle("toggle_darkmodegray_dark");
$html = $mde->md2html( "./samples/2-which-search-engine-En.md" );
file_put_contents("./samples/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);


?> 
