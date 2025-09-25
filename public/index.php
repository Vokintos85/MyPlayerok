<?php

use App\Kernel;

// Force sane upload settings early for environments where php.ini/.user.ini is ignored
@ini_set('upload_tmp_dir', dirname(__DIR__) . '/var/tmp');
@ini_set('upload_max_filesize', '50M');
@ini_set('post_max_size', '60M');
@ini_set('max_file_uploads', '50');
@ini_set('memory_limit', '512M');

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
