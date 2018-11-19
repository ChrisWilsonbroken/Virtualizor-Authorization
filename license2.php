<?php
function sm_encode($txt)
{
    $from = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j");
    $to = array("!", "@", "#", "\$", "%", "^", "&", "*", "(", ")");
    $txt = base64_encode($txt);
    $txt = str_replace($from, $to, $txt);
    $txt = gzcompress($txt);
  	for ($i = 0; $i < strlen($txt); $i++) {
        $txt[$i] = sm_reverse_bits($txt[$i]);
    }
    $txt = base64_encode($txt);
    return $txt;
}
function sm_reverse_bits($orig)
{
    $v = decbin(ord($orig));
  	$pad = str_pad($v, 8, "0", STR_PAD_LEFT);
    $rev = strrev($pad);
    $bin = bindec($rev);
    $chr = chr($bin);
    return $chr;
}

$ip = $_SERVER["REMOTE_ADDR"];
$license = '{"license":"CHRIS-MOCLOUD-INDEXYZ-CLOUDHAMMER-JIANGZEMING","lictype":"1","lictype_txt":"I AM ANGRY","active":1,"active_txt":"<font color=\"green\">Active<\/font>","licnumvs":"0","primary_ip":"'.$ip.'","licexpires":"29991231","licexpires_txt":"31\/12\/2999 GMT","last_edit":"0","fast_mirrors":["https:\/\/s1.softaculous.com\/a\/virtualizor","https:\/\/s2.softaculous.com\/a\/virtualizor","https:\/\/s3.softaculous.com\/a\/virtualizor","https:\/\/s4.softaculous.com\/a\/virtualizor","https:\/\/s7.softaculous.com\/a\/virtualizor"]}';
$license = @trim(@sm_encode($license));
echo $license;