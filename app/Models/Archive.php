<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

final class Archive
{
    public function all(): array
    {
        global $config;
        $pdo = Database::connect($config['db']);
        $sql = 'SELECT a.id, a.title, a.summary, a.file_name, a.file_path, c.name AS category_name, f.path AS folder_path, a.created_at
                FROM archives a
                JOIN categories c ON c.id = a.category_id
                JOIN folders f ON f.id = a.folder_id
                ORDER BY a.created_at DESC';
        return $pdo->query($sql)->fetchAll();
    }
}
