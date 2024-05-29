<?php

if( trim(file_get_contents("php://input")) !== "" )
{
    $json = json_decode(trim(file_get_contents("php://input")), true);
    if( isset( $json["MarkDownData"] ) )
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        $_SESSION["MarkDownData"] = $json["MarkDownData"];
    }
}

if (isset($_GET["getIframe"])) {
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    if (isset($_SESSION["MarkDownData"]))
    {
        require_once "MDEditor.php";
        $mde = new MDEditor;
        $mde->setDocumentStyle("light");
        echo $mde->mddata2html($_SESSION["MarkDownData"]);
    }
    else echo file_get_contents("./assets/html/iframe.html");
}
else if (isset($_GET["getPDF"])) {
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    if (isset($_SESSION["MarkDownData"]))
    {
        require_once "MDEditor.php";
        $mde = new MDEditor;
        $mde->setDocumentStyle("light");
        $pdf = $mde->mddata2pdf($_SESSION["MarkDownData"]);
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=\"MDEditor_output.pdf\"");
        header('Content-Length: ' . strlen($pdf));
        echo $pdf;
    }
    else echo "Error: No markdown is set.";
}
else if (isset($_GET["getHTML"])) {
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    if (isset($_SESSION["MarkDownData"]))
    {
        require_once "MDEditor.php";
        $mde = new MDEditor;
        $mde->setDocumentStyle("light");
        header('Content-Type: text/html');
        header('Content-Disposition: attachment; filename="MDEditor_output.html"');
        echo $mde->mddata2html($_SESSION["MarkDownData"]);
    }
    else echo "Error: No markdown is set.";
}
else if (isset($_GET["getMarkdown"])) {
    if(session_status() == PHP_SESSION_NONE)
        session_start();
    if (isset($_SESSION["MarkDownData"]))
    {
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="MDEditor_output.md"');
        echo $_SESSION["MarkDownData"];
    }
    else echo "Error: No markdown is set.";
}
else echo file_get_contents("./GUI.html");

?>