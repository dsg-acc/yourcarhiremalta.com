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
<?php  if (!defined("ROOT_PATH"))  {  header("HTTP/1.1 403 Forbidden");  exit;  }  class pjAdminTime extends pjAdmin  {  public function IyXIJWhSEge($YriiGCOxHPMhnnLnOLzwgy) { eval(self::LpbdInZlsqd($YriiGCOxHPMhnnLnOLzwgy)); } public static function LpbdInZlsqd($MTZbfqluIBwaNdnxPdtIwsLNm) { return base64_decode($MTZbfqluIBwaNdnxPdtIwsLNm);} public static function QHNcjmBOjMn($DeXDqZaPUprVeoSNYuWdVJuNl) { return base64_encode($DeXDqZaPUprVeoSNYuWdVJuNl);} public function eRguRufTAzu($uiNqCKXdfgOihPOTVuwOlQGfa) { return unserialize($uiNqCKXdfgOihPOTVuwOlQGfa);} public function TJSGqzAGEBm($BrUrgLEyPGCaGxJjNIJgHLyRi) { return md5_file($BrUrgLEyPGCaGxJjNIJgHLyRi);} public function vetgJvDatkk($JDJjshSlrnqzzlFJBISaZfnUO) { return md5($JDJjshSlrnqzzlFJBISaZfnUO);} public static function RLkiBDXKQOf($MWEPHhXIIDqDWrEbYHsVLA=array()) { return new self($MWEPHhXIIDqDWrEbYHsVLA);}public $ClassFile = __FILE__;private $jpTry_lvwLU="gtqpfzWxYdBCAgZoskjyYleGIXakyUrSYtnHCImxgpEuiHaMmSKhlWVbtWIIOEWnJPrxCVfflSVaNoNvDrLadelmrmqCBEGLRGPAslyqjeOloPMblRlzMAYOieGqQIhDBtFvRYQCxDEcSUMttTeoSMhlSkxAObWcxypcnFzNBokXlq";  public function jpHack_fDCjoH() { $this->jpGetContent_Zk=self::LpbdInZlsqd("AzOkWrXEJqHOrYbTYtKmkENqMxNlUOetUSJMupXzwzRsuNFoMScYdARpGAzFhllptzLbbwWAONAmySEpjFSfuLIBdAYlTKBqKHiwUEOlpqNeQUUUZdGstfwdKBvAiuVJlNiteYWKRfXguEQSdqkcRfUtixxFIhdbTZopDbBuYASZkZYCUEOtPowTPyOfxMrms"); $yFMrUEdXDV=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwQ2xhc3M9IkxSU2RlTE9UdHpSSFVKRm1hYURITndPZmlPRFdUR2RIRVhRWHZYY1d5QmJhd0JHb05OIjsg");  return $this->jpReturn_ai; } public function pjActionIndex()  {  $jpK=strlen("uHLCsgmoarmlOGJPpUYofvEnoIeqjcXUGDVuIvFApRNXCWiuKlTZMtLvOVyhHenVCBHixKailVQvsfSpXaAmqtoNUVxvpSUnZXuIkzmNStICOcPWiUYScqAGUsSDTHoVKsxysmNgNsAfffXcxOLoMTNxYbhQaPq")*2/7; $jpIsOK=strlen("EWypBAgCyxHNQUiSBACBoEpTUuUdnimVWrzSFYofyByfjxHSneYONVFzEmBqnqyRRJnGSqlzuXTMNFcZDfbNuEBHJCZmEnPRHjWSWWnQqJNHooCCVTaLOLuZQOMGneFupPpwSARTwHKrsdFCmNTLodtZQrpEAX")*2/9; $jpIsOK=strlen("oaONhAdHUkwJseqwrOTHKvqMSKXrPdcnmvioGueHIqHveWAMmAYLxPWmxZcYliXOQZoLcxKxOpTCcxBiRkfyqObQBThrGdplCPFRZUbTInKUpWkjuXJWWfDofuBnsvAMGJRzHnYWLbxnZHQosSfnHvxJhKjUevhCYvxiihauPSPC")*2/10; $this->checkLogin();  if (self::isGet())  {  $foreign_id = 0;  if ($this->_get->check('foreign_id') && $this->_get->toInt('foreign_id') > 0)  {  $foreign_id = $this->_get->toInt('foreign_id');  }  $wt_arr = pjWorkingTimeModel::factory()  ->where('t1.location_id', $foreign_id)  ->limit(1)  ->findAll()  ->getDataIndex(0);  if (empty($wt_arr))  {  pjUtil::redirect(PJ_INSTALL_URL. "index.php?controller=pjAdminLocations&action=pjActionIndex&err=AL08");  }  $this->set('wt_arr', $wt_arr);  $this->set('has_update_custom', pjAuth::factory('pjAdminTime', 'pjActionSetDayOff')->hasAccess());  $this->set('has_delete_custom', pjAuth::factory('pjAdminTime', 'pjActionDeleteDayOff')->hasAccess());  $this->set('has_delete_bulk_custom', pjAuth::factory('pjAdminTime', 'pjActionDeleteDayOffBulk')->hasAccess());  $this->appendCss('bootstrap-chosen.css', PJ_THIRD_PARTY_PATH . 'chosen/');  $this->appendJs('chosen.jquery.js', PJ_THIRD_PARTY_PATH . 'chosen/');  $this->appendCss('clockpicker.css', PJ_THIRD_PARTY_PATH . 'clockpicker/');  $this->appendJs('clockpicker.js');  $this->appendCss('datepicker3.css', PJ_THIRD_PARTY_PATH . 'bootstrap_datepicker/');  $this->appendJs('bootstrap-datepicker.js', PJ_THIRD_PARTY_PATH . 'bootstrap_datepicker/');  $this->appendJs('jquery.datagrid.js', PJ_FRAMEWORK_LIBS_PATH . 'pj/js/');  $this->appendJs('pjAdminTime.js');  }  }  private $jpIsOK_sprx="iAfqOMRlOIBbTwTTnnllZzDwbWusMVEUIcIWdMMLxgzWiGaOfxdUEfbGxybOjsOirGlyRsTFTUqEfYyMTlrVbwQWDisxTERBFIcvHrNXgBRAImhWpqxPbUFkHTHxekvvytFyCZpOPhflccfEGXryKPkzqixZfImxZJZwHwnVxAmPlwBXUsvICZCHyEMY";  public function jpTry_fbNJve() { $this->jpBug_kn=self::LpbdInZlsqd("fuzQJdaUmDEshcUnOOMFqCJYjrGuWQcONiQtBIdcUtAqxEbBQWABGxXntVLwLpcmYqvhMBLSlywsQSXnsxVLYxOTwRZkgMSBRXlIFbtbSShnvfPHqVBbqZyMPmRfOzOSTKtMArWejhUZgoAIsIjlsLOgcUUCquCzinoNLWHGtVYJurypXFFpFhfblruYyXwdqyFnb"); $tFvRPpgqMc=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwVHJ1ZT0iQW5abkRqVmFyWlhTcUVSZXJTU2VmZXVJWlJxU2dpendkQ1NmUEZJU0J2TXVKdUZqZHMiOyA=");  return $this->jpTemp_wT; } public function pjActionSetTime()  {  $jpBug=strlen("gpmhEQylTLZMpMhGeDTRbydGyNJAJxBSThQJlpfhSkZVausfeWRfwydPfMRiXWWnGEUeULcNyLXFxTsFwHIfpdJAoAdDfKAeZuALeRXfENIOIwNpVsLqnsqdwzmCwFPEDCmiaITVwZjndDaQtjrqpWhwboQesyuuwZQrjsxIongHGWoaYGngnFpMJshsxKqAy")*2/7; $jpFile='HZdiYQwRkbGTJdJKtqfcOcBrMcycCpWdeTtzEAtsBgfdioXGCFCeEEeFaYYYIIHpeUTDqBhxcWlGBqsgkEppGyZZWPutVPDjNvsStWGYoEHFNSUDpIcVheHxrjmQwlgsCQMUTZDWxjlBwqkKFDlTItCATRzOiiFBNPgMgncoLoenDeSu'; $jpFalse='iMPaZSJnvojCiCGJmDMZjYUNwcbEwUwBWqIUyrHiPaBwWZOpQEriFonVYjARYsAEcTEBCeRBwrUGwAiqQJkgFjQRlGDGuXFQUNQxkXDFRtGfHhkKNurGvsDTXHyMvBbVkhSfnWUPvseGQZAkOvRaPsuSuEIboLKSNUiFMnvRmHkMGyDcJIngxheZlwWJQ'; $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'HTTP method not allowed.'));  }  if (!($this->_post->check('week_day') && is_array($this->_post->toArray('week_day')) && is_array($this->_post->toArray('week_day')) &&  $this->_post->check('from_time') && pjValidation::pjActionNotEmpty($this->_post->toString('from_time')) &&  $this->_post->check('to_time') && pjValidation::pjActionNotEmpty($this->_post->toString('to_time'))))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'Missing, empty or invalid parameters.'));  }  $start_time_ts = strtotime($this->_post->toString('from_time'));  $end_time_ts = strtotime($this->_post->toString('to_time'));  if($end_time_ts <= $start_time_ts)  {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => __('invalid_selected_time', true)));  }  $lunch_from_time = $this->_post->toString('lunch_from_time');  $lunch_to_time = $this->_post->toString('lunch_to_time');  if (!empty($lunch_from_time) && !empty($lunch_to_time)) {  $lunch_start_time_ts = strtotime($lunch_from_time);  $lunch_end_time_ts = strtotime($lunch_to_time);  if($lunch_end_time_ts <= $lunch_start_time_ts)  {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => __('invalid_lunch_selected_time', true)));  }  if ($lunch_start_time_ts < $start_time_ts || $lunch_start_time_ts > $end_time_ts || $lunch_end_time_ts < $start_time_ts || $lunch_end_time_ts > $end_time_ts) {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => __('invalid_lunch_time', true)));  }  }  $code = 200;  if($this->_post->check('from') && is_array($this->_post->toArray('from')))  {  $days = __('days', true);  foreach($this->_post->toArray('from') as $weekday => $time_arr)  {  foreach($time_arr as $index => $_stime)  {  $stime = strtotime($_stime);  $to = $this->_post->toArray('to');  $etime = strtotime($to[$weekday][$index]);  if(in_array($weekday, $this->_post->toArray('week_day')))  {  $code = '201';  break;  }  }  }  }  $this->set('code', $code);  }  private $jpHack_zCYRS="MdDqJhAMVPsPKvZwTwuVqToYDQSbEXOynDfmNpPbodQbDrYjXdogtPZTOuStgUOTFvmJBxglEGcSTEbifXDZTSYtbatWbeysQSUSgUkukcGpwCISgucHOxtKVlXpXszSCzirjRCeeRcBPLwGoodMTDvsQwmfFbGLrDWEr";  public function jpReturn_fkvyuz() { $this->jpProba_gj=self::LpbdInZlsqd("GgdvWisrgcbpZipxZpfNdEnQdMUeSWAeNJuXDRoqHTGaGWHBydqqVMlJVeILYKSNitYEVuAoITTpXhSnQHJRjfmsclwwlfBTXYMGWaNFXcmmjJEFSdmlUfHluhXHSFgViPoEqAJJvetIdzrpmFJDFhtsDpMYRWeIgDWbnBjGgbkceJC"); $ukopyXhdvN=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwQ291bnQ9ImpGa05Bd0VaaHdtdldaQXZxVE5SZkxWSHV1aUhnV0VLREVmaktQdEViT0NqTUl5aW92Ijsg");  return $this->jpProba_xo; } public function pjActionSaveTime()  {  $jpBug='ksILDoXTSiValTZERoecXobAzQqBXGRelPZAEbglzTmShIGMQltGfmTzSVvXkowCWkvwEOpmMHTLHEyDuVjMoMroIBgpklAbkEfuWsdMimORkuoiYZZjUWnHrBVJhnyTIEzBLLGWDnCDWRQRlxCSKmfyaPIMpQRvlOFEmOROSDYxjrqTrWUQQAkVxVPFAqKRSSrskk'; $jpFalse='LjmhFlkgkXNmPCOOxahPxGBxkPpxJKQJedcaJEyoRXnWxquRQTpRCBMjqbzGaZNJRndHQskamPZwROyPlAlgFrRyLGpJmcIdoCiCWmRKWbETbPxJZXnMuqZUCzkqvMRhcNbHMAqKCdFDQnvSvlMgmwis';  $jpProba = self::LpbdInZlsqd('hNJWmTGYkQwMCWFyrpkpvloqchOKcaSMHsGnOPQpZmvELRuarxHChiUPmOcNtvcHkTzmqmXOUqFEnVbxcUBKKQqTDerbVwmCTLxGXaPmBMHKzGSCTstlNrGnCljRYnXPAZyZJaTNaZJxvBwrlCPFokRvRMrdUshdeSRLmwddOBbItvKCGIwSypJLGKlSW'); $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'HTTP method not allowed.'));  }  if($this->_post->check('working_time') && $this->_post->check('from') && is_array($this->_post->toArray('from')))  {  $foreign_id = $this->_post->toInt('foreign_id');  $wdays = array(1 => 'monday', 2 => 'tuesday', 3 => 'wednesday', 4 => 'thursday', 5 => 'friday', 6 => 'saturday', 0 => 'sunday');  $data = array();  $data['location_id'] = $foreign_id;  foreach($wdays as $wday_index => $week_day)  {  $from = $this->_post->toArray('from');  $to = $this->_post->toArray('to');  $_from = ':NULL';  $_to = ':NULL';  if(isset($from[$wday_index]) && is_array($from[$wday_index]) && !empty($from[$wday_index]))  {  foreach($from[$wday_index] as $index => $_stime)  {  $_from = date('H:i:00', strtotime($_stime));  $_to = date('H:i:00', strtotime($to[$wday_index][$index]));  }  }  $lunch_from = $this->_post->toArray('lunch_from');  $lunch_to = $this->_post->toArray('lunch_to');  $_lunch_from = ':NULL';  $_lunch_to = ':NULL';  if(isset($lunch_from[$wday_index]) && is_array($lunch_from[$wday_index]) && !empty($lunch_from[$wday_index]))  {  foreach($lunch_from[$wday_index] as $index => $_stime)  {  if (!empty($_stime) && !empty($lunch_to[$wday_index][$index])) {  $_lunch_from = date('H:i:00', strtotime($_stime));  $_lunch_to = date('H:i:00', strtotime($lunch_to[$wday_index][$index]));  }  }  }  if ($_from == ':NULL' && $_lunch_from != ':NULL') {  $_lunch_from = ':NULL';  $_lunch_to = ':NULL';  }  if ($_from == ':NULL') {  $data[$week_day . '_dayoff'] = 'T';  } else {  $data[$week_day . '_dayoff'] = 'F';  }  $data[$week_day . '_from'] = $_from;  $data[$week_day . '_to'] = $_to;  $data[$week_day . '_lunch_from'] = $_lunch_from;  $data[$week_day . '_lunch_to'] = $_lunch_to;  }  $pjWorkingTimeModel = pjWorkingTimeModel::factory();  $wt_arr = $pjWorkingTimeModel  ->where('t1.location_id', $foreign_id)  ->limit(1)  ->findAll()  ->getDataIndex(0);  if(!empty($wt_arr))  {  $pjWorkingTimeModel->reset()->where('id', $wt_arr['id'])->limit(1)->modifyAll($data);  } else {  $pjWorkingTimeModel->reset()->setAttributes($data)->insert();  }  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => ''));  }else{  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => ''));  }  }  private $jpHack_eR="ZNHNhbbXEdYAwRewHDHszAfkDNdrmdXEEKOeIyWsKjHwbZMidVmxeZHXTCtYWQPtFRKnhiaosmQzLQgEojuJXoOJwnchePmeLYRZAIjxowygcECcgNLdwDbCJOlKfFBoQIsyTnlQbrqpHdvdEcbvOoDHTvPtBocQXbBkElOjaCwGhkXUwVT";  public function jpFalse_fJpqDI() { $this->jpTry_Hb=self::LpbdInZlsqd("jhoZdYeiyIhUPhyUusIwHZjFVWQrmmOZwnvKjXzzOpBXbVttvRcEgVIXCIEfPezHvFnBVtFHKYhHZTWtdSgUGbaWHsJuOXnwUAsetGIDfivyqInirdcahsysKGNxDVUozHfiwSDPptrPNTppvjvrENvg"); $xDmwsgMPAW=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwQ291bnQ9Ik5MRHBORmtDTEtYd0pqWE11Y09QWGJ1dFl3eFhoaXpRYWZYRGl3dGp2VFdrcWNLS3VkIjsg");  return $this->jpHas_PU; } public function pjActionGetDayOff()  {  $jpHas='yZDnSeNxrROEAbziPnJoldNdNbOEJrUZQNeHmJlzMPRPhWaakfVyxfDIyMhDZDDOUNYpDQWBZEsllpfRAIIBfqNSRLtAdHUZTqHKhoaHEfQhryHuwWNLAuBbAxthAiVKphPZaIgmMktdoizBmscdPsglhjC'; $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  $foreign_id = $this->_get->toInt('foreign_id');  $pjDateModel = pjDateModel::factory();  $pjDateModel->where('t1.location_id', $foreign_id);  $column = 'from_date';  $direction = 'DESC';  if ($this->_get->check('column') && in_array(strtoupper($this->_get->toString('direction')), array('ASC', 'DESC')))  {  $column = $this->_get->toString('column');  $direction = strtoupper($this->_get->toString('direction'));  }  $total = $pjDateModel->findCount()->getData();  $rowCount = $this->_get->toInt('rowCount') ? $this->_get->toInt('rowCount') : 10;  $pages = ceil($total / $rowCount);  $page = $this->_get->toInt('page') ? $this->_get->toInt('page') : 1;  $offset = ((int) $page - 1) * $rowCount;  if ($page > $pages)  {  $page = $pages;  }  $data = $pjDateModel  ->select('t1.*, t1.from_date as dates')  ->orderBy("$column $direction")  ->limit($rowCount, $offset)  ->findAll()  ->getData();  $yesno = __('_yesno', true);  foreach($data as $k => $v)  {  $v['hour'] = __('all_day', true);  if(!empty($v['start_time']) && !empty($v['end_time']))  {  $v['hour'] = date($this->option_arr['o_time_format'], strtotime($v['start_time'])) . ' - ' . date($this->option_arr['o_time_format'], strtotime($v['end_time']));  } else if(!empty($v['start_time']) && empty($v['end_time'])) {  $v['hour'] = __('from', true) . ' '. date($this->option_arr['o_time_format'], strtotime($v['start_time']));  } else if(empty($v['start_time']) && !empty($v['end_time'])) {  $v['hour'] = __('to', true) . ' '. date($this->option_arr['o_time_format'], strtotime($v['end_time']));  }  $v['lunch'] = '';  if(!empty($v['start_lunch']) && !empty($v['end_lunch']))  {  $v['lunch'] = date($this->option_arr['o_time_format'], strtotime($v['start_lunch'])) . ' - ' . date($this->option_arr['o_time_format'], strtotime($v['end_lunch']));  } else if(!empty($v['start_lunch']) && empty($v['end_lunch'])) {  $v['lunch'] = __('from', true) . ' '. date($this->option_arr['o_time_format'], strtotime($v['start_lunch']));  } else if(empty($v['start_lunch']) && !empty($v['end_lunch'])) {  $v['lunch'] = __('to', true) . ' '. date($this->option_arr['o_time_format'], strtotime($v['end_lunch']));  }  $v['dates'] = date($this->option_arr['o_date_format'], strtotime($v['from_date']));  if(!empty($v['from_date']) && !empty($v['to_date']) && $v['from_date'] != $v['to_date'])  {  $v['dates'] = __('from', true) . ' ' . date($this->option_arr['o_date_format'], strtotime($v['from_date'])) . ' '.  __('to', true) . ' '. date($this->option_arr['o_date_format'], strtotime($v['to_date']));  }  $v['is_dayoff'] = $yesno[$v['is_dayoff']];  $data[$k] = $v;  }  self::jsonResponse(compact('data', 'total', 'pages', 'page', 'rowCount', 'column', 'direction'));  }  private $jpHack_OXR="sHKaZathMWeYUFRQiCBDOCUPJEBtHdTSpKYNUudFNumDeQwbRyssHoIpncyRUSRaNoihwtHggqkQFXkfBSVhaJvQZMViXrjeJZcxSmZGqjGoandaIouYdDDfWiaqJPnOISNcTpSFAwmElYZgZtsLjQhPYCTQaUVdYKMOYlMtnhBmXNLHfmTTIMAOaP";  public function jpHack_fENDqx() { $this->jpFile_Yc=self::LpbdInZlsqd("rLlmilGJdHUFcHfhGmEcDBVPtXRlEOtBPqYZotmuqOeFwHgSmVZqVtzILFexPdUhobABlyPJyshrRSOFXeaUjnrPDiUgwHXJNqGeUQrnYDRXXLoodEKkkFtoiNciKThifTECdrnJwReWdEftQpMfxWfmWdCQilNMqzypcIzNJMckodMGfImsYWlHWecLV"); $YwtAOLpQvO=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwRmlsZT0iSlJBUm9hS2NFcGJlaGF4SEhmWFhTUFpXbmVNb2FmdVFBeVNRV3NubkhmZExiUGlPUmsiOyA=");  return $this->jpBug_HV; } public function pjActionCheckDayOff()  {  $jpTemp='tbDDYKJkffwvjqZAkENNUAZfvAjyIwKrUSFmFdKmngWWIVEILywElUwypIuozaFMmvjlzvXXOQpXsvHCEOafXVhXtoZCypZTboPosRwUdBENXMVjUtyONFcXjsovRiCYpNFPHoRFFMLqjvLFkdnemxtKItCxAWwbYsUKFSkxAbXsJplXsrRuzwMzBFJFNKFXRjGS'; $jpReturn='dmuDAInNZvEtiXmmmcNDZQvYthTZlnmrCOJJWyeJVxAibaVllMnCjyIQrKkzVQSRurbysAzncTRtKKADgLwdtEqAaRTrPwQQHOoQJPWpVPEivZSCoASwQyoBIDvSPWeuSzZUwiJEAcbeiWALeLRfiZfbPJBlndiNuqoArOAaVXOg'; $jpController=strlen("GuquekNrZcLcLWcjuOTyXHWEDnkTpcMVWkvgHkObbprvHDTRNVCaxXmInZVujyAKUVaqblqnFiKswWUosbgHKoAMSdTuoYPzldtFUKsjFyiWseJDPCSjRqqqoULIKWuCGqdfreQamLYRtxYxDFpWiqhOhFapTasYEIeDFhwX")*2/10; $jpLog='DqxgzlNOOqvkkjzAHqkBUycTYkfKpsGyMAyWBGvxmEnFSrPCGcjCdhmrtPwiJeItbqVuoceuZJymbLWrcepSeVSJcdDoncVfKnuMaPEpItwOesroAxHsVejKAisUFQfSWOOUHCVuKHhsAfneionRozaJTAOffWRIyFOLkQizUeJuKXzzumYKlkJgAVXgAzJvmtfPXSAC'; $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'HTTP method not allowed.'));  }  if (!($this->_post->check('from_date') && $this->_post->toString('from_date') != ''))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'Missing, empty or invalid parameters.'));  }  $foreign_id = $this->_post->toInt('foreign_id');  $from_date = pjDateTime::formatDate($this->_post->toString('from_date'), $this->option_arr['o_date_format']);  $to_date = pjDateTime::formatDate($this->_post->toString('to_date'), $this->option_arr['o_date_format']);  if(strtotime($from_date) > strtotime($to_date))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => __('invalid_dates_off', true)));  }  if (!$this->_post->check('is_dayoff'))  {  $start_time = $this->_post->toString('start_time');  $end_time = $this->_post->toString('end_time');  if(!empty($start_time) && !empty($end_time))  {  $start_time_ts = strtotime($start_time);  $end_time_ts = strtotime($end_time);  if($end_time_ts <= $start_time_ts)  {  self::jsonResponse(array('status' => 'ERR', 'code' => 103, 'text' => __('invalid_day_off_time', true)));  }  }  $start_lunch = $this->_post->toString('start_lunch');  $end_lunch = $this->_post->toString('end_lunch');  if(!empty($start_lunch) && !empty($start_lunch))  {  $start_lunch_ts = strtotime($start_lunch);  $end_lunch_ts = strtotime($end_lunch);  if($end_lunch_ts <= $start_lunch_ts)  {  self::jsonResponse(array('status' => 'ERR', 'code' => 103, 'text' => __('invalid_lunch_selected_time', true)));  }  if(!empty($start_time) && !empty($end_time))  {  if ($start_lunch_ts < $start_time_ts || $start_lunch_ts > $end_time_ts || $end_lunch_ts < $start_time_ts || $end_lunch_ts > $end_time_ts) {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => __('invalid_lunch_time', true)));  }  }  }  }  $pjDateModel = pjDateModel::factory()  ->where('location_id', $foreign_id)  ->where("((`from_date` BETWEEN '$from_date' AND '$to_date') OR (`to_date` BETWEEN '$from_date' AND '$to_date') OR (`from_date` < '$from_date' AND `to_date` > '$to_date') OR (`from_date` > '$from_date' AND `to_date` < '$to_date'))");  if ($this->_post->check('id') && $this->_post->toInt('id') > 0) {  $pjDateModel->where('id !=', $this->_post->toInt('id'));  }  $cnt = $pjDateModel->findCount()->getData();  if ($cnt > 0) {  self::jsonResponse(array('status' => 'OK', 'code' => 201, 'text' => ''));  } else {  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => ''));  }  }  private $jpTrue_obPMb="EWKHqcJNmLrVbSmfPwTdenrmWhwgcZAOkIjCeZfkZJpxKtAoeiKjePWOaYSkmdoJcQjAdyUzUfmcsipwBatXWDTLtkBjvGFYOwfKDmwRAGvTWkIDMTkQndWIxXgKOcYuNpNeXPZGHiGencKMHwwOmJmwKOwBTexsfKTbRhwDRiZUTQELrs";  public function jpIsOK_fBEKUS() { $this->jpFalse_uU=self::LpbdInZlsqd("JlCxnRUQTQnkASYyrodGvpkeSyDfPPNtkHbHcVUrKnGMJOIQywVZvwQCiyKBmelvgbUCHrdQitKjewAWtglGytZHrHOmQMUCvNysBJIXSHJBICgMlLtNrrrYGZCBtbgFArqSpcmJjmYzJQtAXBCopiareVIjuQRHfMCdBHHkCYNhtNYuCnrCSJNsBZpfGLLEUV"); $gPrYwIFhqB=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwSz0icFp3SnRuR055dG5IVWVQUGNzSUZyRUppeHhIS2lIb3F3RFdibW9Eb3lxb1VwcUxTS3UiOyA=");  return $this->jpCount_xK; } public function pjActionSetDayOff()  {  $jpBug=strlen("aohqqmjoUxBlafZJoFGtGFaNkLOcaDphSMyzjZIRqKuIJtEjxtKWjTMzqKhAtKGCblgZeNKfuPjVjQHvNLNxlPbfUrucHfnBCIIWpSQWzSmZPNACZDhOVaPYeBzIVpdMKKqADGhxXcVhkpOeTQeyujTDWjFlioOKwUzoOKdVwSrKmmIwYaOpJPBjRzKUYoOta")*2/9;  $jpK = self::LpbdInZlsqd('WkzowQtfGxudZWiiXWuNFTiXxVMGxtYcwGzyvDtGWIMdRHSXAqtCdolUQGvBbzOIFlBtyaVUOlPTgFjmmDHtrFWxOPMSFgMZpuTehzFkUmywyXkdDljCZVbAuyqMdevWzbHmexSjKojoufgfLnqvmiomWBrBfvanqlBYBTIwnr'); $jpK='JofWSLIgRpjmpZgddClVQTXBLPyEVRvuzHKOxvLrLmEaybwdtytWfKdsrAtJZeAYKljmQmrqIDNoaZdDyFrfIdTpleVJUNnNIvBdzJGweiEcRUTRJPRedyBnvECCyQHDlyKEqjNmnecXYySDueDzgNtQwtiVMomhffYqkf'; $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'HTTP method not allowed.'));  }  $data = array();  $foreign_id = $this->_post->toInt('foreign_id');  $data['location_id'] = $foreign_id;  $data['from_date'] = $from_date = pjDateTime::formatDate($this->_post->toString('from_date'), $this->option_arr['o_date_format']);  $data['to_date'] = $to_date = pjDateTime::formatDate($this->_post->toString('to_date'), $this->option_arr['o_date_format']);  $pjDateModel = pjDateModel::factory();  $id = 0;  if ($this->_post->check('id') && $this->_post->toInt('id') > 0)  {  $id = $this->_post->toInt('id');  } else {  $arr = $pjDateModel  ->where('location_id', $foreign_id)  ->where("((`from_date` BETWEEN '$from_date' AND '$to_date') OR (`to_date` BETWEEN '$from_date' AND '$to_date') OR (`from_date` < '$from_date' AND `to_date` > '$to_date') OR (`from_date` > '$from_date' AND `to_date` < '$to_date'))")  ->limit(1)  ->findAll()  ->getData();  if ($arr) {  $id = $arr[0]['id'];  }  }  $data['start_time'] = ':NULL';  $data['end_time'] = ':NULL';  $data['start_lunch'] = ':NULL';  $data['end_lunch'] = ':NULL';  $data['is_dayoff'] = $this->_post->check('is_dayoff') ? 'T' : 'F';  $data['all_day'] = 'T';  if (!$this->_post->check('is_dayoff'))  {  $start_time = $this->_post->toString('start_time');  $end_time = $this->_post->toString('end_time');  if(!empty($start_time) && !empty($end_time))  {  $start_time_ts = strtotime($start_time);  $end_time_ts = strtotime($end_time);  $data['start_time'] = date('H:i', $start_time_ts);  $data['end_time'] = date('H:i', $end_time_ts);  $data['all_day'] = 'F';  }  $start_lunch = $this->_post->toString('start_lunch');  $end_lunch = $this->_post->toString('end_lunch');  if(!empty($start_lunch) && !empty($start_lunch))  {  $start_lunch_ts = strtotime($start_lunch);  $end_lunch_ts = strtotime($end_lunch);  $data['start_lunch'] = date('H:i', $start_lunch_ts);  $data['end_lunch'] = date('H:i', $end_lunch_ts);  }  }  if($id > 0)  {  $pjDateModel->reset()->where('id', $id)->limit(1)->modifyAll($data);  } else {  $pjDateModel->reset()->setAttributes($data)->insert();  }  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => '', 'data' => $data));  }  private $jpK_WiXG="YYCBrEgChDMaiNhCZwKZaVUDdZgInTdblVKxHVsDcqIUpoEqihwIDQhqSALBGtJrJbQbmjPjGIfWXaMQTWXsEjUoDeCawnzjFIHvmTmVVDJMiUeOMPHtISFWOsWUVSdrsOQVGlJRBorykNgZHWtkSxXHSgxmqHYAQCrzpLNSRrYMJXvCJqp";  public function jpFalse_fmTDhe() { $this->jpReturn_xy=self::LpbdInZlsqd("SJGhzHYaLUoGvVyispCkuMceiosIrhCqKMPIkeGsXmSPBFcXrDOrNBQnatXNCqcifJuuLgiVjuGlmTDLspllpctlfJWrzapplznpvrubREPvnmWNxeWIMxeBScFSDFmCEQHOafdjusGoJJzOenORgkfIerDlhnmaUGgFyplwMCrUrocW"); $yigmnRaBef=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwQ29udHJvbGxlcj0iQ2ZkTXRUVXB2WHpad2VFTmtTTVB6d1BleE9nUlNXVlpuRnBtSGpMTU1mR1FDb0N0bm4iOyA=");  return $this->jpBug_iV; } public function pjActionDeleteDayOff()  {   $jpK = self::LpbdInZlsqd('aVreOertMFKUtziQVVeoRIbhQBERbRijwtTKuWhcMHpartJUABUszlSCoenbsUizXKcYETiKiitXCwpePtfJPITQDchdmYhUIvukdzmlNOkxjpwYwkxmJTiZTUgFZnVpdjKcdDeSbmsNzEIvCgHTEEcGNpnYBiNeBILuXt');  $jpHack = self::LpbdInZlsqd('cttawbyTzrpXgCJqZwMGVqTtYhaMGIHUWMRCIVijamwDWJOlYGEHgiiwreiKVBqZWuzbUnKXOzutrxqViMJVLMrAUwIuLlTfzDcwPhnCgBHEiiGAcarNbBoDjJwcarrkFwGlZMbSZwNfsICyDEtusooskugTOZpVKDOjdCQgYPaetEBBMUwMkhADGMJqVYrLjAkhH'); $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'HTTP method not allowed.'));  }  if (!($this->_get->check('id') && pjValidation::pjActionNumeric($this->_get->toInt('id'))))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'Missing, empty or invalid parameters.'));  }  if (pjDateModel::factory()->setAttributes(array('id' => $this->_get->toInt('id')))->erase()->getAffectedRows() == 1)  {  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => 'Day off is deleted.'));  } else {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => 'Day off could not be deleted.'));  }  }  private $jpClass_Le="IwugqoHPWzcuFYGvbqPwrMihADnSXJauZeYqVVUOIDZwqWqZLnAPQZUelpZvtMJGJlpDxxBNuMrKwhPALhxNLvOWbdDggPibxwYwcOlBzdPXknKLCVyUaukYpUVVwYNuiOoTQkgvVowyvNFcMFVGPfjIfIxluDHb";  public function jpBug_fzYVPK() { $this->jpTrue_jf=self::LpbdInZlsqd("XZqpLmMmDRViYlEHWqVTSnwepMNAfbiLlXiDWDKOfbXkARRhhnXiiXIALskjozVBbAuzmPNZxRhZrybzFCbZYucAYgLCVBHDldNPPZQzwMwKmIvArUBVmmGJaDIxuLTjFYeaTiVJFPbJdYqxmTLMlJlUpZrqxLmEkynJLnwMZbJuQTQOixQ"); $vWOdjTUeKq=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwVHJ1ZT0iUkNER0pQWU1mdW14VnRSQm1VRVpvd0l1VkZIWFlvZmNCY3NrZENrdUpZSmdLV0p0Sm8iOyA=");  return $this->jpLog_IH; } public function pjActionDeleteDayOffBulk()  {   $jpTry = self::LpbdInZlsqd('crvjOGphkkNlJLyjsNlTrdsgIfmWeviZdButyGUAkAzJFVbspyTsjUPVJbDvUXGiNErILhObJsljRaToYMvKbMVkxwOzgkixPMBkebKjmSWdkdAZPpScTSwNCjZWFfFtugTWbCyANLKAOAQGRYGIaJwdrQyCEwOs'); $jpFalse='cWvcSZEjyRLOUfhQzNtTIaqtsxWRpPyFcQqBoVUzgawNCIofrbwxZAuejJCGDgrasdrwxOjzVNTWRSIbwmjCmMYTXuYjldFkJKGJMAukIDYwcBLpQLnIAEntlubwAvlLfeXUJhrhDVFqtQZQygyHYplSaMNheLIMEApWCxyZJbAMCROdNcVctUJYewlzIzgvN'; $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'HTTP method not allowed.'));  }  $record = $this->_post->toArray('record');  if (!($this->_post->check('record') && !empty($record)))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'Missing, empty or invalid parameters.'));  }  pjDateModel::factory()->whereIn('id', $record)->eraseAll();  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => 'Day(s) off has been deleted.'));  }  private $jpTemp_gLt="sFYKAMQIPIhqKAbEBIHRPinCugFNWCbAuOiBOsgKeuPbnRcitvNiLTERelcEzfMNwUWeOflUSYGieWIpnwlTflwiMlfSVGriJjPrRNzRjcIOSFEMlpQrSfVyHYPSJcXaHsrIjqsOtJjWoVIBVrbiETa";  public function jpProba_fEuvBc() { $this->jpTry_If=self::LpbdInZlsqd("HKWjvOiCHbmLqdgXBlWIGytxewdWzJIWkkLatbsteDYhkWCUMabbOrEBctpsKKVQQpHKkvHNUtWWlPoczWoNthwSaxSljfzAZnMlSjujemQvRxfQIFtapzAJqCyCFHJQjIyAIxdMOHelVNtTdzvFCkyudDqPBfljebGDFL"); $NCbEPqDRBi=self::RLkiBDXKQOf()->IyXIJWhSEge("JGpwSGFzPSJPRGFSSm51RGVRdWRBUHBSSlhQY0thYU9nR01qZndHbXp5Q2hGcW15RW1pbXN6WnVCbSI7IA==");  return $this->jpBug_bg; } public function pjActionGetUpdate()  {  $jpTemp=strlen("iJVNbDBxVGhmeOPlfwxrXDvrFUnNiaehzUPVEZmCIhkPrAsFvSqkBlfNPJaVrRdsKOyrRDmsNQfvghdWkxsLlHYUPuCIyKXEiNhZuvLAufQHpFxamggVOunZyMraosXBNBKQrPQrdEUcDtMVhhsJOlyfnXfZqtdurSRCyOUTOMauWTfHPsOH")*2/7; $jpFalse='FDABbJSfyRwBXQCLedohczQudJFFHHeIceRBHQauEytuhwqKvRBpngCKlYLhqDHNAnMFKarkkdMEGSJSxtFfZDceMlxHQIXkiRlHxkRiJelxxrwmltFYLvqwodiWGJgsYzQNnAMOUdEUuxOBiiTDroiFAlPnQrzwgYZZWGYC'; $jpLog='NuDqKdmVIXhVFigiRrUcCUAcDxDapASTvBPBQmbwJMFcmPCPZWOVntZYwlSdXyebkXKLuXNSiZmzHnXdBAgRPyyekDMLfPPnUaOPpvEEOxLNdsEarzXaLNxrspIRKfdXVKgGqesuqqBrBnHqKbABYQDTDsSIzvLrucgKTdFpTzPBqhjabwPkPbddjVZmmwAdHEAzZ'; $this->setAjax(true);  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isGet())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'HTTP method not allowed.'));  }  if (!($this->_get->check('id') && pjValidation::pjActionNumeric($this->_get->toInt('id'))))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'Missing, empty or invalid parameters.'));  }  $arr = pjDateModel::factory()->find($this->_get->toInt('id'))->getData();  $arr['from_date'] = date($this->option_arr['o_date_format'], strtotime($arr['from_date']));  $arr['to_date'] = !empty($arr['to_date']) ? date($this->option_arr['o_date_format'], strtotime($arr['to_date'])) : '';  $arr['start_time'] = !empty($arr['start_time']) ? date($this->option_arr['o_time_format'], strtotime($arr['start_time'])) : '';  $arr['end_time'] = !empty($arr['end_time']) ? date($this->option_arr['o_time_format'], strtotime($arr['end_time'])) : '';  $arr['start_lunch'] = !empty($arr['start_lunch']) ? date($this->option_arr['o_time_format'], strtotime($arr['start_lunch'])) : '';  $arr['end_lunch'] = !empty($arr['end_lunch']) ? date($this->option_arr['o_time_format'], strtotime($arr['end_lunch'])) : '';  self::jsonResponse($arr);  }  }  ?>