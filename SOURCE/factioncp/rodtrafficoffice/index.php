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

site_header(ROAD_TRAFFIC_OFFICE_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".ROAD_TRAFFIC_OFFICE_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".ROAD_TRAFFIC_OFFICE_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js'></script>
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js'></script>
                        <script>
                            function getPDF() {
                                var doc = new jsPDF('1', 'mm', [700, 700]);
                                doc.text(0, 0, '".ROAD_TRAFFIC_OFFICE_HEADER."');
                                
                                doc.setLineWidth(1.5);
                                doc.line(20, 20, 200, 20);
                               
                                doc.setProperties({
	                                title: '".ROAD_TRAFFIC_OFFICE_HEADER."',
	                                subject: '".ROAD_TRAFFIC_OFFICE_HEADER."',
	                                author: 'xUCP Police Center V1.0',
	                                keywords: 'xucp police center',
	                                creator: 'xUCP Police Center'
                                });
                                
                                // We'll make our own renderer to skip this editor
                                var specialElementHandlers = {
                                    '#editor': function (element, rendrer) {
                                        return true;
                                    },
                                    '#getPDF': function(element, renderer){
                                        return true;
                                    },
                                    '.controls': function(element, renderer){
                                        return true;
                                    }
                                };

                                doc.fromHTML($('#roadtraffic-print').get(0), 20, 20, {
                                    'width': 250, 
                                    'elementHandlers': specialElementHandlers
                                });
                                doc.save('".ROAD_TRAFFIC_OFFICE_HEADER.".pdf');
                            }
                        </script>   
                        <div class='row align-items-center'>
                            <div class='col-md-6'>
                                <div class='mb-3'>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3'>
                                    <div>
                                        <button class='btn btn-light' onclick='getPDF()'><i class='bx bx bx-printer me-1'></i> ".ROAD_TRAFFIC_OFFICE_PRINT."</button>
                                    </div>
                                </div>
                            </div>
                        </div>                                                
                    <div class='row' id='roadtraffic-print'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".ROAD_TRAFFIC_OFFICE_HEADER."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".ROAD_TRAFFIC_OFFICE_VEH_NAME."
										</th>
										<th>
											".ROAD_TRAFFIC_OFFICE_VEH_PLATE."
										</th>																																			  																			
									</thead>
									<tbody>";
$select_stmt = $db->prepare(query: "SELECT * FROM server_vehicles WHERE id LIKE ?");
$select_stmt->execute(array("%$query%"));
while($row = $select_stmt->fetch()) {
    echo "
										<tr>
											<td>
												" . $row["hash"]. "
											</td>																	
											<td>
												" . $row["plate"]. "
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