<?php

namespace WatchingTV;

require_once('ChannelViewingPeriod.php');

use WatchingTV\ChannelViewingPeriod;

$program = new ChannelViewingPeriod($_SERVER['argv']);
$program->startProgram();
