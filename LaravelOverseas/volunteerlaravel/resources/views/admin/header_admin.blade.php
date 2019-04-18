@section('header')
<div class="wrapper admin-wrapper small-header">
<header>
                <div class="row header-row">
                    <div class="col-lg-2 col-sm-3 col-xs-6 logo-outer">
                        <a href="#" title="Volunteer Overseas" class="logo"><img src="<?php echo ASSETS_URL;?>images/logo.png" alt=""><img class="color-logo" src="<?php echo ASSETS_URL;?>images/logo.png" alt=""></a>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-xs-6 menu-wrap">
                        <nav>
                            <ul>
                            @if(Request::session()->get('role') =='organization') 
                                <li><a href="#" title="Organization">Organization</a></li>
                                <li><a href="#" title="Projects">Projects</a></li>                                
                                <li><a href="ApplicationLists" title="Application">Application</a></li>
                                @elseif(Request::session()->get('role') =='superadmin')
                                <li><a href="FaqLists" title="Faq">Faq</a></li>
                                <li><a href="ApplicationLists" title="Application">Application</a></li>
                                <li><a href="ActivityList" title="Activity">Activity</a></li>
                                <li><a href="CategoryList" title="Category">Category</a></li>
                                <li><a href="CityList" title="City">City</a></li>
                                <li><a href="CountryList" title="Country">Country</a></li>
                                <li><a href="#" title="Organization">Organization</a></li>
                                <li><a href="#" title="Projects">Projects</a></li>
                            @endif
                            </ul>
                        </nav>
                        <div class="right-block">
                        <label style="color:grey;"><?php echo  Request::session()->get('email');?></label>
                        <span >Currently logged in as :<?php echo  Request::session()->get('role'); ?> </span>
                        <a href=" Logout" class="btn" title="Logout">Logout</a>
                        </div>
                    </div>
                </div>
                <a href="#" title="" class="hamburger-icon"><span></span></a>
 </header>
 </div>
@show
           