<?php

/* CLASS CODE BLOCK */	
	class Log{
		public $logFile;
		public $fileName;
		public $filePath;
		private $logDirectory = "log/";
		public $user;
		public $timeStamp;

		function __construct(){
			/* inicializiraj log file*/
			//echo("inicializacija Log classa\n");
			$this->fileName = date("Y-m-d",time()). ".log";
			//echo("<br>");
			//var_dump($this->fileName);
			$this->filePath = $this->logDirectory . $this->fileName;
			$this->logFile = fopen($this->filePath, "a+", "w");
			//echo("<br>");
			//var_dump($this->logFile);
		}

		public function writeLog($logMsg, $lineNumber){
			echo("<br>");
			echo("pišem log");
			$this->timeStamp = date("Y-m-d H:i:s",time());
			$logMsg = $this->timeStamp . " --> " . $logMsg;
			$logMsg = $lineNumber == null ? $logMsg : $logMsg . " in line $lineNumber.";
			file_put_contents($this->filePath, $logMsg."\n", FILE_APPEND);
		}

		public function closeLog(){
			fclose($this->logFile);
		}
	}

	class Register{
		private $objGET;
		public $error = "";
		public $result;
		public $stopExecutingCode = false;

		public $name = "";
		public $surrname = "";
		public $email = "";
		public $password = "";

		function __construct($obj){
			try{
				$this->objGET = $obj;
				if(!isset($this->objGET)){
					$this->stopExecutingCode = true;
					return;
				}


				$this->name = $this->objGET["name"];
				$this->surrname = $this->objGET["surrname"];
				$this->email =$this->objGET["email"];
				$this->password = $this->objGET["password"];

			}catch(Exception $ex){
				$this->stopExecutingCode = true;
				$this->error = $ex->getMessage;
			}
		}
	}

/* MAIN CODE BLOCK*/

try{

	$log = new Log();

	//$log->writeLog("Test Log line1",1);
	

	$reg = new Register($_GET);
	if($reg->stopExecutingCode) { 
		if($reg->error!=""){
			$log->writeLog("Exception: ". $reg->error);
		}
		die(); 
	}

	$log->writeLog("Submitted name:".$reg->name,null);
	$log->writeLog("Submitted last name:".$reg->surrname,null);
	$log->writeLog("Submitted email:".$reg->email,null);
	$log->writeLog("Submitted password:".$reg->password,null);


}catch(Exception $ex){
	$log->writeLog($ex->getMessage, $ex->getLine());
	
}
/*
	$reg = new Register($_GET);
	if($reg->stopExecutingCode) {

		die();
	}

*/


/*
	$name = $_GET["name"];
	$surrname = $_GET["surrname"];
	$email = $_GET["email"];
	$password = $_GET["password"];

	$userlist = fopen("userlist.txt", "w");


	foreach($userlist as $line) {
	   echo $line. "\n";
	}

	//fwrite($userlist, $name."|".$surrname."|".$email."|".$password);

*/
	die();


?>