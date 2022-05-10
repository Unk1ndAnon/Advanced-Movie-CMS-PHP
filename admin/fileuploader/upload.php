<?php

require $_SERVER['DOCUMENT_ROOT'] . "/includes/connect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/includes/functions.php";

// A list of permitted file extensions

$success = false;

$allowed = [ 'mp4', 'vtt','srt'];

if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {
    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($extension), $allowed)) {
        echo '{"status":"error"}';
        exit();
    }
    var_dump($_SESSION);
    if ($_POST['episode']) {
        $episode_num = $_POST['episode'];
    }
    if (isset($_POST['quality'])) {
        if ($_POST['quality'] == '720p') {
            if ($_POST['episode']) {
                if (
                    move_uploaded_file(
                        $_FILES['upl']['tmp_name'],
                        'uploads/' . $_FILES['upl']['name']
                    )
                ) {
                    $success = true;
                    $_SESSION['ep_720p'][$episode_num - 1] =
                        $_FILES['upl']['name'];
                }
            } else {
                if (
                    move_uploaded_file(
                        $_FILES['upl']['tmp_name'],
                        'uploads/' . $_FILES['upl']['name']
                    )
                ) {
                    $success = true;
                    $_SESSION['720p'] = $_FILES['upl']['name'];
                }
            }
        }
        if ($_POST['quality'] == '1080p') {
            if ($_POST['episode']) {
                $episode_num = $_POST['episode'];
                if (
                    move_uploaded_file(
                        $_FILES['upl']['tmp_name'],
                        'uploads/' . $_FILES['upl']['name']
                    )
                ) {
                    $success = true;
                    $_SESSION['ep_1080p'][$episode_num - 1] =
                        $_FILES['upl']['name'];
                }
            } else {
                if (
                    move_uploaded_file(
                        $_FILES['upl']['tmp_name'],
                        'uploads/' . $_FILES['upl']['name']
                    )
                ) {
                    $success = true;
                    $_SESSION['1080p'] = $_FILES['upl']['name'];
                }
            }
        }
    }
    if ($_POST['subtitle'] == 'english') {
        if ($_POST['episode']) {
            if (
                move_uploaded_file(
                    $_FILES['upl']['tmp_name'],
                    'uploads/' . $_FILES['upl']['name']
                )
            ) {
                $success = true;
                $_SESSION['ep_en'][$episode_num - 1] = $_FILES['upl']['name'];
            }
        } else {
            if (
                move_uploaded_file(
                    $_FILES['upl']['tmp_name'],
                    'uploads/' . $_FILES['upl']['name']
                )
            ) {
                $success = true;
                $_SESSION['en'] = $_FILES['upl']['name'];
            }
        }
    }

    if ($success) {
        echo '{"status":"success"}';
    }

    exit();
}

echo '{"status":"error"}';
exit();

?>
