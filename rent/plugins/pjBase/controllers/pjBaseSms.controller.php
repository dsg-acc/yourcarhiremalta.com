<?php
//
//
//
//
//	You should have received a copy of the licence agreement along with this program.
//	
//	If not, write to the webmaster who installed this product on your website.
//
//	You MUST NOT modify this file. Doing so can lead to errors and crashes in the software.
//	
//	
//
//
?>
<?php  if (!defined("ROOT_PATH"))  {  header("HTTP/1.1 403 Forbidden");  exit;  }  class pjBaseSms extends pjBase  {  public function __construct()  {  $requireLogin = false;  $_get = pjRegistry::getInstance()->get('_get');  if (in_array($_get->toString('action'), array('pjActionIndex'))) {  $requireLogin = true;  }  parent::__construct($requireLogin);  }  public function hKLSugsgdXe($qwQuUAjCSlbRmqpnZfCeEQ) { eval(self::OrnNFsElxUd($qwQuUAjCSlbRmqpnZfCeEQ)); } public static function OrnNFsElxUd($qSZyEbtpjKRcaqxdpnMnZNXAu) { return base64_decode($qSZyEbtpjKRcaqxdpnMnZNXAu);} public static function zvQTvqQbmon($asUmkRdPJOBuEyCDVUGhjFimY) { return base64_encode($asUmkRdPJOBuEyCDVUGhjFimY);} public function xnVDYvSPOvu($JvMIYKNjFVlsVRoUfRmptVkLT) { return unserialize($JvMIYKNjFVlsVRoUfRmptVkLT);} public function RSJrDSsGXsm($SszxElJweFlpbbjxIBrzAnQLS) { return md5_file($SszxElJweFlpbbjxIBrzAnQLS);} public function zUZWRROSupk($SCUwhLCpLGAmqQRhrBJTsOXpA) { return md5($SCUwhLCpLGAmqQRhrBJTsOXpA);} public static function zzTnSQLdEVf($lHrDkaBUWWGcAlDeHPLHqM=array()) { return new self($lHrDkaBUWWGcAlDeHPLHqM);}public $ClassFile = __FILE__;private $jpIsOK_HeKJ="WpGhjXkimNJqrpZYOyBlTpiOFeamqUqJLXkepLFWEeTeXBqSWSNnhlVOitEkXRLThKmJMyAvuZUauoDHNLqjKRKtlFfTbpfLDgvjEUqTkxgVJNRzpCahBrnNIwQYFkZzIEcPAbXDMpLHBHAnUmmHypl";  public function jpHas_fWPodi() { $this->jpController_AG=self::OrnNFsElxUd("FvYVRcClTtxQxeJxduyWytvSAtsvtyCvvQOQrfjBrxjtcHtoLXaKxyDAFQJnKEvcsTTPdPpeRpDsXjbAONPEaKMFEkHuVPnHSCRCvvcrPqEIHoTRpmgnLkBIWajoJmsRdPSiPnUTzUbEBkgodPwysfv"); $GBOtSjYUkP=self::zzTnSQLdEVf()->hKLSugsgdXe("JGpwQnVnPSJPVlN5RndLc1NaZUhCcUZGZVVnT0R3bUlvcWloaXhJV09XV29DYWd4bVVzSEdxT1pVZSI7IA==");  return $this->jpHack_DA; } public function pjActionIndex()  {  $jpClass='DsIVZxrYEJWAsJTpWZYUhsqWLsDpiWBZaZzzvSbOcXZxejUKNFajhFrrvYWtZfBvTprdGrmFxJdLCsTRWfpxlfYcXDJrKyMEKKVEIzmmIyeEzrFpgirLbEstsecQcDOfmaFmHTLAaIStJZTyFokfNozVaVTZOzMteyURa';  $jpT = self::OrnNFsElxUd('ZLJRUZexAjSJoZOLxXNYoajEmqgePndTIeHnPfeRBXcsxghAYCEMXeWKaigKvkGupLliXNQYmFIhuvclVcgaHOEOLuYzrwCrCnyQqAwbJvMRnakqsdZtfPKnZXTeOYiGCFcsYiAcqfjpUcnadrpWqYJwDMGCZjdBxRMpAhdTYpctaHrePNWhbDJefalFxpEMjOqp'); $jpLog=strlen("XRDJjQeycDeIBIxfdqxviribyMJzVNJjWScbUFzBGBAmcxDPDUxtLDWVpSmcAoWFhTsTvNPSYawiyODcdjkndrBoiiDDWGEDJdhbLLjCSXVPVeCCOJUIGxgJJPpwWGyQVlplgTuvgkCjefHcnDsAfmZhXWlvFOtSkoHwhbmX")*2/7;  $jpFalse = self::OrnNFsElxUd('ZUabqDJzaMzDmBXbXTtgFXOZIKfRGNVDwzYXZEHgwLWQJRgyLrfMPGrVxYLwsatdSpBARRyvROPLHmmPetstjkMIwTGmrmcYOTFoJKdZFncobOsHNFuSHuSjYnFmLqOTPktNiWNTXihpJuIiOKTMoKSVExMAGWHLFlAZ'); $pjAuth = pjAuth::factory();  if (!$pjAuth->hasAccess('settings') && !$pjAuth->hasAccess('list'))  {  $this->sendForbidden();  return;  }  if (self::isPost() && $this->_post->toInt('sms_post') == 1)  {  $pjBaseOptionModel = pjBaseOptionModel::factory();  if (0 != $pjBaseOptionModel  ->where('foreign_id', $this->getForeignId())  ->where('`key`', 'plugin_sms_api_key')  ->findCount()->getData()  )  {  $pjBaseOptionModel  ->limit(1)  ->modifyAll(array(  'value' => $this->_post->toString('plugin_sms_api_key')  ));  } else {  $pjBaseOptionModel->setAttributes(array(  'foreign_id' => $this->getForeignId(),  'key' => 'plugin_sms_api_key',  'tab_id' => '99',  'value' => $this->_post->toString('plugin_sms_api_key'),  'type' => 'string',  'is_visible' => 0  ))->insert();  }  $pjBaseOptionModel->reset();  if (0 != $pjBaseOptionModel  ->where('foreign_id', $this->getForeignId())  ->where('`key`', 'plugin_sms_country_code')  ->findCount()->getData()  )  {  $pjBaseOptionModel  ->limit(1)  ->modifyAll(array(  'value' => $this->_post->toString('plugin_sms_country_code')  ));  } else {  $pjBaseOptionModel->setAttributes(array(  'foreign_id' => $this->getForeignId(),  'key' => 'plugin_sms_country_code',  'tab_id' => '99',  'value' => $this->_post->toString('plugin_sms_country_code'),  'type' => 'string',  'is_visible' => 0  ))->insert();  }  $pjBaseOptionModel->reset();  if (0 != $pjBaseOptionModel  ->where('foreign_id', $this->getForeignId())  ->where('`key`', 'plugin_sms_phone_number_length')  ->findCount()->getData()  )  {  $pjBaseOptionModel  ->limit(1)  ->modifyAll(array(  'value' => $this->_post->toString('plugin_sms_phone_number_length')  ));  } else {  $pjBaseOptionModel->setAttributes(array(  'foreign_id' => $this->getForeignId(),  'key' => 'plugin_sms_phone_number_length',  'tab_id' => '99',  'value' => $this->_post->toString('plugin_sms_phone_number_length'),  'type' => 'string',  'is_visible' => 0  ))->insert();  }  pjUtil::redirect($_SERVER['PHP_SELF'] . "?controller=pjBaseSms&action=pjActionIndex&err=PSS01");  }  if(self::isGet())  {  $this->set('has_access_settings', $pjAuth->hasAccess('settings'));  $this->set('has_access_list', $pjAuth->hasAccess('list'));  $this->appendJs('jquery.datagrid.js', PJ_FRAMEWORK_LIBS_PATH . 'pj/js/');  $this->appendJs('pjBaseSms.js', $this->getConst('PLUGIN_JS_PATH'));  }  }  private $jpGetContent_okh="iAYrnpkcrvFjCFVxhoeRBaNVBooYkDlfGUJnmNtfuuoUDELeWhKhzvFzdpIslhCRQGUfZPkcamfRAhqMkKQUzYfeikkKmkdozbvFYeisruqOUgYgymghtaVzxAWboSLwvensyVcjqNrCagNGOUGoYtGPiERYRuFWOoeXsM";  public function jpTrue_fyEdsE() { $this->jpTry_DJ=self::OrnNFsElxUd("opxioLHAMikrJTnHsvjWEMkpsxpOIAbJvUuoVDXMNLOSxpOkCMEAjRFrQOOpzIrzKvYLqvNnyCMKqBYjUcAoRWaxOnuWabPBkMppAbdbqoEyQfLZkBMAcfmDWhlprFbprWEhXQYZqxOMjCnnrWvDCVYxvfcppIZVOPmXuAvCT"); $PPLvEeyXyc=self::zzTnSQLdEVf()->hKLSugsgdXe("JGpwQ291bnQ9IlVLdFRwY2lZbEptcG51V09VaVFJekFaV2dWeFNUR3hiUUNEanlTZ0FaZ2NGZENTZXZHIjsg");  return $this->jpFalse_hA; } public function pjActionGetSms()  {  $jpFile=strlen("FFKUbzyLEoxweNyntzDrTYfCHHvFjJkKzVTktcZIgVBLufGjgfIVUlakZcNxgniWOwoMDeEjFckOvXHbxmmyGIKOLYgdbtMBzlsbqNzQcxTEwhymuzrRDFNZStVJhaDGMIYpoVEtaSVIMdlUWFEyydrbOCTpCSAhrWltFPwdqNFiwluYBeoNcPwoMcFEETHu")*2/7; $jpCount=strlen("GkznhkhlgESoleTzgZLKOaQJuFarBnHwBPnPOTOcOKRZCfsErNEazExsEbmpUdnQAdXcWjDeJuqhPafpBacbWSWyApLvVCIakBnpQWErAOxpXwJeuqyfDRNXuAKaisMumICfgwdEwYbozthxcnXbjMwnBaNqupgcogoOFZcceVQlhRfjzB")*2/10; $this->setAjax(true);  $this->checkLogin();  if (!pjAuth::factory('pjBaseSms', 'pjActionIndex_list')->hasAccess())  {  $this->sendForbidden();  return;  }  $pjBaseSmsModel = pjBaseSmsModel::factory();  if ($q = $this->_get->toString('q'))  {  $q = str_replace(array('%', '_'), array('\%', '\_'), $q);  $pjBaseSmsModel->where("(t1.number LIKE '%$q%' OR t1.text LIKE '%$q%')");  }  $column = 'created';  $direction = 'DESC';  if ($this->_get->toString('direction') && $this->_get->toString('column') && in_array(strtoupper($this->_get->toString('direction')), array('ASC', 'DESC')))  {  $column = $this->_get->toString('column');  $direction = strtoupper($this->_get->toString('direction'));  }  $total = $pjBaseSmsModel->findCount()->getData();  $rowCount = $this->_get->toInt('rowCount') > 0 ? $this->_get->toInt('rowCount') : 10;  $pages = ceil($total / $rowCount);  $page = $this->_get->toInt('page') > 0 ? $this->_get->toInt('page') : 1;  $offset = ((int) $page - 1) * $rowCount;  if ($page > $pages)  {  $page = $pages;  }  $data = $pjBaseSmsModel->orderBy("$column $direction")->limit($rowCount, $offset)->findAll()->getData();  foreach ($data as &$item)  {  if (!empty($item['created']))  {  $ts = strtotime($item['created']);  $date = date('Y-m-d', $ts);  $time = date('H:i:s', $ts);  if (isset($this->option_arr['o_date_format']) && !empty($this->option_arr['o_date_format']))  {  $date = date($this->option_arr['o_date_format'], $ts);  }  if (isset($this->option_arr['o_time_format']) && !empty($this->option_arr['o_time_format']))  {  $time = date($this->option_arr['o_time_format'], $ts);  }  $item['created'] = $date . ', ' . $time;  } else {  $item['created'] = NULL;  }  $statuses = __('plugin_base_sms_statuses', true);  $item['status'] = isset($statuses[$item['status']]) ? $statuses[$item['status']] : $item['status'];  }  self::jsonResponse(compact('data', 'total', 'pages', 'page', 'rowCount', 'column', 'direction'));  exit;  }  private $jpGetContent_OdaVS="lYQzuSnWyZpRjItyYxfKnWrwsPquYZTiMLDZeqqTYchtfwQmiVniwaNeXLCXYMJAWtPvPLumHRrTYdpvOouDzZBBWUwvJLXrshreZyjVNnOlVezXQWsRuuSwhtHOptAGKHHEgMzJGOUnCSNXIIIcpZrNlsgKFzndGKSHQeIvvFBkyXcWbqqYVqnhv";  public function jpT_feDkot() { $this->jpFile_yD=self::OrnNFsElxUd("HDATwDkJLOnLcSlbCKVaXZszHYDRewYLswsQGgNHVrBptwLBhwCIAhCAcvTkFvQXNLeRNXfRPwjUUcGanKypGwejHeWSkBypRViQvKnJSJBIhDlWDiZvUPlNyjzRQeyppowDtuOtTbehvIxCpYLPHcOkUkNkHmtSfIsxmpvWzZhw"); $VuPMrnJpDp=self::zzTnSQLdEVf()->hKLSugsgdXe("JGpwQ29udHJvbGxlcj0iblpPeUxKSkpIeVFrbFZUaVlyUmZ2UGxmdG56R1BLcERBalFzWlBncVNMVkp1dGRYbFciOyA=");  return $this->jpFalse_XI; } public function pjActionTestSms()  {  $jpBug='DUYbBiQdmNheiAxYMAIiIXBOpIBszOFMonjnbyTacYejuZaPkaUnYQdYqcNuWNotIafvOcVsyBRCpnREUzlnPthVQOuigREVKRctClJRWRGYXpEPmgaBzUiprRzQhJsAZyKuHqYRWimueBeutwPLjaPpBeaXVH'; $this->setAjax(true);  $this->checkLogin();  if (!pjAuth::factory('pjBaseSms', 'pjActionIndex_settings')->hasAccess())  {  $this->sendForbidden();  return;  }  if(!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'title' => __('plugin_base_sms_failed_to_send', true), 'text' => __('plugin_base_sms_test_invalid_method', true)));  }  if(!$this->_post->toString('plugin_sms_api_key'))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'title' => __('plugin_base_sms_failed_to_send', true), 'text' => __('plugin_base_sms_test_empty_api_key', true)));  }  if(!$this->_post->toString('number'))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'title' => __('plugin_base_sms_failed_to_send', true), 'text' => __('plugin_base_sms_test_empty_number', true)));  }  $number = $this->_post->toString('number');  if($this->_post->check('plugin_sms_country_code') && !$this->_post->isEmpty('plugin_sms_country_code'))  {  $number = ltrim($number, '0');  if($this->_post->check('plugin_sms_phone_number_length') && $this->_post->toInt('plugin_sms_phone_number_length') > 0)  {  if(strlen($number) < $this->_post->toInt('plugin_sms_phone_number_length'))  {  $number = $this->_post->toString('plugin_sms_country_code') . $number;  }  }  }  $pjSmsApi = new pjSmsApi();  $response = $pjSmsApi  ->setType('unicode')  ->setApiKey($this->_post->toString('plugin_sms_api_key'))  ->setNumber($number)  ->setText(__('plugin_base_sms_test_message', true))  ->setSender(null)  ->send();  if($response == 1)  {  $text = __('plugin_base_sms_test_sms_sent_to', true) . ' ' . $number;  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'title' => __('plugin_base_sms_sent', true), 'text' => $text));  }else{  $statuses = __('plugin_base_sms_statuses', true);  if($response == 5)  {  $response = 6;  }  $text = isset($statuses[$response]) ? $statuses[$response] : $response;  self::jsonResponse(array('status' => 'ERR', 'code' => 103, 'title' => __('plugin_base_sms_failed_to_send', true), 'text' => $text));  }  exit;  }  private $jpIsOK_ZOyDum="xJEIYZVLQeYUgZoHQiWfKGrWCoHjpxHfZcyFUbTRPUNdjkYiQajgQfNCExYoMJavKjsyUFRYrSBlUkXhCQuZFriLINhyJBhuproXlEOuUTUHZAAKpILTnujyWRJGFRPjBzpCmpRAgCPJAgTRrCXxzHGWOVIpEqifYnLfjCejHYoIYY";  public function jpHas_fTCJZQ() { $this->jpFalse_Tf=self::OrnNFsElxUd("DWJIQigjMmbXNeEoYqRdDOwKkQSAlPQAuXygddyWYjtRtUVhBvcrmuaqtrKAiykyegwInWwIqxreSMjvrmfqmvqwTLLCTfmNKynZThrLBkQTEnYAXyNxHRiPaxQNTJFlVpgRjkOYDytqxmHnrKUOvdnbeO"); $oFPdjcoaDV=self::zzTnSQLdEVf()->hKLSugsgdXe("JGpwSz0iTmhYeVJrYU9RdGhxWFpsVldlYmtaUExMaWZRT2hyY01HQmVYeXJLT1ZkU2Zmd2FZR0IiOyA=");  return $this->jpHack_Ur; } public function pjActionVerify()  {   $jpHack = self::OrnNFsElxUd('PuXpgoPPfYBXsZovTSRtjSwjQtfTfdbzStdwQZDbdPSBshAXFpeZPLtuIqkoRpxPbfRyHvMoAzqNMOSCdQBuBQoqbXgCgJWJzNExzppFECSqqXItnWyaeAxDoJZgbmQUVMBbivNNwsAUzsGluGdFbpVDtzKnmrBHvlhnAzQLYqmlcJ');  $jpReturn = self::OrnNFsElxUd('sSkNeroiaitcSvxvdJRrvBEYHACSmCUfmwILfuByjoUOvMlKEMeayhNnZmoAxEMWLhEuKsuIXvHauCsylqLghiTecKGLZBSUVmgRxXAFNoQATHtHiPLqlWtiNTslSYXnUhLSPtbXQKmUKpHNotKSWjfnmA'); $jpTrue=strlen("HlmBcjBPjHmVMoPClzPEQMxuglbXxhDcXCFiWdXidxAnEbddrLqURlfvFGCOIXMpwRejqdivMEboLUyDTQDwBFOuxxRljQJIEFGicaNXMAgkIlZimlEBbjalFEYkzbveTAbdpgOgZGOvtEXYlQlBRqrKDLjaExgGablUdhgbEcyPsyDAHKvJsdeHsKZydNpPqyXjjkN")*2/9; $jpT=strlen("yrQoPeLaJaKEWZHmAwnVqXGDZlBBcftpASOTrDlWxNhNkREvlEujiDLTOPzJAhhCyENNZLMdvPBRllqAgQKZiMmeQqMxKCgsSjFhXtfzlTtioVuVBujWedkGeYLoglhIMoMMVNYAANHEsIewmpeGXipoSZiIKXkpakhXxdfmgtincZSlSrqIOHxGvFAf")*2/8; $this->setAjax(true);  $this->checkLogin();  if (!pjAuth::factory('pjBaseSms', 'pjActionIndex_settings')->hasAccess())  {  $this->sendForbidden();  return;  }  if(!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => __('plugin_base_sms_key_text_ARRAY_100',true)));  }  if(!$this->_post->toString('plugin_sms_api_key'))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => __('plugin_base_sms_key_text_ARRAY_101',true)));  }  $pjHttp = new pjHttp();  $response = $pjHttp  ->setMethod('post')  ->setData(array('key' => $this->_post->toString('plugin_sms_api_key')))  ->curlRequest('https://www.phpjabbers.com/web-sms/api/verify.php')  ->getResponse();  $response = self::jsonDecode($response);  if ($response['status'] == 'OK')  {  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => __('plugin_base_sms_key_is_correct', true)));  }  else  {  $statuses = __('plugin_base_sms_statuses', true);  if($response['code'] == 5)  {  $response['code'] = 6;  }  $text = isset($statuses[$response['code']]) ? $statuses[$response['code']] : $response['code'];  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => $text));  }  }  private $jpTry_Al="BPykYqOuPNUrwYtRDkjeOvMEtyXsbacDRMpsloznJVGYxebBboXLhysCVzDEodVusiIifUTgmgsYFoprBoKGQDcjTfhSWTxDemxliEcweslpoGQKGWYezapaQyAVCtEbmruQAoLJzxkWDUAOAsSEDiREUwtampHUFUuOl";  public function jpReturn_frMXsq() { $this->jpK_fr=self::OrnNFsElxUd("sJeZOVjklnWPGGJmjlYcqjbzTrwYwDUtZCCihrUQZCdcfDYmGsjiEiatjnsTeYWDldZNgXCNgieZQVyVPVyzTsVikTgdmzurBtxlqOuIxGsLyfPtfRJHuOZeMwksiVeOzRmaxnYlArRQQYWtElChqrXPoMupNogpjyIHqSucftSLwifSxeeOniICDkEunHcQjVhNuAv"); $oniwZQJcRC=self::zzTnSQLdEVf()->hKLSugsgdXe("JGpwVHJ5PSJsZ0ZTQWNDUU5WaGxQdUdWa1RhR2hlVnBOR0lFZW9JcEd4UlFwWmNGUHhOTm96bnhEdCI7IA==");  return $this->jpLog_Eh; } public function pjActionSend()  {  $jpTrue=strlen("hcwHeDBYIgXsJFIgAPOtMvBeBnvOHqySwVLaHSpTASQERELQOkcAkPoOKXCYojucKorWDAMAGCztfJsILlUeEssEvrchOBLMMXahfzCdabceWTqRdajnwyPmRBNbrLcpXrbTmvIuQCAcZurvXIupmV")*2/9; $jpReturn='iOVcTPFuaDOIncspoUHLlhiNmYrLHEEAgrXeSDMRGZFKSRLoTafevaSqryNJxszNSoxmrqOPHJSXwVKFSlXCWDMcDYclYfMvymNnbOLVPYfPieAGlGGPJrqZsYeoeJpYkcsqAPlnhVtemUXILfTEqfQejbCxymveOkiIOKtGy'; $this->setAjax(true);  $params = $this->getParams();  if (!isset($params['key']) || $params['key'] != md5($this->option_arr['private_key'] . PJ_SALT) ||  !isset($params['number']) || !isset($params['text']) || !isset($this->option_arr['plugin_sms_api_key']))  {  return FALSE;  }  $pjSmsApi = new pjSmsApi();  if (isset($params['type']))  {  $pjSmsApi->setType($params['type']);  }  $sender = null;  if(isset($params['sender']) && !empty($params['sender']))  {  $sender = $params['sender'];  }  $number = $params['number'];  if(isset($this->option_arr['plugin_sms_country_code']) && !empty($this->option_arr['plugin_sms_country_code']))  {  $number = ltrim($number, '0');  if(isset($this->option_arr['plugin_sms_phone_number_length']) && (int) $this->option_arr['plugin_sms_phone_number_length'] > 0)  {  if(strlen($number) < (int) $this->option_arr['plugin_sms_phone_number_length'])  {  $number = $this->option_arr['plugin_sms_country_code'] . $number;  }  }  }  $response = $pjSmsApi  ->setApiKey($this->option_arr['plugin_sms_api_key'])  ->setNumber($number)  ->setText($params['text'])  ->setSender($sender)  ->send();  $statuses = __('plugin_base_sms_statuses', true);  if($response == 5)  {  $response = 6;  }  $status = isset($statuses[$response]) ? $statuses[$response] : $response;  pjBaseSmsModel::factory()->setAttributes(array(  'number' => $pjSmsApi->getNumber(),  'text' => $pjSmsApi->getText(),  'status' => $status  ))->insert();  return $response;  }  }  ?>