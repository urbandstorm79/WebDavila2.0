<?php
  session_start();
  session_unset();
  session_destroy();
  header('Location: /WebDavila2.0');
?>