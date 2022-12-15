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
site_secure_staff_check_rank();

site_header(PARAGRAPH_MANAGER_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".PARAGRAPH_MANAGER_HEADER.": ".PARAGRAPH_MANAGER_ADD."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".PARAGRAPH_MANAGER_HEADER.": ".PARAGRAPH_MANAGER_ADD."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>";

if(isset($_REQUEST['xucp_submit']))
{
    $title = strip_tags($_POST['xucp_title']);
    $description = strip_tags($_POST['xucp_description']);
    $category = strip_tags($_POST['xucp_category']);

    if(empty($title)){
        $errorMsg[]=PARAGRAPH_MANAGER_ERROR;
    }
    else if(empty($description)){
        $errorMsg[]=PARAGRAPH_MANAGER_ERROR;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("INSERT INTO xucp_police_paragraph (title,description,category) VALUES
																(:xucp_title,:xucp_description,:xucp_category)");

                if($insert_stmt->execute(array(	':xucp_title'	=>$title,
                    ':xucp_description'	=>$description,
                    ':xucp_category'	=>$category))){

                    $doneMsg=PARAGRAPH_MANAGER_DONE;
                    $Discord = new Discord();
                    $Discord->Send(PARAGRAPH_MANAGER_DISCORD);
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
										<h4 class='card-title'>".PARAGRAPH_MANAGER_HEADER.": ".PARAGRAPH_MANAGER_ADD."</h4>
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
										<h4 class='card-title'>".PARAGRAPH_MANAGER_HEADER.": ".PARAGRAPH_MANAGER_ADD."</h4>
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
                                    <h4 class='card-title'>".PARAGRAPH_MANAGER_HEADER.": ".PARAGRAPH_MANAGER_ADD."</h4>
                                </div>
                                <div class='card-body'>
									<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".PARAGRAPH_MANAGER_CATEGORY."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_category' size='50' maxlength='100' class='form-control'>
												</div>	
											</td>
										</tr>									
										<tr>				  
											<td>
												<h6>
													".PARAGRAPH_MANAGER_TITLE."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_title' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".PARAGRAPH_MANAGER_DESC."
												</h6>
												<div class='input-group'>";
													textbbcode('xucp_description', htmlspecialchars(stripslashes($_POST["xucp_description"])));
                                                    echo "
												</div>	
											</td>
										</tr>										
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".PARAGRAPH_MANAGER_SEND."
												</button>
												</submit>
											</td>							
										</tr>						
									</form>					
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();