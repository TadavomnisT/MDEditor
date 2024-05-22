<?php

require_once "MDEditor.php";
$mde = new MDEditor;

$mde->setDocumentStyle("light");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("dark_black");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("dark_gray");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodeblack_white");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodegray_white");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodeblack_dark");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodegray_dark");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentWidth(960);

$mde->setDocumentStyle("light");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("dark_black");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("dark_gray");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodeblack_white");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodegray_white");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodeblack_dark");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

$mde->setDocumentStyle("toggle_darkmodegray_dark");
$html = $mde->md2html( "./tests/4-RAM-vs-HDD-En.md" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html", $html);
$pdf = $mde->html2pdf( "./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".html" );
file_put_contents("./tests/test_" . $mde->getDocumentStyle() . $mde->getDocumentWidth() . ".pdf", $pdf);

?> 
