<?php

require __DIR__.'/models/Model.php';

$products = Product::readAll();

require __DIR__.'/views/session/formulairedidentification.php';

