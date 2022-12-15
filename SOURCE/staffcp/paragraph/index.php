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
                                    <h4 class='mb-sm-0 font-size-18'>".PARAGRAPH_MANAGER_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='".$_SERVER['PHP_SELF']."'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".PARAGRAPH_MANAGER_HEADER."</li>
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
                                        <a href='/staffcp/paragraph/index-add.php' class='btn btn-light'><i class='bx bx-plus me-1'></i> ".PARAGRAPH_MANAGER_ADD."</a>
                                    </div>
                                </div>
                            </div>
                        </div>                         
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class=''>
                                    <div class='mb-8'>
                                        <img src='/themes/default/assets/images/logo-paragraph.png' alt='' class='img-thumbnail mx-auto d-block'>
                                    </div>";
$select_stmt = $db->prepare("SELECT * FROM xucp_police_paragraph WHERE id LIKE ?");
$select_stmt->execute(array("%$query%"));
while($paragraph_view = $select_stmt->fetch()) {
    echo "
                                    <hr>
                                    <div class='text-center'>
                                        <div class='row'>                        
                                            <div class='col-sm-12'>
                                                <div>
                                                    <h6 class='mb-4'>".$paragraph_view['category']."</h6>
                                                    <p class='text-muted font-size-15'>".$paragraph_view['title']."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='mt-4'>
                                        <div class='text-muted font-size-14'>
                                            <p>".format_comment($paragraph_view['description'])."</p>
                                        </div>
                                    </div>";
}
echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
site_footer();