<?php
/*
	CoinPayments.net API Example
	Copyright 2016 CoinPayments.net. All rights reserved.	
	License: GPLv2 - http://www.gnu.org/licenses/gpl-2.0.txt
*/
    require('coinpayaments.inc.php');
    $publickey="67103a2bc4efbaf1fa6278f9164e78747c6d6dd4571a380d208be73022750d12";
    $privatekey="7b7b10A33648c6F5612f400e4dA56969f29b210a6df9a388f0d1Cccf3E1ac5CC";
	$cps = new CoinPaymentsAPI();
	$cps->Setup($privatekey, $publickey);

	$result = $cps->CreateTransactionSimple(10.00, 'USD', 'BTC', '', 'https://thairex.win/', 'gopal.ghimire332@gmail.com');
	if ($result['error'] == 'ok') {
		$le = php_sapi_name() == 'cli' ? "\n" : '<br />';
		print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
		print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
		print 'Status URL: '.$result['result']['status_url'].$le;
	} else {
		print 'Error: '.$result['error']."\n";
	}
