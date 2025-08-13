<?php
/**
 * This is commercial software, only users who have purchased a valid license
 * and accept to the terms of the License Agreement can install and use this
 * program.
 *
 * Do not edit or add to this file if you wish to upgrade Godomall5 to newer
 * versions in the future.
 *
 * @copyright ⓒ 2016, NHN godo: Corp.
 * @link http://www.godo.co.kr
 */

/**
 * @deprecated 해당 파일은 사용하지 않습니다.
 */
$license_key = USERPATH. DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'license_key.php';

if ($license_key = file_get_contents($license_key)) {
    $license_key = explode(PHP_EOL, $license_key);
    $license_key = preg_replace('/\r|\n/', '', $license_key[2]);
} else {
    $license_key = '';
}
$license_key = md5($license_key);

return [
    'enckey' => $license_key, // 32 byte.
];
