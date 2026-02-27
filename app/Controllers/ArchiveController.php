<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\Archive;

final class ArchiveController extends Controller
{
    public function index(): void
    {
        Auth::requireLogin();
        if (!Auth::can('archive.read')) {
            http_response_code(403);
            echo 'Akses ditolak.';
            return;
        }

        $archives = (new Archive())->all();
        $this->render('archives/index', ['title' => 'Arsip', 'archives' => $archives]);
    }
}
