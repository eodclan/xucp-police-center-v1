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

site_header(RESIDENT_DATABASE_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".RESIDENT_DATABASE_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".RESIDENT_DATABASE_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".RESIDENT_DATABASE_HEADER."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".RESIDENT_DATABASE_NAME."
										</th>
										<th>
											".RESIDENT_DATABASE_BIRTHDATE."
										</th>
										<th>
											".RESIDENT_DATABASE_BIRTHPLACE."
										</th>
										<th>
											".RESIDENT_DATABASE_JOB."
										</th>																																			  																			
									</thead>
									<tbody>";
$select_stmt = $db->prepare(query: "SELECT * FROM accounts_characters WHERE charId LIKE ?");
$select_stmt->execute(array("%$query%"));
while($row = $select_stmt->fetch()) {
    echo "
										<tr>
											<td>
												" . $row["charname"]. "
											</td>																	
											<td>
												" . $row["birthdate"]. "
											</td>																	
											<td>
												" . $row["birthplace"]. "
											</td>																	
											<td>
												" . $row["job"]. "
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