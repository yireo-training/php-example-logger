<?php

use Academy\Html\Page;

require 'vendor/autoload.php';

include 'utilities/logger.php';
include 'check/mysql_check.php';
include 'check/es_check.php';

// @todo: Create an appllication that is making use of MySQL and ElasticSearch with everything that we can imagine
$page = new Page();
echo $page->html('Hello World', 'First page');
