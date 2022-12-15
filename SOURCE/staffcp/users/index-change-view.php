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

site_header(CHIEF_USERCAHNEGED);
site_navi_logged();
site_content_logged();

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM `xucp_police_accounts` WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".CHIEF_USERCAHNEGED."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/users/index-change-view.php?id=".$row['id'].".php'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".CHIEF_USERCAHNEGED.": " .$row['username']. "</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";
    if(isset($_REQUEST['xucp_submit']))
    {
        $user_faction_rank 	= strip_tags($_REQUEST['xucp_user_faction_rank']);

        if(empty($user_faction_rank)){
            $errorMsg[]=CHIEF_USERCONTROLQUIT_ERROR;
        }
        else
        {
            try
            {
                if(!isset($errorMsg))
                {
                    $insert_stmt=$db->prepare("UPDATE `xucp_police_accounts` SET `user_faction_rank` = :xucp_user_faction_rank WHERE `id` = ".$id);

                    if($insert_stmt->execute(array(	':xucp_user_faction_rank'	=>$user_faction_rank))){

                        $doneMsg=CHIEF_USERCONTROLQUIT_DONE;
                        header("refresh:2; /staffcp/users/index-control.php");
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
										<h4 class='card-title'>".CHIEF_USERCAHNEGED.": " .$row['username']. "</h4>
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
										<h4 class='card-title'>".CHIEF_USERCAHNEGED.": " .$row['username']. "</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
    }
    echo "
              <div class='col-lg-12'>
                <div class='card'>
					<div class='card-body'>
						<form class='forms-sample' name='form' method='post' action='/staffcp/users/index-change-view.php?id=".$id."'>
                            <input type='hidden' name='new' value='1' />
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".CHIEF_USERCONTROLQUIT."</label>
									<div class='col-sm-12'>
										<select name='xucp_user_faction_rank' class='form-control show-tick' value='" . $row["user_faction_rank"]. "'required>
												<option value=''>-- ".CHIEF_USERCONTROLQUIT_NOTE." --</option>
												<option value='yes'>".CHIEF_USERCONTROLQUIT_YES."</option>										
										</select>									
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".CHIEF_USERCONTROLOPTION."</label>
									<div class='col-sm-12'>
										<button type='submit' class='btn btn-primary w-100 waves-effect waves-light' name='xucp_submit'>".CHIEF_USERCONTROLSAVE."</button></submit>&nbsp;
									</div>
								</div>							
                            </div>
						</form>
						</div>							
					</div>
				</div>
            </div>";
}
site_footer();
