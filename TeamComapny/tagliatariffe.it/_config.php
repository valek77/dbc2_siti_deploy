<?php
// Stub per-sito: il cuore condiviso vive in _shared/config.php nella root del repo.
// $SITE_DIR (cartella di QUESTO sito) serve a leggere .env e a scrivere la cache qui,
// non in _shared/. Per questo NON si usano symlink (PHP risolve __DIR__ al target reale).
$SITE_DIR = __DIR__;
require dirname(__DIR__, 2) . '/_shared/config.php';