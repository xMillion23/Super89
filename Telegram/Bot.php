<?php
   require('coinpayaments.inc.php');
   require('conn.php');
   ini_set('error_reporting', E_ALL);
   
   $botToken = "508934809:AAHRVz5iv3FW49GxJS1SIPVQ6qliy0yQHp4";
   $website = "https://api.telegram.org/bot".$botToken;
   $publickey="67103a2bc4efbaf1fa6278f9164e78747c6d6dd4571a380d208be73022750d12";
   $privatekey="7b7b10A33648c6F5612f400e4dA56969f29b210a6df9a388f0d1Cccf3E1ac5CC";
   $FilejSon = file_get_contents("php://input");
   $FilejSon = json_decode($FilejSon, TRUE);
   
   $Username = $FilejSon["message"]["chat"]["username"]; // Otteniamo il nome utente
   $ChatId = $FilejSon["message"]["chat"]["id"]; // Otteniamo la chatId ovvero l'ID univoco dell'utente su Telegram
   $Message = $FilejSon["message"]["text"]; // Otteniamo il messaggio
   
   $cps = new CoinPaymentsAPI();
   $cps->Setup($privatekey, $publickey);
   
   $moneyarray=array("BTC -","ETH -","XRP -","BCH -","LTC -","NEO -","XMR -","DASH -","XEM -","ETC -","LSK -","ZEC -""XVG -","BCN -","DOGE -");

   if(is_numeric($Message)){
    $sql="select prevcmd as total from commands where id='".$ChatId ."'";
    $result=$conn->query($sql);
    $data=$result->fetch_assoc();
    $currency=$data['total'];
    $currency=str_replace(" -","",$currency);
  addpayment($Message,$currency,$ChatId)  ;
      exit;
   }

   switch ($Message) {
      case '/start':
          $msg = "<b>★ Large auctions. Huge profit. ★</b>".PHP_EOL.PHP_EOL."<b>Welcome to Cloudster $GLOBALS[Username]!</b>".PHP_EOL.PHP_EOL."<b>★ Your lifelong passive income. ★</b>";
          TastieraBenvenuto($ChatId, $msg);
          break;
          
      case "✕ Menu ✕":
          $msg = "<b>★ Large auctions. Huge profit ★</b>";
          TastieraBenvenuto($ChatId, $msg);
          break;
      
      case "💰 Available Balance 💰":
          $msg = "<b>Current interest rate: 0.50% Daily Forever.</b>";         
          $msg1 = "BTC Balance: 1.00000000".PHP_EOL."ETH Balance: 1.00000000".PHP_EOL."BCH Balance: 1.00000000".PHP_EOL."LTC Balance: 1.00000000".PHP_EOL."XMR Balance: 1.00000000".PHP_EOL."DASH Balance: 1.00000000".PHP_EOL."LSK Balance: 1.00000000".PHP_EOL."ZEC Balance: 1.00000000".PHP_EOL."DOGE Balance: 1.00000000";
          $msg2 = "You may add funds to your account by pressing <b>Invest</b> button. After adding your funds will be grow up according <b>Current interest rate</b> and your <b>Referals.</b>";
          inviaMessaggio($ChatId, $msg);
          inviaMessaggio($ChatId, $msg1);
          inviaMessaggio($ChatId, $msg2);
          break;
          
      case "💳 Invest":
          $msg = "You may invest anytime and as much as you want. After transfer funds will be added to your account during an hour. Happy investing!";
          $msg1 = "Select the coin you want to invest";
          inviaMessaggio($ChatId, $msg);
          TastieraInvest($ChatId, $msg1);
          break;
          
      case "~ BTC":
          $msg = "Your withdraw address is <b> not set </b>".PHP_EOL."Please input new address for withdraw  ".$ChatId;
          if(!isset($ChatId, $msg));
          if(isset($ChatId, $msg1));
          inviaMessaggio($ChatId, $msg2);
          break;
          
      case "Withdraw 💼":
          $msg = "Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.";
          $msg1 = "Select the coin you want to invest";
          inviaMessaggio($ChatId, $msg);
          TastieraWithdraw($ChatId, $msg1);
          break;
         
      case "👥 My Team":
          $msg = "Your reference link:";
          $msg1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis, ligula sed tincidunt viverra, mi.";
          $msg2 = "Your referals:";
          inviaMessaggio($ChatId, $msg);
          inviaMessaggio($ChatId, $msg1);
          inviaMessaggio($ChatId, $msg2);
          break;
          
          
      case "Extra 🌍":
          $msg = "🌐 Statistic:".PHP_EOL.PHP_EOL."♛ Days online: ".PHP_EOL."♛ Total players: ".PHP_EOL."♛ New players in 24h: ";
          $msg1 = "Currency reserve: ".PHP_EOL.PHP_EOL."1.00000000 BTC = ".PHP_EOL."ETH =".PHP_EOL."XRP =".PHP_EOL."BCH =".PHP_EOL."LTC =".PHP_EOL."XMR =".PHP_EOL."DASH =".PHP_EOL."LSK =".PHP_EOL."ZEC =".PHP_EOL."DOGE =";
          inviaMessaggio($ChatId, $msg);
          TastieraInlineInfo($ChatId, $msg1);
          break;
          
      default:
      $moneyarray=array("BTC -","ETH -","XRP -","BCH -","LTC -","NEO -","XMR -","DASH -","XEM -","ETC -","LSK -","ZEC -""XVG -","BCN -","DOGE -");
      if(in_array($Message,$moneyarray)){


     $sql="select count(*) as total from commands where id='".$ChatId ."'";
      
    $result=$conn->query($sql);
    $data=$result->fetch_assoc();
    $has=$data['total'];

     $sql1="";

     if($has>0){
      $sql1="update commands set prevcmd='". $Message."' where id='".$ChatId ."'";
     }else{
      $sql1="insert into commands values('".$ChatId."','". $Message ."')";
     }

    if($conn->query($sql1)) {
      $msg = "Please enter a amount you want to invest ";
      inviaMessaggio($ChatId, $msg);
   } else{
    $msg = "⚠️ Some error occured, Please try again after 10 second";
    inviaMessaggio($ChatId, $msg);
   } 

      
          //someaction
      }else{
          $msg = "⚠️ Unknow Command";
          inviaMessaggio($ChatId, $msg);
      }
          
          break;
   }
   
   
   
   
   
   function inviaMessaggio($chat_id, $text)
   {
       $url = $GLOBALS['website']."/sendMessage?chat_id=".$chat_id."&parse_mode=HTML&text=".urlencode($text);
       file_get_contents($url);
   }
   
   
   function TastieraBenvenuto($chat_id, $text)
   {
       $tastiera_1 = '&reply_markup={"keyboard":[["💰%20Available%20Balance%20💰"],["💳%20Invest","Withdraw%20💼"],["👥%20My%20Team","Extra%20🌍"]],"resize_keyboard":true}';
       $url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&parse_mode=HTML&text=".urlencode($text).$tastiera_1;
       file_get_contents($url);
   }
   
   
   function TastieraInvest($chat_id, $text)
   {
       $tastiera_2 = '&reply_markup={"keyboard":[["BTC%20-","ETH%20-","XRP%20-","BCH%20-","LTC%20-"],["NEO%20-","XMR%20-","DASH%20-","XEM%20-","ETC%20-"],["LSK%20-","ZEC%20-","XVG%20-","BCN%20-","DOGE%20-"],["✕%20Menu%20✕"]],"resize_keyboard":true}';
       $url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&parse_mode=HTML&text=".urlencode($text).$tastiera_2;
       file_get_contents($url);
   }
   
   
   function TastieraWithdraw($chat_id, $text)
   {
       $tastiera_3 = '&reply_markup={"keyboard":[["BTC%20.","ETH%20.","XRP%20.","BCH%20.","LTC%20."],["NEO%20.","XMR%20.","DASH%20.","XEM%20.","ETC%20."],["LSK%20.","ZEC%20.","XVG%20.","BCN%20.","DOGE%20."],["✕%20Menu%20✕"]],"resize_keyboard":true}';
       $url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&parse_mode=HTML&text=".urlencode($text).$tastiera_3;
       file_get_contents($url);
   }
   
   
   function TastieraInlineInfo($chat_id, $text)
   {
       $tastiera_4 = '&reply_markup={"inline_keyboard":[[{"text":"💹%20Exchange","url":"https://test.com"}]]}';
       $url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&parse_mode=HTML&text=".urlencode($text).$tastiera_4;
       file_get_contents($url);
   }
   
   
   function GetPrice($chat_id, $text)
   {
       $url = "https://api.coinmarketcap.com/v1/ticker/bitcoin/";
       $fgc = file_get_contents($url);
       $json = json_decode($fgc, true);
       
       $price = $json["price_usd"];
   }

   function addpayment($amount,$cur,$cid){
    $result = $GLOBALS['cps']->CreateTransactionSimple((float)$amount, $cur, $cur, '', 'https://thairex.win/', 'gopal.ghimire332@gmail.com');
    if ($result['error'] == 'ok') {
        $msg="";
        $msg.= 'Transaction created with ID: '.$result['result']['txn_id'].PHP_EOL.PHP_EOL;
    $msg.= 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).$cur.PHP_EOL.PHP_EOL;
        $msg.= 'Please visit for payment: '.$result['result']['status_url'].PHP_EOL.;
        inviaMessaggio($cid, $msg);
  } else {
        $msg= 'Error: '.$result['error']."\n";
        inviaMessaggio($cid, $msg);
    }
         
   }

 exit;
?>