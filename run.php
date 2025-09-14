<?php

require_once __DIR__ . '/vendor/autoload.php';

// Si se pasan argumentos, se ejecuta el ejemplo directamente (modo no interactivo).
if (count($argv) > 1) {
    $pathParts = array_slice($argv, 1);
    $examplePath = implode('/', $pathParts);
    $exampleFile = __DIR__ . "/examples/{$examplePath}.php";

    if (!file_exists($exampleFile)) {
        echo "Error: No se encontró el archivo de ejemplo '{$exampleFile}'.\n";
        exit(1);
    }
    include $exampleFile;
    exit(0);
}

// --- MODO INTERACTIVO (MENÚ) ---
// Si no hay argumentos, mostramos un menú.

echo "========================================\n";
echo "  MENÚ DE PATRONES DE DISEÑO EN PHP\n";
echo "========================================\n\n";

$examplesDir = __DIR__ . '/examples';
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($examplesDir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$files = [];
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() == 'php') {
        $files[] = $file->getPathname();
    }
}

if (empty($files)) {
    echo "No se encontraron ejemplos en la carpeta '{$examplesDir}'.\n";
    exit(1);
}

// Ordenamos los archivos para una visualización consistente.
sort($files);

$menuItems = [];
foreach ($files as $path) {
    // Creamos un nombre legible para el menú.
    // Ej: '/path/to/examples/strategy/UseCase01.php' -> 'strategy > UseCase01'
    $displayName = str_replace([$examplesDir . '/', '.php'], '', $path);
    $displayName = str_replace('/', ' > ', $displayName);
    $menuItems[] = [
        'display' => $displayName,
        'path' => $path
    ];
}

foreach ($menuItems as $index => $item) {
    printf("  [%d] %s\n", $index + 1, $item['display']);
}

echo "\n";
$choice = readline("Elige el número del ejemplo a ejecutar: ");

// Validamos la entrada del usuario.
if (!is_numeric($choice) || !isset($menuItems[$choice - 1])) {
    echo "Opción inválida.\n";
    exit(1);
}

$selectedExample = $menuItems[$choice - 1];

echo "\n----------------------------------------\n";
echo "Ejecutando: " . $selectedExample['display'] . "\n";
echo "----------------------------------------\n\n";

// Incluimos y ejecutamos el archivo seleccionado.
include $selectedExample['path'];

