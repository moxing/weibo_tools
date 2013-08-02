<?php
require 'common.php';

$status = Status::find('first');
echo $status->created_at;