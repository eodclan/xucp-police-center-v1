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
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /404.php' ) );
}
/**
 * @return void
 */
function site_navi_logged(): void
{
    echo "
            <div class='vertical-menu'>
                <div data-simplebar class='h-100'>
                    <div id='sidebar-menu'>
                        <!-- Left Menu Start -->
                        <ul class='metismenu list-unstyled' id='side-menu'>
                            <li class='menu-title' data-key='t-menu'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</li>
                            <li>
                                <a href='/usercp/dashboard/index.php'>
                                    <i class='dripicons-home'></i>
                                    <span data-key='t-dashboard'>".DASHBOARD."</span>
                                </a>
                            </li>
                            <li>
                                <a href='/factioncp/wanted/index.php'>
                                    <i class='dripicons-blog'></i>
                                    <span data-key='t-dashboard'>".WANTED_HEADER."</span>
                                </a>
                            </li>
                            <li>
                                <a href='/factioncp/act/index.php'>
                                    <i class='dripicons-map'></i>
                                    <span data-key='t-dashboard'>".ACT_HEADER."</span>
                                </a>
                            </li>                                                        
                            <li>
                                <a href='/factioncp/rodtrafficoffice/index.php'>
                                    <i class='dripicons-map'></i>
                                    <span data-key='t-dashboard'>".ROAD_TRAFFIC_OFFICE_HEADER."</span>
                                </a>
                            </li>
                            <li>
                                <a href='/factioncp/resident/index.php'>
                                    <i class='dripicons-map'></i>
                                    <span data-key='t-dashboard'>".RESIDENT_DATABASE_HEADER."</span>
                                </a>
                            </li>
                            <li>
                                <a href='/factioncp/paragraph/index.php'>
                                    <i class='dripicons-map'></i>
                                    <span data-key='t-dashboard'>".PARAGRAPH_HEADER."</span>
                                </a>
                            </li>                                                        
                            <li>
                                <a href='/factioncp/fmembers/index.php'>
                                    <i class='dripicons-star'></i>
                                    <span data-key='t-dashboard'>".TLIST_LEFT_NAVI_HEADER."</span>
                                </a>
                            </li>                                                       				
                            <li>
                                <a href='javascript: void(0);' class='has-arrow'>
                                    <i class='mdi mdi-alpha-a-circle'></i>
                                    <span data-key='t-apps'>".USERACCOUNT."</span>
                                </a>
                                <ul class='sub-menu' aria-expanded='false'>
                                    <li>
                                        <a href='/usercp/profile/index.php'>
                                            <span data-key='t-calendar'>".USERPROFILECHANGE."</span>
                                        </a>
                                    </li>									
								</ul>
							</li>";
    if(intval($_SESSION['xucp_police_uname']['secure_staff']) >= UC_CLASS_CHIEF_OF_POLICE) {
        echo "
							<li>
								<a href='javascript: void(0);' class='has-arrow'>
									<i class='dripicons-user-group'></i>
									<span data-key='t-blog'>".TLIST_POLICE_RANK_12."</span>
								</a>
								<ul class='sub-menu' aria-expanded='false'>
									<li><a href='/staffcp/siteconfig/index.php' data-key='t-blog-grid'>".SITECONFIG_HEADER."</a></li>
									<li><a href='/staffcp/dbsync/index.php' data-key='t-blog-grid'>".DBSYNC_HEADER."</a></li>
									<li><a href='/staffcp/logbook/index.php' data-key='t-blog-grid'>".FACTION_LOGBOOK_HEADER."</a></li>
									<li><a href='/staffcp/paragraph/index.php' data-key='t-blog-grid'>".PARAGRAPH_MANAGER_HEADER."</a></li>
									<li><a href='/staffcp/users/index-control.php' data-key='t-blog-grid'>".CHIEF_USERCONTROL."</a></li>
									<li><a href='/staffcp/news/index.php' data-key='t-blog-grid'>".NEWS_HEADER." ".CHIEF_CHANGE_USER."</a></li>
								</ul>
							</li>";
    }
    echo "
						</ul>";
                    if(intval($_SESSION['xucp_police_uname']['xucp_police_conf_upgrade_note']) == 1) {
                        echo "
                        <div class='card sidebar-alert border-0 text-center mx-4 mb-0 mt-5'>
                            <div class='card-body'>
                                <div class='mt-4'>
                                    <h5 class='alertcard-title font-size-16'>Unlimited Access</h5>
                                    <p class='font-size-13'>Upgrade your Free Version, to select Pro Version.</p>
                                    <a href='https://discord.gg/xg5mnYUWch' class='btn btn-primary mt-2'>Buy upgrade now</a>
                                </div>
                            </div>
                        </div>";
                    } else {
                        // Even if you turn this off in the settings, you have the free version!
                    }
					echo "
                    </div>
                </div>
            </div>";
}

/**
 * @return void
 */
function site_navi_nologged(): void
{
    echo "
            <div class='vertical-menu'>
                <div data-simplebar class='h-100'>
                    <div id='sidebar-menu'>
                        <!-- Left Menu Start -->
                        <ul class='metismenu list-unstyled' id='side-menu'>
                            <li class='menu-title' data-key='t-menu'>".$_SESSION['xucp_police_uname']['xucp_police_conf_site_name']."</li>
                            <li>
                                <a href='/usercp/login/index.php'>
                                    <i class='dripicons-lock-open'></i>
                                    <span data-key='t-dashboard'>".LOGIN."</span>
                                </a>
                            </li>
                            <li>
                                <a href='/usercp/register/index.php'>
                                    <i class='dripicons-lock'></i>
                                    <span data-key='t-dashboard'>".REGISTER."</span>
                                </a>
                            </li>							
                        </ul>";
                    if(intval($_SESSION['xucp_police_uname']['xucp_police_conf_upgrade_note']) == 1) {
                        echo "
                        <div class='card sidebar-alert border-0 text-center mx-4 mb-0 mt-5'>
                            <div class='card-body'>
                                <div class='mt-4'>
                                    <h5 class='alertcard-title font-size-16'>Unlimited Access</h5>
                                    <p class='font-size-13'>Upgrade your Free Version, to select Pro Version.</p>
                                    <a href='https://discord.gg/xg5mnYUWch' class='btn btn-primary mt-2'>Buy upgrade now</a>
                                </div>
                            </div>
                        </div>";
                    } else {
                        // Even if you turn this off in the settings, you have the free version!
                    }
					echo "
                    </div>
                </div>
            </div>";
}