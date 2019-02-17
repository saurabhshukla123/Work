<header>
                <div class="row header-row">
                    <div class="col-lg-2 col-sm-3 col-xs-6 logo-outer">
                        <a href="index.html" title="Volunteer Overseas" class="logo"><img src="images/logo_1.png" alt=""><img class="color-logo" src="images/logo.png" alt=""></a>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-xs-6 menu-wrap">
                        <nav>
                            <ul>
                            <li><a href="admindashboard.php" title="Dashboard"><?php if($_SESSION["role"]=="superadmin") {?>Dashboard<?php } else if($_SESSION["role"]=="organization") {?><a href="orgdashboard.php" title="Dashboard">Dashboard</a> <?php }?></a></li>

                                <li><a href="organizationlisting.php" title="Organization">Organization</a></li>
                                    <li><a href="projectlisting.php" title="Project List">Projects</a></li>
                                <li><a href="#" title="Application">Application</a></li>
                                <li><a href="../faq.php" title="FAQ"><?php if($_SESSION["role"]=="superadmin") {?>FAQ <?php } else {}?></a></li>
                                <li><a href="faqlisting.php" title="FAQ"><?php if($_SESSION["role"]=="superadmin") {?>Manage FAQ <?php } else {}?></a></li>
                          
                            </ul>
                        </nav>
                        <div class="right-block">
                            <a href="logout.php" class="btn" title="Login">Logout</a>
                        </div>
                    </div>
                </div>
                <a href="#" title="" class="hamburger-icon"><span></span></a>
            </header>