#!/usr/env php
<?php
/**
 * Cavalcade
 */

namespace HM\Cavalcade;

use Exception;

include dirname( __DIR__ ) . '/lib/Job.php';
include dirname( __DIR__ ) . '/lib/Runner.php';
include dirname( __DIR__ ) . '/lib/Worker.php';

$wp_path = isset( $argv[1] ) ? $argv[1] : '.';

$runner = new Runner();
try {
	$runner->bootstrap( $wp_path );
	$runner->run();
}
catch ( Exception $e ) {
	fwrite( STDERR, sprintf( 'Error: %s' . PHP_EOL, $e->getMessage() ) );
	fwrite( STDERR, $e->getTraceAsString() . PHP_EOL );
	exit(1);
}