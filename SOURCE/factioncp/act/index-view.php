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

site_header(ACT_HEADER);
site_navi_logged();
site_content_logged();

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_police_act WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".ACT_HEADER.": " . $row["act_file_number"]. "</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".ACT_HEADER.": " . $row["act_file_number"]. "</li>
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
                                var doc = new jsPDF('p', 'pt', 'letter');
                                doc.text(20, 20, '".ACT_HEADER.": " . $row["act_file_number"]. "');
                                
                                doc.setLineWidth(1.5);
                                doc.line(20, 20, 200, 20);
                                
                                doc.addImage('/themes/default/assets/images/logo-bg.png', 'PNG', 455, 20, 120, 120);
                                
                                doc.setProperties({
	                                title: '".ACT_HEADER.": " . $row["act_file_number"]. "',
	                                subject: '" . $row["person_name"]. "',
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

                                doc.fromHTML($('#act-print').get(0), 20, 20, {
                                    'style': 'display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #313533;background-clip: border-box;border: 1px solid #3b403d;border-radius: 0.25rem;',
                                    'width': 400, 
                                    'elementHandlers': specialElementHandlers
                                });
                                doc.save('".ACT_HEADER."-" . $row["act_file_number"]. ".pdf');
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
                                        <a href='/factioncp/act/index-add.php' class='btn btn-light'><i class='bx bx-plus me-1'></i> ".ACT_ADD."</a>
                                        <button class='btn btn-light' onclick='getPDF()'><i class='bx bx bx-printer me-1'></i> ".ACT_PRINT."</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class='row' id='act-print'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".ACT_HEADER."</h4>
                                </div>
                                <div class='card-body'>
									<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".ACT_FILE_NUMBER."
												</h6>
												<div class='input-group form-control'>
													" . $row["act_file_number"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_JOB."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_job"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_NAME."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_name"]. "
												</div>	
											</td>
										</tr>																													
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_PHONENUMBER."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_phonenumber"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_BIRTHDAY."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_birthday"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_GENDER."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_gender"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_SIZE."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_size"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_EYE_COLOR."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_eye_color"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_HAIR_COLOR."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_hair_color"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_MOTORCYCLE_LICENSE."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_motorcycle_license"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_CAR_LICENSE."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_car_license"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_TRUCK_LICENSE."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_truck_license"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_GUN_LICENSE."
												</h6>
												<div class='input-group form-control'>
													" . $row["person_gun_license"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_PERSON_OTHERS."
												</h6>
												<div class='input-group form-control'>
													" . $row["act_others"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_VEH_PLATE."
												</h6>
												<div class='input-group form-control'>
													" . $row["veh_plate"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_VEH_NAME."
												</h6>
												<div class='input-group form-control'>
													" . $row["veh_name"]. "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_VEH_ALL_VEHICLES."
												</h6>
												<div class='input-group form-control'>
													" . $row["veh_all_vehicles"]. "
												</div>	
											</td>
										</tr>																																																																																																																																		
										<tr>				  
											<td>
												<h6>
													".ACT_MSG."
												</h6>
												<div class='input-group form-control'>
												    ".format_comment($row["act_msg"])."
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_IS_FINISHED."
												</h6>
												<div class='input-group form-control'>
													" . $row["act_is_finished"]. "												
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ACT_TESTIFY."
												</h6>
												<div class='input-group form-control'>
													" . $row["act_testify"]. "
												</div>	
											</td>
										</tr>																														
										<tr>				  
											<td>
												<h6>
													".ACT_FROM_CREATED."
												</h6>
												<div class='input-group form-control'>
													" . $row["act_from_created"]. "
												</div>	
											</td>
										</tr>																																				
									</form>					
                                </div>
                            </div>
                        </div>
                    </div>";
}
site_footer();