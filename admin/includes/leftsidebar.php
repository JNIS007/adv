<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard
                        </span> </a>

                </li>
                <?php if ($_SESSION['utype'] == '1'): ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                            <span> Sub-admins </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="add-subadmins.php">Add Sub-admin</a></li>
                            <li><a href="manage-subadmins.php">Manage Sub-admin</a></li>
                        </ul>
                    </li>
                <?php endif; ?>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Destination </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-destination.php">Add Dest</a></li>
                        <li><a href="manage-destination.php">Manage Dest</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Category </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-category.php">Add Category</a></li>
                        <li><a href="manage-categories.php">Manage Category</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span>Sub Category </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-subcategory.php">Add Sub Category</a></li>
                        <li><a href="manage-subcategories.php">Manage Sub Category</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Posts (Adventure) </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-post.php">Add Posts</a></li>
                        <li><a href="other-category.php">Other Posts</a></li>
                        <li><a href="manage-other.php">Manage Others</a></li>
                        <li><a href="manage-posts.php">Manage Posts</a></li>
                        <li><a href="trash-posts.php">Trash Posts</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-note"></i> <span> Why Travel
                            with Us
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="whytravelwithusadmin.php">Add Visa Info</a></li>
                        <li><a href="manage-visa-info.php">Manage Visa Info</a></li>
                    </ul>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Top Adventure </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-top.php">Peak Top Adventure</a></li>
                        <li><a href="manage-top.php">Manage </a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Popular Adventure </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-pop.php">Peak Adventure</a></li>
                        <li><a href="manage-pop.php">Manage </a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Handle Depature </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="add-dep.php">Enable Depature</a></li>
                        <li><a href="manage-dep.php">Manage </a></li>
                    </ul>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Pages </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                        <span> Comments </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                        <li><a href="manage-comments.php">Approved Comments</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>


    </div>
    <!-- Sidebar -left -->

</div>