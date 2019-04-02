<header>
                <div class="row header-row">
                    <div class="col-lg-2 col-sm-3 col-xs-6 logo-outer">
                        <a href="#" title="Volunteer Overseas" class="logo"><img src="<?php echo ASSETS_URL;?>images/logo.png" alt=""><img class="color-logo" src="<?php echo ASSETS_URL;?>images/logo.png" alt=""></a>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-xs-6 menu-wrap">
                        <nav>
                            <ul>
                                <li><a href="OrganizationLists" title="Organization">Organization</a></li>
                                <li><a href="ProjectLists" title="Project List">Projects</a></li>
                                <li><a href="ApplicationLists" title="Application">Application</a></li>
                                <!-- <li><a href="Faq" title="FAQ"><?php if ($_SESSION["role"] == "superadmin") {?>FAQ <?php } else {}?></a></li> -->
                                    <li><a href="FaqListing" title="FAQ"><?php if ($_SESSION["role"] == "superadmin") {?>FAQ <?php } else {}?></a></li>
                                    <li><a href="CountryLists" title="Country Lists"><?php if ($_SESSION["role"] == "superadmin") {?>Country <?php } else {}?></a></li>
                                        <li><a href="CityLists" title="City Lists"><?php if ($_SESSION["role"] == "superadmin") {?>City <?php } else {}?></a></li>
                                        <li><a href="CategoryLists" title="Category Lists"><?php if ($_SESSION["role"] == "superadmin") {?>Category <?php } else {}?></a></li>
                                            <li><a href="ActivityLists" title="Activity Lists"><?php if ($_SESSION["role"] == "superadmin") {?>Activity <?php } else {}?></a></li>
                                            

                            </ul>
                        </nav>
                        <div class="right-block">
                        <label style="color:grey;"><?php echo $_SESSION["email"]; ?> </label>
                        <span >Currently logged in as :<?php echo $_SESSION["role"]; ?> </span>
                        <a href=" Logout" class="btn" title="Logout">Logout</a>
                        </div>
                    </div>
                </div>
                <a href="#" title="" class="hamburger-icon"><span></span></a>
 </header>