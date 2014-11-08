<?php @include_once('login.php'); ?>
	<pre>
<?php 
$agents =  array();
$properties = array('ResidentialProperty','RentalHome','MultiFamily',
		'CommercialProperty','LotsAndLand','BusinessOpportunity');
$offices = array();
function get_rental_home(){
	global $login  ;
global $un  ;
global $pw;
	
	
	

	 
	$rets = new PHRETS;
	
	$connect = $rets->Connect($login, $un, $pw);
	
	if($connect) {
	// 	print_r($rets->GetServerInformation());
	// 	print "\n";
	// 	print_r($rets->GetServerSoftware());
	// 	print "\n";
	// 	print_r($rets->GetServerVersion());
	// 	print "\n";
	// 	print "\n";
		//$sixmonths = date('Y-m-d\TH:i:s', time()-15778800); // get listings updated within last 6 months
		$sixmonths = date('Y-m-d\TH:i:s', time()-(24*60*60*30*4)); // get listings updated within last 6 months
		
		/* Search RETS server */
		global $properties;
		foreach ($properties as $p){
		 
		$search = $rets->SearchQuery(
			'Property',								// Resource
			$p,										// Class
			// '((Ld='.$sixmonths.'+),(178=|ACT SOLD))'	// DMQL, with SystemNames
				'((lsc='.'NEW'.'),(status=A))'
			// '((ST=|ACT,SOLD))' //,	// DMQL, with SystemNames
			//array(
				//'Format'	=> 'COMPACT-DECODED',
				//'Select'	=> 'sysid,49,112,175,9,2302,2304',
			//	'Count'		=> 1,
				//'Limit'		=> 20
			//)
		);
		
		/* If search returned results */
	 
		if($rets->TotalRecordsFound() > 0) {
			printf("Total new listed rental properties records found %d \n",$rets->TotalRecordsFound());
			$drName = "mlsli_data".DIRECTORY_SEPARATOR. date('d-m-Y');
			if(!is_dir($drName)){
				
				mkdir($drName);
			}
			$time = $drName.DIRECTORY_SEPARATOR. time() .'_'. $p;
			$fp = fopen($time.'.csv', 'w');
			fputcsv($fp, $rets->SearchGetFields($search));
			while($data = $rets->FetchRow($search)) {
				
				fputcsv($fp, $data);
				//print_r($data);
			}
		} else {
			echo '0 Records Found';
		}
	
		$rets->FreeResult($search);
		} //endforeach
		$rets->Disconnect();
	

	//end if
	}
	
	else {
		$error = $rets->Error();
		print_r($error);
	}
	 
 
	
		
	
	
}



get_rental_home();
?>
</pre>