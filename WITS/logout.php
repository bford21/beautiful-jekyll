<?php

  // Starts the session
  session_start();

  // Destroys the session logging the user out.
  session_destroy();

  header("Location: http://www.witsboston.com");
?>
