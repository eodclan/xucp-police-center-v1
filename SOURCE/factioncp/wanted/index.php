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

site_header(WANTED_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".WANTED_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".WANTED_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class='row align-items-center'>
                            <div class='col-md-6'>
                                <div class='mb-3'>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3'>
                                    <div>
                                        <a href='/factioncp/wanted/index-add.php' class='btn btn-light'><i class='bx bx-plus me-1'></i> ".WANTED_ADD."</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".WANTED_HEADER."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".WANTED_FILE_NUMBER."
										</th>					  
										<th>
											".WANTED_PERSON."
										</th>				  
								        <th>
									        ".WANTED_IS_WANTED."
								        </th>								        										
										<th>
											".WANTED_FROM_CREATED."
										</th>
										<th>
											".WANTED_DATE."
										</th>
										<th>
											".WANTED_VIEW."
										</th>																					
										<th>
											".WANTED_EDIT."
										</th>																			
									</thead>
									<tbody>";
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_police_wanted WHERE id LIKE ?");
$select_stmt->execute(array("%$query%"));
while($row = $select_stmt->fetch()) {
    if($row['is_wanted'] == 'yes') {
        echo "
										<tr>
											<td>
												" . $row["file_number"]. "
											</td>						
											<td>
												" . $row["person"]. "
											</td>
											<td>
												" . $row["is_wanted"]. "
											</td>											
											<td>
												" . $row["from_created"]. "
											</td>
											<td>
												" . $row["date_time"]. "
											</td>
                                            <td>
                                                <a href='/factioncp/wanted/index-view.php?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
                                                    <i class='dripicons-checkmark'></i>&nbsp;".WANTED_VIEW."
                                                </a>
                                            </td>											
                                            <td>
                                                <a href='/factioncp/wanted/index-edit.php?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
                                                    <i class='dripicons-checkmark'></i>&nbsp;".WANTED_EDIT."
                                                </a>
                                            </td>											
										</tr>";
    }
}
echo "					  
									</tbody>
								</table>			  
								</div>
							</div>
						</div>
					</div>";
site_footer();