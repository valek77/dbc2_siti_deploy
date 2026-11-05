<?php
// Stub per-sito: proxy del form contatti verso POST /lead (aggiunge il token lato server).
// La logica vive in _shared/lead_proxy.php; $SITE_DIR serve a leggere il .env di QUESTO sito.
$SITE_DIR = __DIR__;
require dirname(__DIR__, 2) . '/_shared/lead_proxy.php';
