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
else echo file_get_contents("./GUI.html");

?>