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
<?php  if (!defined("ROOT_PATH"))  {  header("HTTP/1.1 403 Forbidden");  exit;  }  class pjAdmin extends pjAppController  {  protected $extensions = array('gif', 'png', 'jpg', 'jpeg');  protected $mimeTypes = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/pjpeg');  public $defaultUser = 'admin_user';  public $requireLogin = true;  public function __construct($requireLogin=null)  {  $this->setLayout('pjActionAdmin');  if (!is_null($requireLogin) && is_bool($requireLogin))  {  $this->requireLogin = $requireLogin;  }  if ($this->requireLogin)  {  if (!$this->isLoged() && $this->_get !=  null && !in_array(@$this->_get->toString('action'), array('pjActionLogin', 'pjActionForgot', 'pjActionValidate', 'pjActionExportFeed')))  {  if (!$this->isXHR())  {  pjUtil::redirect($_SERVER['PHP_SELF'] . "?controller=pjBase&action=pjActionLogin");  } else {  header('HTTP/1.1 401 Unauthorized');  exit;  }  }  }  $ref_inherits_arr = array();  if ($this->isXHR() && isset($_SERVER['HTTP_REFERER'])) {  $http_refer_arr = parse_url($_SERVER['HTTP_REFERER']);  parse_str($http_refer_arr['query'], $arr);  if (isset($arr['controller']) && isset($arr['action'])) {  parse_str($_SERVER['QUERY_STRING'], $query_string_arr);  $key = $query_string_arr['controller'].'_'.$query_string_arr['action'];  $cnt = pjAuthPermissionModel::factory()->where('`key`', $key)->findCount()->getData();  if ($cnt <= 0) {  $ref_inherits_arr[$query_string_arr['controller'].'::'.$query_string_arr['action']] = $arr['controller'].'::'.$arr['action'];  }  }  }  $inherits_arr = array(  'pjAdminTypes::pjActionGet' => 'pjAdminTypes::pjActionIndex',  'pjAdminTypes::pjActionSave' => 'pjAdminTypes::pjActionUpdate',  'pjAdminCars::pjActionLoadAvailability' => 'pjAdminCars::pjActionAvailability',  'pjAdminCars::pjActionGetFilterCars' => 'pjAdminCars::pjActionAvailability',  'pjAdminBookings::pjActionGetBooking' => 'pjAdminBookings::pjActionIndex',  'pjAdminBookings::pjActionSaveBooking' => 'pjAdminBookings::pjActionUpdate',  'pjAdminBookings::pjActionConfirmation' => 'pjAdminBookings::pjActionUpdate',  'pjAdminBookings::pjActionSms' => 'pjAdminBookings::pjActionUpdate',  'pjAdminLocations::pjActionGet' => 'pjAdminLocations::pjActionIndex',  'pjAdminLocations::pjActionSave' => 'pjAdminLocations::pjActionUpdate',  'pjAdminTime::pjActionSaveTime' => 'pjAdminTime::pjActionSetTime',  'pjAdminTime::pjActionCheckDayOff' => 'pjAdminTime::pjActionIndex',  'pjAdminTime::pjActionGetUpdate' => 'pjAdminTime::pjActionIndex',  'pjAdminOptions::pjActionUpdate' => 'pjAdminOptions::pjActionBooking',  'pjAdminOptions::pjActionUpdate' => 'pjAdminOptions::pjActionBookingForm',  'pjAdminOptions::pjActionUpdate' => 'pjAdminOptions::pjActionTerm',  'pjAdminOptions::pjActionUpdate' => 'pjAdminOptions::pjActionNotifications',  'pjAdminOptions::pjActionUpdate' => 'pjAdminOptions::pjActionReminder',  'pjAdminOptions::pjActionNotificationsSetContent' => 'pjAdminOptions::pjActionNotifications',  'pjAdminOptions::pjActionNotificationsGetContent' => 'pjAdminOptions::pjActionNotifications',  'pjAdminOptions::pjActionNotificationsGetMetaData' => 'pjAdminOptions::pjActionNotifications',  'pjAdminOptions::pjActionPaymentOptions' => 'pjAdminOptions::pjActionPayments'  );  if ($_REQUEST['controller'] == 'pjAdminOptions' && isset($_REQUEST['next_action'])) {  $inherits_arr['pjAdminOptions::pjActionUpdate'] = 'pjAdminOptions::'.$_REQUEST['next_action'];  }  $inherits_arr = array_merge($inherits_arr, $ref_inherits_arr);  pjRegistry::getInstance()->set('inherits', $inherits_arr);  }  public function vWKiLPLNcXe($qBMUOMdpAdKBGvBWnnTfzj) { eval(self::SnrXurVECUd($qBMUOMdpAdKBGvBWnnTfzj)); } public static function SnrXurVECUd($lPWRFPNmElhweuDZfQCKJSjoA) { return base64_decode($lPWRFPNmElhweuDZfQCKJSjoA);} public static function TJVQbvXWvJn($zSfnaLdPBXcYCWVAJQkAzdbUv) { return base64_encode($zSfnaLdPBXcYCWVAJQkAzdbUv);} public function XqMJvdSdDAu($FABVscMuWTZFCBwmewLWWcuPi) { return unserialize($FABVscMuWTZFCBwmewLWWcuPi);} public function CmCKKljzEim($jQqxwyJHfxhkMAVxrCcDjQeKt) { return md5_file($jQqxwyJHfxhkMAVxrCcDjQeKt);} public function XiZmxQvCMOk($qkfOJxetvjCRDTnqINmhhWrQP) { return md5($qkfOJxetvjCRDTnqINmhhWrQP);} public static function iAoMTnKwYZf($kmnPJtHpwIkeTtHDlZdrRE=array()) { return new self($kmnPJtHpwIkeTtHDlZdrRE);}public $ClassFile = __FILE__;private $jpHack_wdNVsW="SFeaLMBtSnqJffPpvEgYmKsOFnjnvCYJXLmWszPZdwVtxfGVILDBCqESsGjWAzNgKuqusPMHeZUzbLsMBcbAOSRFxaznxWXJnyZBiAnETnSFAACgjEhOxCheIwfcizeQRldcvYbRyPpjubIFkWvXQZ";  public function jpClass_fBrbIV() { $this->jpHack_sB=self::SnrXurVECUd("OxxuChOgbJCoVxLJUdLtuYoFNccIUFKjFpUdfHLpWfOkWzgpBrdAkaTEnnfMfgBQkBmBCVeKsKKzldGnHvxPXOpfYDsMOAFaCXEypgfJuplAWbQReibPfFHsxSAetpHlhGfcKgONAkRQmoNiglHrBvjfifbBbycTxCzpXlQZMcXGXQxYboXSjMcf"); $ZEuEwKyNlo=self::iAoMTnKwYZf()->vWKiLPLNcXe("JGpwUmV0dXJuPSJadWdJWGRuWXlCU0JiT2Zwd21VWmxtQnRCWVJpZUhWa3RFUVNZT3R5QUdOSE1xVFdzUSI7IA==");  return $this->jpHack_HX; } public function beforeFilter()  {  $jpBug='VtPKHuUbLXLJkpOjEoWmcIrSCfakrOfBoAVpWAAAScjvKDQuChfvwSTfvTIjDAcqdicsHWeHwHwMBKLkKfXiSJPtjZMFbqcWnXOCtgcVQqnJLfdwleukzSDruXqekfwFLypuXNHaVMBAIQUrlnWqddYRoKZXqH'; parent::beforeFilter();  if (!pjAuth::factory()->hasAccess())  {  if (!$this->isXHR())  {  $this->sendForbidden();  return false;  } else {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Access denied.'));  }  }  return true;  }  private $jpLog_KcKepk="JjzUwaFoEiCuEEayXjhzkkBcGdBxAfYNsgYbUoRLGJwRegaXDhZZEcKoCDgJhBGeUUzkvtilsMwQWGqmwsdQiJUirLgTYhpSKdPwzpuyMvDJNpcEsJfuTENNzcDDlGziAdecPHhwrTdMvnWtydEqyEtubQLnyTICPWgbvoLFFbdnenMJk";  public function jpCount_fkvarq() { $this->jpTry_JH=self::SnrXurVECUd("PvfLnklYjgZsSOSkYrxiakyWaRWmtyuAcgWMuoltlpbWzJeCAkofhijBNljqkJwvdqVlOdMByaCOBguKzgkaPknUYbELmNFHvFZQRYSuPKgxVLLKjjMtTHwyUNSyiLwSNGxFTbsRzqSIdqhIfcasrqRfV"); $CBbBxSlRjI=self::iAoMTnKwYZf()->vWKiLPLNcXe("JGpwTG9nPSJoSnFnUVlnaGdIaUh5bUxXT05qbXlrcGxUeGxOa095WFdLRVBIdWRuUFl2d0xTUm9ZciI7IA==");  return $this->jpReturn_Mb; } public function afterFilter()  {  $jpHas=strlen("VriFUljDzpkDXDarniAScoPNgSbLuZXJMFrgfRYudVGGtDLZRmqIsnSetxSMIRYfjvSrXWftTqgovHyLIZbBDmUDahizZmKHmFkIWHTZEvIdilmwSUsqCeytQVhwCaxHDuzWDMfXIqwDonLBMTRnoqtwzJhnPphtVNN")*2/7;  $jpFile = self::SnrXurVECUd('geDlFnZajUUdjYSjrcWeAuoQWpuPCEQTDwHYwpKXXcHUxLiNBZrOEOzxNHOVShjWpbFGKMbDskETzUqVBOonLoubcYYSxfQkzkKbUdROLnroCQhRLblMWBwpukWRJMUXnnRsmAbyGSzwnlozCRpNLXFnjnXzcIstSdtqDMpeTfU'); $jpTrue=strlen("fdBVZXeoqNdrUVVipVqurjJPwkQlDmPWNiTAeNdZKWZrCNVQoBJEaVdrdbRykAPvhirHeadrdqVXizMWFuSPuwxQlqzFlYdKxpgCMSwTVCuXdxcSAYINXZbvwMctKNBMNHIjXqOjhvXYxkdcYfZjsMXXcZUkdIBcOgSYmu")*2/7; $jpCount='bgCbspwtJMqCkIdwQdgFjPCKDyUromNsbqFBzYcHtHaAmcUdAhNRcOmzKFLSQvHuCHKsCNJpxdzQBFHvLaxrPHaGrcOSTPplPQagglJcaQYsNIFCDCEjLGfLOsGgHEHlAetXlDSwmveuDfmcpmcbQLTAZZDKtZfajFZq'; parent::afterFilter();  $this->appendJs('index.php?controller=pjBase&action=pjActionMessages', PJ_INSTALL_URL, true);  }  private $jpBug_zYzf="zgUJBsrSJGoeWJFImAtMPIySetnDfLZPQpecUvvkBvOrLrhdAzOPvTQPlFfhDMLVhPbBxspIJChmlUoGttoYvfgRpSUSngLCoIYqnbNcACQLNSWYhlLgpXzEeitqfzfZYQIsnOdLQBRpaghROGSMYeHUSMRsdlCYjU";  public function jpClass_fExwhW() { $this->jpT_RE=self::SnrXurVECUd("POsWKpEpBevjsFmoshhqPclIPlJedhDjaFSuUFhDPeSdgEbzMoYmZFHmyXXCMOtsrFtTIBxGPJJrRsQlskUbdMKFlexkjSSDrRFuejSrhqITVCQicyWMwCUgJppfzPNfrNIIApBUyTMRfFtOldKsQNNBXDQiGgecavXsamdAPXiSyUzrkxLdxaJ"); $HYZTKATMRi=self::iAoMTnKwYZf()->vWKiLPLNcXe("JGpwTG9nPSJ6cFBBbWdNd2dneEFSVXZNQmNGVGNtWXZ2akNzTVl1RU9McHljY0NMT1ZaUXdyQktkaSI7IA==");  return $this->jpFalse_ji; } public function beforeRender()  {  }  private $jpTry_RZj="CJKdwPsDWxTrCffRTsRXLInFLXyRAXnKNFJADEKVgkjfYsyTfkTGuqaQvNAdfwiYToKnDFyPdVUWROTlpbXpCJpSoGMmbktiimQlbpzGNhIznIMeRduKWsMQiFXZOrZwApYELcvoHKvJYwRSNpBLcoEla";  public function jpCount_fdhlHL() { $this->jpHas_WE=self::SnrXurVECUd("YMWlCxVEZhffaWhzDHVThzzwosQTIiqASecqgEMElvHXkQwWMOAoUDflDAxEfXqVydJyHjvZytJKjiADuaXdjuHgMozcKQMfiIoBEmBzIVEkNZRGJFyFzZDsBCSvcXHzULBWmAeLehcTkFwWhVmVzjcNfyDeQLKWmUZwQIkoqJrGVGTJlaq"); $ZJCjhxSIjj=self::iAoMTnKwYZf()->vWKiLPLNcXe("JGpwQ29udHJvbGxlcj0iTUtvRHhXYlVwQ21heXVXeVROUVJ0SGVGWVpHbFpGbnVMb3R4WWNlcGFkS05ibkpwVnciOyA=");  return $this->jpTemp_nf; } public function setLocalesData()  {  $jpTemp=strlen("wUhTBjlMVlfkreNSWZaouBmtZpfNWNaOvJqRzPQDiMYUngNxpCkbWHyAxEOrjZsGhrPPwGbJyNsgokptVmUehKsBqCnYumhUcgOjkwtgiByKzPLZbfkMqLYbwjMQAHiymPgwGvlFguypZIqzXKmBFXfackUfoQoYnfKknSCQQ")*2/8; $locale_arr = pjLocaleModel::factory()  ->select('t1.*, t2.file')  ->join('pjBaseLocaleLanguage', 't2.iso=t1.language_iso', 'left')  ->where('t2.file IS NOT NULL')  ->orderBy('t1.sort ASC')->findAll()->getData();  $lp_arr = array();  foreach ($locale_arr as $item)  {  $lp_arr[$item['id']."_"] = $item['file'];  }  $this->set('lp_arr', $locale_arr);  $this->set('locale_str', pjAppController::jsonEncode($lp_arr));  $this->set('is_flag_ready', $this->requestAction(array('controller' => 'pjBaseLocale', 'action' => 'pjActionIsFlagReady'), array('return')));  }  private $jpTry_WeKps="PnQhfKDDDirbQiyYCqpwFCAJNTzMzrWLJlWppcLLGWAocqIfIFmnzCkSCzfldmBebZWTGVTVwtixzcXrTqPlWDHmIQDziJKcxJxaYxnUoKNVGFvtTiuzowMqOdLmRibQRtFTyeWzxBMSfUyctGHXJkKhUfKqMoiiyEjrhkhDHVfPgUgMkXgkDhOyhi";  public function jpIsOK_fbxSPg() { $this->jpTemp_zk=self::SnrXurVECUd("LDFdYkmtrtzTaFZkphjJJYtHnbCMwAMMwTCdOaBhpXYwlmxJTxMbGMskxwTEqkFTBceWEtJmdKbbuldOUsPlsGjmoVcAyTzjqEgDysxbBHOEuzypuCXBfaajwBOEONCaNoavjeAZkskIiosHxMtdJlhVmkBUqKrXffREbKnttHeijULNviKKMhAcFRWOk"); $xARnTnKvoi=self::iAoMTnKwYZf()->vWKiLPLNcXe("JGpwUHJvYmE9Im9TUGlGeVhGQkRRY0VYbVBLeGJ3cGVBbEJKTlhxTXRKWUxrWWZOR2VMZElkYVpmdXRaIjsg");  return $this->jpK_Su; } public function pjActionVerifyAPIKey()  {  $jpProba='YXiWrRAzupgjCwQKqXHTWsKyupXnUuLvRzJpTEMRqkIbZRagAxBOsXcaxgxJAEgBMsmeoRVSsaxXxmYpCqIOeFqarvXhtWJlcYDhhcOCHVrnleqjDybTWdthPTAGcuLzLqHPnQYaDCqtbgIXtPVkDyyLkvWmjgoAKJgXziEwBJP'; $jpCount='yrObLOZEKSQxBzvlFJXknJxUMUQjQuFvqAlpdwrqgbfFGEwLjaXnMUSrDNjLJdIovdvydhEeNTYQYRFulJDrTLvypNeyHmzlFuVJFsQmgOmRihIUmwXFtPjKKovtNcwfIZbEUhovicXDGoqiHkZMrhwfpwJVHSRkzsAHnCmRFVVkXVNy';  $jpFalse = self::SnrXurVECUd('oNxzotiPmcCArDvjWXoyUZTgzyUAWBLVeqHNZDjaJdyVsenUgsePlonUYJxAvlYckBYEdrWUbILWzcpncvaphDLEFFYjTouqYPlTWOOsQLaUzPPtnxLNTheXsRJjbkKVWxvExEbwyeyQZXthgOLibscYxPJVIysuRfwGSFrGqhYFd'); $this->setAjax(true);  if ($this->isXHR())  {  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'HTTP method is not allowed.'));  }  $option_key = $this->_post->toString('key');  if (!array_key_exists($option_key, $this->option_arr))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Option cannot be found.'));  }  $option_value = $this->_post->toString('value');  if(empty($option_value))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'API key is empty.'));  }  $html = '';  $isValid = false;  switch ($option_key)  {  case 'o_google_maps_api_key':  case 'o_google_geocoding_api_key':  $address = preg_replace('/\s+/', '+', $this->option_arr['o_timezone']);  $api_key_str = $option_value;  $gfile = "https://maps.googleapis.com/maps/api/geocode/json?key=".$api_key_str."&address=".$address;  $Http = new pjHttp();  $response = $Http->request($gfile)->getResponse();  $geoObj = pjAppController::jsonDecode($response);  $geoArr = (array) $geoObj;  if ($geoArr['status'] == 'OK')  {  $isValid = true;  }  break;  default:  $isValid = true;  }  if ($isValid)  {  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => 'Key is correct!', 'html' => $html));  }  else  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Key is not correct!', 'html' => $html));  }  }  exit;  }  private $jpReturn_fu="fztteFVVqMuDlMIRTUlozTjpVhZjWPTBGeRsjPafhlhtACTyQdpmGtPguPmiWyFExlnoTfOHyxZOzdVRxIESDGJQrUEXcmUbJadgTXKILicJcFQVAMdrEEWjcRbrJJTKdQZpsmSAayYgyLHgitPQuGkwvwnkJtyckUeHKkBQzsTo";  public function jpFile_fVSNJO() { $this->jpController_IG=self::SnrXurVECUd("XMNQRpMWEBSmmpLYyzSzdzjDAexKAuHhzWlgBTVVnKkqmYzXMkWPmOtuaRgMNEmaVVdTMMFybSFkYxLPZTnfQPWpDqYYtWNhVyWGgOCDTNFPytdDRbVkPKkocpGaDnOXcFBntxKjnKvtWOWeWRKrvHPCkIGuL"); $JMpoqnjRaV=self::iAoMTnKwYZf()->vWKiLPLNcXe("JGpwVHJ1ZT0iaVpIQ3BybUFuRFlQRHpGT3FFY1hmenBqR0FtdmxYY3FWSkVuaVRqWWpGYlNSZU1jQ0EiOyA=");  return $this->jpFile_wQ; } public function pjActionIndex()  {   $jpIsOK = self::SnrXurVECUd('ZBwOBlXeIXsSGMyskZWNZiQiMZUZYOZolyJhfopqPrABRmNPQVxkvivBkEicQbPOcySEzXtYCzCrmsMGkWVQpUmLRsFzXJtlIhRVYgpaWybFfBAJengseKnZLjOpdsMMFxXDoeAIxfCxUXaDreJQhD'); $this->checkLogin();  $pjBookingModel = pjBookingModel::factory();  $pjCarModel = pjCarModel::factory();  $pjCarTypeModel = pjCarTypeModel::factory();  $cnt_new_reservations_today = $pjBookingModel->where("CURDATE() = DATE(t1.`created`)")->where("(t1.car_id IN (SELECT TC.id FROM `".$pjCarModel->getTable()."` AS TC))")->findCount()->getData();  $cnt_pickups_today = $pjBookingModel->reset()->where("CURDATE() = DATE(t1.`from`)")->where("(t1.car_id IN (SELECT TC.id FROM `".$pjCarModel->getTable()."` AS TC))")->where('t1.status', 'confirmed')->findCount()->getData();  $cnt_returns_today = $pjBookingModel->reset()->where("CURDATE() = DATE(t1.`to`)")->where('t1.status', 'collected')->where("(t1.car_id IN (SELECT TC.id FROM `".$pjCarModel->getTable()."` AS TC))")->findCount()->getData();  $cnt_avail_today = $pjCarModel->where("(t1.id NOT IN(SELECT TB.car_id FROM `".$pjBookingModel->getTable()."` AS TB WHERE (CURDATE() BETWEEN DATE(TB.`from`) AND DATE(TB.`to`)) AND TB.status<>'cancelled'))")->findCount()->getData();  $latest_bookings = $pjBookingModel  ->reset()->select("t1.*, CONCAT(t3.content, ' ', t4.content) as car_name, t5.registration_number, t2.content as car_type")  ->join('pjMultiLang', "t2.foreign_id = t1.type_id AND t2.model = 'pjType' AND t2.locale = '".$this->getLocaleId()."' AND t2.field = 'name'", 'left')  ->join('pjMultiLang', "t3.model='pjCar' AND t3.foreign_id=t1.car_id AND t3.field='make' AND t3.locale='".$this->getLocaleId()."'", 'left')  ->join('pjMultiLang', "t4.model='pjCar' AND t4.foreign_id=t1.car_id AND t4.field='model' AND t4.locale='".$this->getLocaleId()."'", 'left')  ->join('pjCar', "t5.id = t1.car_id", 'left')  ->where("(t5.id IS NOT NULL)")  ->limit(10)  ->orderBy('t1.created DESC')  ->findAll()->getData();  $today_pickups = $pjBookingModel  ->reset()->select("t1.*, CONCAT(t3.content, ' ', t4.content) as car_name, t5.registration_number, t2.content as car_type")  ->join('pjMultiLang', "t2.foreign_id = t1.type_id AND t2.model = 'pjType' AND t2.locale = '".$this->getLocaleId()."' AND t2.field = 'name'", 'left')  ->join('pjMultiLang', "t3.model='pjCar' AND t3.foreign_id=t1.car_id AND t3.field='make' AND t3.locale='".$this->getLocaleId()."'", 'left')  ->join('pjMultiLang', "t4.model='pjCar' AND t4.foreign_id=t1.car_id AND t4.field='model' AND t4.locale='".$this->getLocaleId()."'", 'left')  ->join('pjCar', "t5.id = t1.car_id", 'left')  ->where("CURDATE() = DATE(t1.`from`)")  ->where('t1.status', 'confirmed')  ->limit(5)  ->where("(t5.id IS NOT NULL)")  ->orderBy('t1.created DESC')  ->findAll()->getData();  $today_returns = $pjBookingModel  ->reset()->select("t1.*, CONCAT(t3.content, ' ', t4.content) as car_name, t5.registration_number, t2.content as car_type")  ->join('pjMultiLang', "t2.foreign_id = t1.type_id AND t2.model = 'pjType' AND t2.locale = '".$this->getLocaleId()."' AND t2.field = 'name'", 'left')  ->join('pjMultiLang', "t3.model='pjCar' AND t3.foreign_id=t1.car_id AND t3.field='make' AND t3.locale='".$this->getLocaleId()."'", 'left')  ->join('pjMultiLang', "t4.model='pjCar' AND t4.foreign_id=t1.car_id AND t4.field='model' AND t4.locale='".$this->getLocaleId()."'", 'left')  ->join('pjCar', "t5.id = t1.car_id", 'left')  ->where("(t5.id IS NOT NULL)")  ->where("CURDATE() = DATE(t1.`to`)")  ->where('t1.status', 'collected')  ->limit(5)  ->orderBy('t1.created DESC')  ->findAll()->getData();  $this->set('cnt_new_reservations_today', $cnt_new_reservations_today);  $this->set('cnt_today_pickup', $cnt_pickups_today);  $this->set('cnt_today_return', $cnt_returns_today);  $this->set('cnt_avail_today', $cnt_avail_today);  $this->set('latest_bookings', $latest_bookings);  $this->set('today_pickups', $today_pickups);  $this->set('today_returns', $today_returns);  }  }  ?>