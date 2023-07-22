<?php

/*
 * Copyright (c) 2023 Sura
 *
 *  For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 *
 */

use Sura\Support\Registry;

$user_info = $user_info ?? Registry::get('user_info');
if ($user_info['user_group'] != '1') {
    $config = settings_get();
    $tpl->load_template('offline.tpl');
    $config['offline_msg'] = str_replace('&quot;', '"', stripslashes($config['offline_msg']));
    $tpl->set('{reason}', nl2br($config['offline_msg']));
    $tpl->compile('main');
	echo $tpl->result['main'];
}