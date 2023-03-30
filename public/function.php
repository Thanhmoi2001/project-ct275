<?php
function is_administrator($user) {
    return (isset($_SESSION['login_user']) && ($_SESSION['phanquyen'] === 0));
}
?>