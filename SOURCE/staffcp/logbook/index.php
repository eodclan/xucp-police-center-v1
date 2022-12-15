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
include(dirname(__FILE__) . "/../../include/features.php");

site_secure();
secure_url();

site_header(FACTION_LOGBOOK_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".FACTION_LOGBOOK_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".FACTION_LOGBOOK_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FACTION_LOGBOOK_LBOOK."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".FACTION_LOGBOOK_DESC."
										</th>					  																			
									</thead>
									<tbody>";
$id = 1;
$select_stmt = $db->prepare(query: "SELECT * FROM logs_faction WHERE factionId =".$id);
$select_stmt->execute();
while($row = $select_stmt->fetch()) {
        echo "
										<tr>
											<td>
												" . $row["text"]. "
											</td>																	
										</tr>";

}
echo "					  
									</tbody>
								</table>			  
								</div>
							</div>
						</div>
					</div>";
site_footer();