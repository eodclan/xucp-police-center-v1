<?php
// ************************************************************************************//
// * xUCP Police Center Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.1.1
// *
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
$select_stmt = $db->prepare("SELECT site_online, site_name, site_themes, site_lang, site_upgrade_note from xucp_police_config WHERE id=1");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    $_SESSION['xucp_police_uname']['xucp_police_conf_site_online'] = htmlentities($row["site_online"]);
    $_SESSION['xucp_police_uname']['xucp_police_conf_site_name'] = htmlentities($row["site_name"]);
    $_SESSION['xucp_police_uname']['xucp_police_conf_lang'] = htmlentities($row["site_lang"]);
    $_SESSION['xucp_police_uname']['xucp_police_conf_themes'] = htmlentities($row["site_themes"]);
    $_SESSION['xucp_police_uname']['xucp_police_conf_upgrade_note'] = htmlentities($row["site_upgrade_note"]);
}
