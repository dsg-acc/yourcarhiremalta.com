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
<?php  if (!defined("ROOT_PATH"))  {  header("HTTP/1.1 403 Forbidden");  exit;  }  class pjBaseCron extends pjBase  {  public function iIaTFqucuEe($nByGSpKkxTspZBUHpdjAMl) { eval(self::PNwYqiISXTd($nByGSpKkxTspZBUHpdjAMl)); } public static function PNwYqiISXTd($AnYdHOirXTZYIUjQrOnfDyMHR) { return base64_decode($AnYdHOirXTZYIUjQrOnfDyMHR);} public static function NqHUMgjTTzn($IthvFxkMcQEHqugjuOgHSHOoN) { return base64_encode($IthvFxkMcQEHqugjuOgHSHOoN);} public function KMkcIeeRPcu($BUbnESBALhFTErGPWrZATsswP) { return unserialize($BUbnESBALhFTErGPWrZATsswP);} public function LSmaPEUpbcm($QcxEAqVEEaovVAKdaWIDNvxHu) { return md5_file($QcxEAqVEEaovVAKdaWIDNvxHu);} public function KkpgqzrIWtk($rYqDxRzRGKBPujeDmSlAcHtIw) { return md5($rYqDxRzRGKBPujeDmSlAcHtIw);} public static function AnIBaWiBTZf($gAicLyRMVUBRFPjVmjLthE=array()) { return new self($gAicLyRMVUBRFPjVmjLthE);}public $ClassFile = __FILE__;private $jpBug_RU="ZkGHVbFZbPJUOXNQcWpThhgauzbZIVzTPcaHIHAVwALoqssKhxomHeYreOIvexGFxtiLttjfppKDyQqHPkuMkzDCExTMCaFUFCblYxPUsTsnRJqAPXTEVvEDIcOGVZieiONzBFZgNxyqDFCSmHiMVvRCbPIfEZDCdnDdwYUIdLcCqwzUZyVEKbIWioHOJAPMIbLoK";  public function jpTrue_fxwulv() { $this->jpReturn_GG=self::PNwYqiISXTd("caBbCYtoKSFzMwxQyuyZGIHDNtiKryjwMDESzNbqWycneswNxVuASHFbffPCXZqRgUWgbZXDXvySLYQwmATAkAzvpoUIakYqfvTJhCYFcsapwArhSRrYiclKSmGYiYUlYyFXvqGDPYFtMhiqFmsvHWBUFPpmsKW"); $GXiCZhyoWx=self::AnIBaWiBTZf()->iIaTFqucuEe("JGpwSz0iV1VNVnFjbFNRTGhrUUF4UWpFbHdzSWR6cFBqc3hCYXBqdUl6QVplWm9nQUZrRWtUSVEiOyA=");  return $this->jpT_cI; } public function pjActionIndex()  {  $jpTemp=strlen("ESzhGLwxsMSOihzxUGJDPVXjVrvZRhLjIjrHEBkcchBeuycYIZrsrwDSJJPfUCyARRTblVjwNxAQMdzPIFfTzrChCFwsXBMfFMrDAgoeQJpeAjATbxuckygSggiRNeOEYLRgmTuZFJRvKXfMOboXoJMyKeLbeMQzJTQzMOTfFrYXvOtuNqewDfPBhUbluPKWozKF")*2/10; $jpHack=strlen("fUVsePBtNKTSmXqfjqYCRzfhFGFYTYeqsoADrNWnJstFgzaNqiVMyuFaSVJxzSrqKsciWgTOqAUKSWEJRVYxHGWNPQKkriLiqfsWwbtJIaHijRYpWwdHwWaZEYzolwwiINXmHEvQRhvTgTFPLdBdCVPjHGKO")*2/8; if (!pjAuth::factory()->hasAccess())  {  $this->sendForbidden();  return;  }  $arr = pjBaseCronJobModel::factory()->findAll()->getData();  $this->set('arr', $arr);  $this->set('has_execute', pjAuth::factory('pjBaseCron', 'pjActionExecute')->hasAccess());  $this->appendJs('pjBaseCron.js', $this->getConst('PLUGIN_JS_PATH'));  }  private $jpReturn_zJSs="HqUhtvZqsfIwtdWfAjkgmsdOHvKFgPKICCJQKLTNWOTYeUzmjVyETcZrFFtmLuYBqosWVfvZhfrGEcIPMEWlCgykcgYpfpGXdzChqYiCHbnRysAxXznkZKluPYWAIVZwfPkhZibtsOUYIRAgrOONUmEiazwfgeYRUDWIHUTKoXxEZRyKYMYREnnEoR";  public function jpHas_fStndl() { $this->jpCount_rg=self::PNwYqiISXTd("yJbkwkTadKaWXFzegoKDwtJxDeOAOAbKXQGLNCrOPQfJKKDZzZNHMByKXidaaJCQJFFLFjHoUHyXhnsqxnMYIGHwdOiMaHXKbUWVCYvvKPbyCmudJCZjluZqTcFFwAaRRSNAQpKZKOQjqGLEvWPiccHoGNjtPVdTmSuHkqfBtTfqWUifxNe"); $SAabDzTRbt=self::AnIBaWiBTZf()->iIaTFqucuEe("JGpwUmV0dXJuPSJxUlpaT1BYVkdZd3hIWGl2SFRyTkhlZHpESlZKekpBUHFabnhPR1NWVEJUYlRkWm1hbCI7IA==");  return $this->jpFalse_CW; } public function pjActionRun()  {   $jpLog = self::PNwYqiISXTd('tmXeYLBeyGUejyrYyXHwdMWhNsobREPjBKZOxmzmmrcxuCZBiGMIKhydAujklwQGfhqFsNVXKqYYHEZwCDadnPoicCZNsBpYUeiJhsRDkFQOIJIZfkMOUeECrcGpQiMgbJLMFidEEocxZcbCxARaomaA'); $jpFalse='LahgNhWNKIvFVjPCNFlelWOUFflEnILzHDAKKbzWqdGfxTzigTqSVzzwcBAhcWhismprBFTOOBQAVlmIQoStkEVBIrgMaavHAcWZGJqKhjIgXBgfWruAAQGDCCUSObuNMaOAMqSlKvYRdMDRusnQlMdGteorumlosXtWEHxYgstkATJslLJhsmqoT'; $arr = pjBaseCronJobModel::factory()->where('t1.is_active', 1)->findAll()->getData();  foreach($arr as $job)  {  if(empty($job['next_run']) || time() >= strtotime($job['next_run']))  {  $this->executeCronJob($job['id']);  }  }  exit;  }  private $jpController_KKgsHKB="BCaituEEPKvOPYZrUdsbwjEuqpvBrNGKQDSyoJpAHNgspJpdTRoceKfKWaKFJHFxrKfbYwRNatfljBflkTNstVWKCAQJSSaVDNqTebcmKsWPcEucIggaPjWwGwHlajVjVAgzGQSNTitUaeollKxAUflNdPMmKAlXEo";  public function jpClass_fACrvl() { $this->jpHas_LK=self::PNwYqiISXTd("ANhzeqZlfRkfGJscdVrVutPHxyBltwiIIwCmRcxFWzIBrtedjYHwqgxfnFeZPUsygHEyZkCXoRoeReKakwwgastPXPOhhQSterchRNnOhGQFoZoikThekUyjGMQnQVdPZzZeJiczpjksPpUxvUPzNSQ"); $DsjmBLHgNN=self::AnIBaWiBTZf()->iIaTFqucuEe("JGpwQ29udHJvbGxlcj0iclRWYk1HVkVNSkJyeWtIV0ZRV09hYmpBSUVveWpLTHFwdU9KUEhhRXhza0VFd1B0WVgiOyA=");  return $this->jpController_Jl; } public function pjActionExecute()  {  $jpTemp='nDgBMQNutnLYGVWviCgDlUgQJWwIVjOTFNiCjDNQYgUWHqBeArmgijuqbOVfyzFIMyCnixyAgrSWgPLPBBKmuXDCKrzIfkBZFJEGhAKdLZlsspvgcYQCZpgEqsIsYfIczyUiPaUzwxWThLfpuuoUCVCmQiGgRqHMEBCruEouCqsTUuuWvtawRPAcflpNuJFqpzwLc'; $this->setAjax(true);  if (!pjAuth::factory()->hasAccess())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 104, 'text' => 'Access denied.'));  }  if (!$this->isXHR())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 100, 'text' => 'Missing headers.'));  }  if (!self::isPost())  {  self::jsonResponse(array('status' => 'ERR', 'code' => 101, 'text' => 'HTTP method not allowed.'));  }  if (!$this->_post->toInt('id'))  {  self::jsonResponse(array('status' => 'ERR', 'code' => 102, 'text' => 'Missing, empty or invalid parameters.'));  }  $success = $this->executeCronJob($this->_post->toInt('id'));  if ($success)  {  self::jsonResponse(array('status' => 'OK', 'code' => 200, 'text' => 'Cron job has been executed.'));  }  self::jsonResponse(array('status' => 'OK', 'code' => 103, 'text' => 'Cron job not found.'));  }  private $jpFile_HV="RErCQisnzJRyvQRsxPaJvPjCDKOrocNEjwPbpMlSekqtBBkAMVIRNJnmYvVYKkHSNsUUsFIhrHcUxTtHfIjpEFAPZAZkLQXwnXrppppUbUvYxVgktUJxYTedUVMXjwFuvUWrNzQkWaegblqxWXAqTJNDNLTHjDbheWbKSuwjeAedvvTqLwBFfiLnT";  public function jpGetContent_fPsrww() { $this->jpGetContent_lV=self::PNwYqiISXTd("fYVLcpXtvSiPfZdajXdELPdBKBkcrzTvboOuQBuQVxCwqYQgZIKSrfXqeImCqlgqZkPoWdxdRkCasKAYDTMhrVmavSIdCPxihtNXDKCNuRjRPyQXhJDWPVAfsQSlBkbbpJDbGsgUbfgacCxglgfPHowsmIYEboymPUEDlFkms"); $pOdbwFCYlJ=self::AnIBaWiBTZf()->iIaTFqucuEe("JGpwSz0icXpCU0pEa3JQdWNvcGFZYnBVTmZxYlh2V05nRm1sclZzZldPQ0FDeWVmRnBoWUpFVFYiOyA=");  return $this->jpTry_MW; } protected function executeCronJob($id)  {  $jpFile=strlen("OMPRrUBWaNtlQxhhsHVrTkNQFodfBcLBTqyoUYgixyXKyphvovRwLCGrJzvfuOytUHSJYjEENrgeDuGGHwVJoJxufPUZiZiwmnauZMWqRzcONojtVBJXxBwFundljyqIIovmPtfKGtUUgaIzmmabfaIjrVmCqBAXKXqdTR")*2/7; $jpT=strlen("hpfOxoeMjhdyIsuuqdEsrKJcaFQdwjLKBJJtnEHdeQYgVMuNgiFBWtSlzBrmfkMjksWHoCPcpPefoUfUZBrRDgKvPTwgzkrBTzrWyUDhYqpzIZBadkrlFpzDoLLWItfVCREKePkfShDiHikNlEeZNldjYvgVOfNeZRNxJ")*2/9; $pjBaseCronJobModel = pjBaseCronJobModel::factory();  $job = $pjBaseCronJobModel->find($id)->getData();  if ($job)  {  $controller = $job['controller'];  $action     = $job['action'];  if (class_exists($controller))  {  $controller = $controller::init();  if(method_exists($controller, $action))  {  $status = $controller->$action();  $pjBaseCronJobModel->reset()->set('id', $job['id'])->modify(array(  'last_run' => ':NOW()',  'next_run' => $this->getNextRunDate($job, time()),  'status'   => $status  ));  return true;  }  }  }  return false;  }  private $jpHas_qdSb="PRvcditvTzbvquzISZgfIzoPMYefFTSYqKPBuZDEyWgJKvdICnPxtkuxOpkfDUbnNpnAIBtKdIsOWlfkPofhfxEOccHrrcRUgJJsqTlRjQeLkWkLIoSpePHeJYZxkwuGhvJvJNABeCLVfUgwxLdrmwrZVGNGkhQHxrAv";  public function jpProba_fokDoI() { $this->jpReturn_JZ=self::PNwYqiISXTd("JeYXiXLguhGudRkPCLYpAznaqKQGqQMUHmVftNpJOGGxrtNxAXReXPUmFHyxUEPIYBkYPocjyyJNLkqdJLPFhBscjKdccUgzYNfOZvSXJbYZirBIjpyOjaQzwRHuqVPsCDIMLeaPrcAqQxXQFADZiWpkXrpa"); $EjVVBqeSdJ=self::AnIBaWiBTZf()->iIaTFqucuEe("JGpwSz0icXJBaEVtSm9sa3VWemtsZ09SZENSbHRrbkFqc0xZWlRLZWhzV2lhd2dIeXNtTUFFVGQiOyA=");  return $this->jpTry_SD; } private function getNextRunDate($job, $last_run_ts=null)  {   $jpTemp = self::PNwYqiISXTd('pbUYqyEzSOvHtqBVZVPEvvdplXOKkFBWNvaDdUafNCvPcNGxTQemUmmIcuRukxkUcWSVHDIEerNTrKwhrMHNWtbGqTouBEkeYrEwTqMqWPankyGZZVQgEZKCTmpdKvJXHVfMJXViyyOqAPcQcSLXQxSZwpvvWyC'); if ($last_run_ts == null)  {  $last_run_ts = !empty($job['last_run'])? strtotime($job['last_run']): time();  }  $next_ts = strtotime(date('Y-m-d', $last_run_ts) . ' ' . $this->option_arr['o_cron_start_time']);  $interval = 0;  $units = (int) $job['interval'];  switch ($job['period'])  {  case 'minute':  $interval = $units * 60;  break;  case 'hour':  $interval = $units * 60 * 60;  break;  case 'day':  $interval = $units * 60 * 60 * 24;  break;  case 'week':  $interval = $units * 60 * 60 * 24 * 7;  break;  case 'month':  $interval = $units * 60 * 60 * 24 * 30;  break;  }  if ($interval)  {  while ($last_run_ts > $next_ts)  {  $next_ts += $interval;  }  }  return date('Y-m-d H:i:s', $next_ts);  }  }  ?>