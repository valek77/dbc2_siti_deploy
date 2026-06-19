<?php
// FILE DI DIAGNOSTICA TEMPORANEO — CANCELLARE DOPO L'USO
header('Content-Type: text/plain; charset=utf-8');

$t = getenv('DBC2_TOKEN');
$b = getenv('DBC2_API_BASE');

echo "SAPI: " . php_sapi_name() . "\n";
echo "API_BASE: [" . $b . "]\n";
echo "TOKEN trovato: " . ($t === false ? 'NO (false)' : 'si') . "\n";
echo "TOKEN lunghezza: " . strlen((string)$t) . "\n";
echo "TOKEN primi 4: [" . substr((string)$t, 0, 4) . "]\n";
echo "TOKEN ultimi 4: [" . substr((string)$t, -4) . "]\n";
echo "Ci sono spazi/virgolette ai bordi? primo=[" . substr((string)$t,0,1) . "] ultimo=[" . substr((string)$t,-1) . "]\n";

// Prova reale identica a quella del sito
$url = rtrim($b, '/') . '/companies/' . rawurlencode(getenv('COMPANY_ID') ?: '32');
$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 5,
    CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $t, 'Accept: application/json'],
]);
$body = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo "\nChiamata da PHP a: $url\n";
echo "HTTP Code: $code\n";
echo "Body: " . substr((string)$body, 0, 300) . "\n";
