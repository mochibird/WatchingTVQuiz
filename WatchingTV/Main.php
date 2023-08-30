<?php

require_once('ChannelViewingPeriod.php');

$program = new ChannelViewingPeriod($_SERVER['argv']);
$program->startProgram();
