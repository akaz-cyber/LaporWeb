<?php
if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/'); // Hilangkan slash di akhir
    $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitasi URL
    $urlParts = explode('/', $url); // Pisahkan bagian-bagian URL

    // Routing berdasarkan URL
    switch ($urlParts[0]) {
        case 'login':
            require 'loginMultiuser/login.php';
            break;
        case 'lapor':
            require 'page/lapor.php';
            break;
        case 'process_login':
            require 'process/process_login.php';
            break;
        case 'adminDashboard':
            require 'Admin/adminDashboard.php';
            break;
        case 'logout':
            require 'loginMultiuser/logout.php';
            break;
        case 'adminLapor':
            require 'Admin/adminLapor.php';
            break;
        case 'process_terima_dan_tolak':
            require 'process/process_terima_dan_tolak.php';
            break;
        case 'process_lapor_user':
            require 'process/process_lapor_user.php';
            break;
        case 'register':
            require 'loginMultiuser/register.php';
            break;
        case 'process_register':
            require 'process/process_register.php';
            break;
        case 'kelolauser':
            require 'Admin/kelolauser.php';
            break;
        case 'tambah_userbyadmin':
            require 'process/process_tambah_userbyadmin.php';
            break;
        case 'edit_userbyadmin':
            require 'process/process_edituserbyadmin.php';
            break;
        case 'delete_byadmin':
            require 'process/process_deleteuserbyadmin.php';
            break;
        case 'artikel':
            require 'page/artikel.php';
            break;
            case 'detailArtikle':
                require 'page/detailArtikle.php';
                break;
        case 'profile':
            require 'page/profile.php';
            break;
        case 'editprofile':
            require 'process/process_editprofile.php';
            break;
        default:
            http_response_code(404);
            require 'page/404.php'; 
            break;
    }
    exit;
}
