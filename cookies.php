<?php
    setcookie("cookiescontrol", "accepted", time() + (30 * 24 * 60 * 60), "/");
    echo "Cookie set";
?>