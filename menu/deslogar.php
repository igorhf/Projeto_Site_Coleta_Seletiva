<?php
session_start();
session_unset();
session_destroy();
set_include_path(header('Location:../index.php'));
  ?>