<?php
$sqlFile = 'ulgae_ulb.sql';
$sql = file_get_contents($sqlFile);

// Database connection
$host = '127.0.0.1';
$db = 'lubricants';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Remove comments and execute the entire file at once
    $sql = preg_replace('/^--.*$/m', '', $sql); // Remove -- comments
    $sql = preg_replace('/\/\*.*?\*\//s', '', $sql); // Remove /* */ comments

    // Split properly considering quoted strings
    $statements = [];
    $currentStatement = '';
    $inQuote = false;
    $quoteChar = '';

    for ($i = 0; $i < strlen($sql); $i++) {
        $char = $sql[$i];
        $nextChar = $i + 1 < strlen($sql) ? $sql[$i + 1] : '';

        // Handle quotes
        if (($char === "'" || $char === '"') && ($i === 0 || $sql[$i-1] !== '\\')) {
            if (!$inQuote) {
                $inQuote = true;
                $quoteChar = $char;
            } elseif ($char === $quoteChar) {
                $inQuote = false;
                $quoteChar = '';
            }
        }

        // Handle statement terminator
        if ($char === ';' && !$inQuote) {
            $currentStatement .= $char;
            $statement = trim($currentStatement);
            if (!empty($statement)) {
                $statements[] = $statement;
            }
            $currentStatement = '';
        } else {
            $currentStatement .= $char;
        }
    }

    // Execute statements
    $count = 0;
    foreach ($statements as $statement) {
        try {
            if (!empty(trim($statement))) {
                $pdo->exec($statement);
                $count++;
                if ($count % 5 === 0) {
                    echo "Executed $count statements...\n";
                }
            }
        } catch (\Exception $e) {
            echo "Error on statement $count: " . $e->getMessage() . "\n";
        }
    }

    echo "\nSuccessfully imported database! Executed $count statements.\n";
} catch (\Exception $e) {
    echo "Connection error: " . $e->getMessage() . "\n";
}
