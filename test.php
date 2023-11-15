<?php
include("jwt.php");
$jwt = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5Iiwicm9sZSI6ImRlc2Nvbm9jaWRvIiwiaWF0IjoxNzAwMDY5MjU2LCJleHAiOjE3MDAwNzEwNTZ9.GpVW1RU_jowW8Xd64BsSIAuv94TcMhJxSWbZis31ktg";
echo(jwtGetPayload($jwt,"role"));
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