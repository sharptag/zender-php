<?php 

	class ZenderMessage {
		
		private $apiKey; 
		
		public function __construct($apiKey) 
		{ 
			$this->apiKey = $apiKey;
		}
		
		var $recipient; 
		function set_recipient($new_recipient) { 
			$this->recipient = $new_recipient;  
 		}
 
   		function get_recipient() {
			return $this->recipient;
		}
		
		var $cc; 
		function set_cc($new_cc) { 
			$this->cc = $new_cc;  
 		}
 
   		function get_cc() {
			return $this->cc;
		}
		
		var $bcc; 
		function set_bcc($new_bcc) { 
			$this->bcc = $new_bcc;  
 		}
 
   		function get_bcc() {
			return $this->bcc;
		}
		
		var $from; 
		function set_from($new_from) { 
			$this->from = $new_from;  
 		}
 
   		function get_from() {
			return $this->from;
		}
		
		var $fromName; 
		function set_fromName($new_fromName) { 
			$this->fromName = $new_fromName;  
 		}
 
   		function get_fromName() {
			return $this->fromName;
		}
		
		var $subject; 
		function set_subject($new_subject) { 
			$this->subject = $new_subject;  
 		}
 
   		function get_subject() {
			return $this->subject;
		}
		
		var $body; 
		function set_body($new_body) { 
			$this->body = $new_body;  
 		}
 
   		function get_body() {
			return $this->body;
		}
		
		var $isBodyHtml; 
		function set_isBodyHtml($new_isBodyHtml) { 
			$this->isBodyHtml = $new_isBodyHtml;  
 		}
 
   		function get_isBodyHtml() {
			return $this->isBodyHtml;
		}
		
		function sendMail() {
			$service_url = 'http://zender.sharptag.com/api/mail/post';
			$curl = curl_init($service_url);
			$curl_post_data = array(
					'APIKey' => $this->apiKey,
					'To' => $this->recipient,
					'Bcc' => $this->bcc,
					'CC' => $this->cc,
					'From' => $this->from,
					'FromName' => $this->fromName,
					'Subject' => $this->subject,
					'Body' => $this->body,
					'IsBodyHtml' => $this->isBodyHtml
			);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
			$curl_response = curl_exec($curl);
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
			curl_close($curl);
			$decoded = json_decode($curl_response);
			if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
				die('error occured: ' . $decoded->response->errormessage);
			}
		}
	} 
?>