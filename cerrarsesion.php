<?php
session_start();
session_destroy();
header('Location: index.html');
//destruyo la sesion y vuelvo a inicio.
