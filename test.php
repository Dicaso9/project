<?php
include("jwt.php");
$jwt = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCIsIiI6IiJ9.eyJzdWIiOiIxIiwicm9sZSI6ImZ1bmN0aW9uYXJ5IiwiaWF0IjoxNzAwMDUzNjMwLCJleHAiOjE3MDAwNTU0MzB9.BqlHAx2ps2ysqFcUJT52KGIOkqVjnCDG1LSBl7iPWak";
echo(jwtGetPayload($jwt,"exp"));
echo("<br>");
echo date('Y-m-d H:i:s', time());
echo("<br>");
echo date('Y-m-d H:i:s', jwtGetPayload($jwt,"exp"));
if(false) {
    $headers = [
        "alg"=> "HS256",
        "typ"=> "JWT",
        ""=> ""
    ];
    $payload = [
        "sub"=> "1",
        "role"=> "functionary",
        "iat"=> time(),
        "exp"=> time() + 60*30
    ];
    echo jwtGenerate($headers,$payload);
    
}
?>