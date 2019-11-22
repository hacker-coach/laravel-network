<?php
function setNoBrowserCache(){
    header('Expires: '.gmdate('D, d M Y H:i:s', time()-999999999) . ' GMT');
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Pragma: public');
    header("Content-Type: text/html; charset=utf-8");
}

function showError($error = true){
    if($error){
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
}

function getTemplate(){
    global $config;
    $html = file_get_contents('template.html');
    $html = str_replace('###thememarker_navbar###',(string)file_get_contents('theme/navbar.html'),$html);
    $html = str_replace('###thememarker_footer###',(string)file_get_contents('theme/footer.html'),$html);

    return $html;
}

function getMailTxt(){
    $txt = file_get_contents('mail.txt');
    $txt = str_replace('###name###',getPost('name','false'),$txt);
    $txt = str_replace('###mail###',getPost('mail','false'),$txt);
    $txt = str_replace('###firma###',getPost('firma','false'),$txt);
    $txt = str_replace('###mitarbeiter###',getPost('mitarbeiter','false'),$txt);
    $txt = str_replace('###problem###',getPost('problem','false'),$txt);
    $txt = str_replace('###art###',getPost('art','false'),$txt);
    $txt = str_replace('###phone###',getPost('phone','false'),$txt);
    return $txt;
}
function getPost($name,$message){
    if(isset($_POST) && $message=='false'){
        return (string)trim(filter_input(INPUT_POST,$name, FILTER_SANITIZE_STRING));
    }else{
        return '';
    }
}

function renderTemplate($message){
    global $config;
    $txt = file_get_contents('form.html');
    $txt = str_replace('###name###',getPost('name',$message),$txt);
    $txt = str_replace('###mail###',getPost('mail',$message),$txt);
    $txt = str_replace('###firma###',getPost('firma',$message),$txt);
    $txt = str_replace('###problem###',getPost('problem',$message),$txt);
    $txt = str_replace('###phone###',getPost('phone',$message),$txt);

    if($message == 'true'){
        $txt = str_replace('###message###','<div class="alert alert-success" role="alert">Nachricht wurde verschickt.</div>',$txt);
    }else if($message == 'false'){
        $txt = str_replace('###message###','<div class="alert alert-danger" role="alert">Nachricht konnte nicht verschickt werden.</div>',$txt);
    }else{
        $txt = str_replace('###message###','',$txt);
    }

    $txt = str_replace('###content###',$txt,getTemplate());
    $txt = str_replace('###domain###',$config['domain'],$txt);
    return $txt;
}
?>
