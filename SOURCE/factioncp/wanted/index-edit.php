<?php
// ************************************************************************************//
// * xUCP Police Center Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.0
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

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_police_wanted WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".WANTED_HEADER.": " . $row["file_number"]. "</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".WANTED_HEADER.": " . $row["file_number"]. "</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>";
    if(isset($_REQUEST['xucp_submit']))
    {
        $file_number = strip_tags($_POST['xucp_file_number']);
        $job = strip_tags($_POST['xucp_job']);
        $msg = strip_tags($_POST['xucp_msg']);
        $person = strip_tags($_POST['xucp_person']);
        $phone_number = strip_tags($_POST['xucp_phonenumber']);
        $is_wanted = strip_tags($_POST['xucp_is_wanted']);
        $from_created = strip_tags($_POST['xucp_from_created']);
        $date_time = date("Y-m-d H:i:s");

        if(empty($file_number)){
            $errorMsg[]=WANTED_ENTRY_NOT_WORK;
        }
        else if(empty($person)){
            $errorMsg[]=WANTED_ENTRY_NOT_WORK;
        }
        else if(empty($msg)){
            $errorMsg[]=WANTED_ENTRY_NOT_WORK;
        }
        else
        {
            try
            {
                if(!isset($errorMsg))
                {
                    $insert_stmt=$db->prepare("UPDATE 
                                                    `xucp_police_wanted` 
                                                SET
                                                    `file_number` = :xucp_file_number, 
                                                    `job` = :xucp_job, 
                                                    `msg` = :xucp_msg, 
                                                    `person` = :xucp_person, 
                                                    `phonenumber` = :xucp_phonenumber, 
                                                    `is_wanted` = :xucp_is_wanted,
                                                    `from_created` = :xucp_from_created
                                                WHERE 
                                                    `id` = ".$id);

                    if($insert_stmt->execute(array(	':xucp_file_number'	=>$file_number,
                        ':xucp_job'	=>$job,
                        ':xucp_msg'=>$msg,
                        ':xucp_person'=>$person,
                        ':xucp_phonenumber'=>$phone_number,
                        ':xucp_is_wanted'=>$is_wanted,
                        ':xucp_from_created'=>$from_created))){

                        $doneMsg=WANTED_ENTRY_WORKING;
                        $Discord = new Discord();
                        $Discord->Send(WANTED_DISCORD_NOTES);
                        header("refresh:2; /factioncp/wanted/index.php");
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    if(isset($errorMsg))
    {
        foreach($errorMsg as $error)
        {
            echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".WANTED_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$error."
									</div>
								</div>
							</div>
						</div>";
        }
    }

    if(isset($doneMsg))
    {
        echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".WANTED_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
    }

    echo "


                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".WANTED_HEADER."</h4>
                                </div>
                                <div class='card-body'>
									<form action='/factioncp/wanted/index-edit.php?id=".$id."' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".WANTED_FILE_NUMBER."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_file_number' size='50' maxlength='100' class='form-control' value='" . $row["file_number"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".WANTED_JOB."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_job' size='50' maxlength='100' class='form-control' value='" . $row["job"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".WANTED_PERSON."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_person' size='50' maxlength='100' class='form-control' value='" . $row["person"]. "' required>
												</div>	
											</td>
										</tr>																													
										<tr>				  
											<td>
												<h6>
													".WANTED_PHONENUMBER."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_phonenumber' size='50' maxlength='100' class='form-control' value='" . $row["phonenumber"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".WANTED_MSG."
												</h6>
												<div class='input-group'>";
                                                    textbbcode('xucp_msg', htmlspecialchars(stripslashes($row['msg'])));
                                                echo "
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".WANTED_IS_WANTED."
												</h6>
												<div class='input-group'>
													<select name='xucp_is_wanted' class='form-control show-tick' required>
														<option value=''>-- ".CHANGE_MYPROFILE_LANGUAGENOTE." --</option>
														<option value='yes'>Yes</option>
														<option value='no'>No</option>
													</select>													
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".WANTED_FROM_CREATED."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_from_created' size='50' maxlength='100' class='form-control' value='" . $row["from_created"]. "' required>
												</div>	
											</td>
										</tr>																														
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".WANTED_EDIT."
												</button>
												</submit>
											</td>							
										</tr>						
									</form>					
                                </div>
                            </div>
                        </div>
                    </div>";
}
site_footer();