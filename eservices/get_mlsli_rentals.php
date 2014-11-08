<?php @include_once('login.php'); ?>
<pre>
<?php

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
	$search = $rets->SearchQuery(
		'Property',								// Resource
		'RentalHome' ,										// Class
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
		while($data = $rets->FetchRow($search)) {
			print_r($data);
		}
	} else {
		echo '0 Records Found';
	}

	$rets->FreeResult($search);
	$rets->Disconnect();
} else {
	$error = $rets->Error();
	print_r($error);
}

?>
</pre>
