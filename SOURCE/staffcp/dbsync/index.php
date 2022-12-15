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

site_header(DBSYNC_HEADER);
site_navi_logged();
site_content_logged();
error_reporting(E_ALL);
echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".DBSYNC_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/dbsync/index.php'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".DBSYNC_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_REQUEST['xucp_db_sync_submit']))
{
    $dbsync_u_id 	= 1;
    $dbsync_hostname 			= strip_tags($_REQUEST['xucp_dbsync_hostname']);
    $dbsync_port 			= strip_tags($_REQUEST['xucp_dbsync_port']);
    $dbsync_dbname  			= strip_tags($_REQUEST['xucp_dbsync_dbname']);
    $dbsync_username 			= strip_tags($_REQUEST['xucp_dbsync_username']);
    $dbsync_password 	= strip_tags($_REQUEST['xucp_dbsync_password']);

    if(empty($dbsync_hostname)){
        $errorMsg[]=DBSYNC_ENTRY_NOT_WORK;
    }
    else if(empty($dbsync_port)){
        $errorMsg[]=DBSYNC_ENTRY_NOT_WORK;
    }
    else if(empty($dbsync_dbname)){
        $errorMsg[]=DBSYNC_ENTRY_NOT_WORK;
    }
    else if(empty($dbsync_username)){
        $errorMsg[]=DBSYNC_ENTRY_NOT_WORK;
    }
    else if(empty($dbsync_password)){
        $errorMsg[]=DBSYNC_ENTRY_NOT_WORK;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("
                                                UPDATE 
                                                    `xucp_police_dbsync` 
                                                SET 
                                                    `dbsync_hostname` = :xucp_dbsync_hostname, 
                                                    `dbsync_port` = :xucp_dbsync_port, 
                                                    `dbsync_dbname` = :xucp_dbsync_dbname, 
                                                    `dbsync_username` = :xucp_dbsync_username, 
                                                    `dbsync_password` = :xucp_dbsync_password 
                                                WHERE 
                                                    `id` = ".$dbsync_u_id);

                if($insert_stmt->execute(array(	':xucp_dbsync_hostname'	=>$dbsync_hostname,
                    ':xucp_dbsync_port'=>$dbsync_port,
                    ':xucp_dbsync_dbname'=>$dbsync_dbname,
                    ':xucp_dbsync_username'=>$dbsync_username,
                    ':xucp_dbsync_password'=>$dbsync_password))){

                    $doneMsg=DBSYNC_ENTRY_WORKING;
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
										<h4 class='card-title'>".DBSYNC_HEADER."</h4>
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
										<h4 class='card-title'>".DBSYNC_HEADER."</h4>
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
						<div class='col-lg-12'>
							<div class='card'>
								<div class='card-body'>";
                $select_stmt = $db->prepare("SELECT id, dbsync_hostname, dbsync_port, dbsync_dbname, dbsync_username, dbsync_password from xucp_police_dbsync ORDER by id DESC LIMIT 1");
                $select_stmt->execute();
                $conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo "
						<form class='form-horizontal' method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".DBSYNC_HOSTNAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_dbsync_hostname' size='32' maxlength='32' class='form-control' value='" . $conf_set["dbsync_hostname"]. "' required>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".DBSYNC_PORT."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_dbsync_port' size='32' maxlength='32' class='form-control' value='" . $conf_set["dbsync_port"]. "' required>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".DBSYNC_DBNAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_dbsync_dbname' size='32' maxlength='32' class='form-control' value='" . $conf_set["dbsync_dbname"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".DBSYNC_USERNAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
										    <input type='text' name='xucp_dbsync_username' size='32' maxlength='32' class='form-control' value='" . $conf_set["dbsync_username"]. "' required>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".DBSYNC_PASSWORD."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_dbsync_password' size='32' maxlength='32' class='form-control' value='" . $conf_set["dbsync_password"]. "' required>
										</div>
									</div>
								</div>
							</div><br />							
							<div class='row clearfix'>
								<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>   
								    <input type='submit'  name='xucp_db_sync_submit' class='btn btn-primary w-100 waves-effect waves-light' value='".DBSYNC_START_SYNC."'>
								</div>
							</div>
						</form>";
				}					

		echo "		  			
                                </div>
                            </div>
                        </div>
                    </div>";
  site_footer();	
