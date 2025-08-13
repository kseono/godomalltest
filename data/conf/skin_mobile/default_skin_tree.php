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
 * Design skin basic tree structure (eNamoo Season 4 based)
 * @author Shin Donggyu <artherot@godo.co.kr>
 */

$defaultSkinTree = [];

$defaultSkinTree['js'] = ['_text_' => '스크립트', '_type_' => 'inc',];
$defaultSkinTree['js']['jquery'] = ['_text_' => 'jQuery & Plugin', '_type_' => 'inc',];
$defaultSkinTree['css'] = ['_text_' => '스타일시트', '_type_' => 'inc',];

$defaultSkinTree['outline'] = ['_text_' => '전체 레이아웃', '_type_' => 'outline',];
$defaultSkinTree['outline']['header'] = ['_text_' => '상단 디자인', '_type_' => 'outSection',];
$defaultSkinTree['outline']['footer'] = ['_text_' => '하단 디자인', '_type_' => 'outSection',];
$defaultSkinTree['main'] = ['_text_' => '메인', '_type_' => 'file',];
$defaultSkinTree['intro'] = ['_text_' => '인트로', '_type_' => 'inc',];
$defaultSkinTree['member'] = ['_text_' => '회원', '_type_' => 'file',];
$defaultSkinTree['mypage'] = ['_text_' => '마이 페이지', '_type_' => 'file',];
$defaultSkinTree['goods'] = ['_text_' => '상품', '_type_' => 'file',];
$defaultSkinTree['goods']['list'] = ['_text_' => '상품목록','_type_' => 'inc',];
$defaultSkinTree['order'] = ['_text_' => '주문', '_type_' => 'file',];
$defaultSkinTree['board'] = ['_text_' => '게시판', '_type_' => 'file',];
$defaultSkinTree['service'] = ['_text_' => '고객 서비스', '_type_' => 'file',];
$defaultSkinTree['share'] = ['_text_' => '공용 페이지', '_type_' => 'file',];
$defaultSkinTree['proc'] = ['_text_' => '기타 페이지', '_type_' => 'inc',];
$defaultSkinTree['html'] = ['_text_' => '추가 페이지', '_type_' => 'file',];
$defaultSkinTree['popup'] = ['_text_' => '팝업창 페이지', '_type_' => 'file',];
