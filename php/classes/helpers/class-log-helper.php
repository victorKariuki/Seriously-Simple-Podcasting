<?php

namespace SeriouslySimplePodcasting\Helpers;

// Exit if accessed directly.
use SeriouslySimplePodcasting\Traits\Logger;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @deprecated Use the Log trait instead.
 * */
class Log_Helper {

	use Logger;
}
