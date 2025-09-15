<?php

require_once __DIR__."/SessionFinale.controller.php";

$session = new SessionFinale();
session_start();

$session->supprimer();

header("Location: ../../index.html");