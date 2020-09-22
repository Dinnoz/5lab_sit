<?php
  require "db_.php";
  unset($_SESSION['logged_user']);
  header("Location: /");?>