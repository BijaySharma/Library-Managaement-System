<?php

function require_login(){
  global $session;
  if(!$session->is_logged_in()){
    redirect_to(url_for("logout.php"));
  }
}

function require_admin_login(){
  global $session;
  if(!$session->is_logged_in() || $session->get_level() != 1){
    redirect_to(url_for("logout.php"));
  }
}
function require_teacher_login(){
  global $session;

  if(!$session->is_logged_in() || $session->get_level() != 2){
    redirect_to(url_for("logout.php"));
  }
}
function require_student_login(){
  global $session;

  if(!$session->is_logged_in() || $session->get_level() != 3){
    redirect_to(url_for("logout.php"));
  }
}
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"container mt-4\">";
    foreach($errors as $error) {
      $output .= "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">";
      $output.= "<Strong>Bummer! </Strong>" . $error;
      $output.= "<button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>";
      $output .= "</div>";
    }
    $output .= "</div>";
  }
  return $output;
}

function get_and_clear_session_message() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}

function display_session_message() {
  $msg = get_and_clear_session_message();
  if(isset($msg) && $msg != '') {
    $output = '';
    $output .= "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">";
    $output.=  h($msg);
    $output.= "<button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>";
    $output .= "</div>";

    return $output;
  }
}

?>
