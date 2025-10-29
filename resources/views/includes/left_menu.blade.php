<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{ asset('img/profile_small.jpg')}}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">




                                </span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>

                    <li>

                        <a href="{{ route('dashboard.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>

                    </li>
                    
                    
                    <li>
                        <a href="{{ route('country.index') }}"><i class="fa fa-map"></i> <span class="nav-label">Country</span></a>
                    </li>
                    <li>
                        <a href="{{ route('city.index') }}"><i class="fa fa-building"></i> <span class="nav-label">City</span></a>
                    </li>
                    <li>
                        <a href="{{ route('job_categories.index') }}"><i class="fa fa-list"></i> <span class="nav-label">Job Categories</span></a>
                    </li>
                    <li>
                        <a href="{{ route('job_types.index') }}"><i class="fa fa-tags"></i> <span class="nav-label">Job Types</span></a>
                    </li>
                    <li>
                        <a href="{{ route('education_levels.index') }}"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Education Levels</span></a>
                    </li>
                    <li>
                        <a href="{{ route('skill.index') }}"><i class="fa fa-cogs"></i> <span class="nav-label">Skills</span></a>
                    </li>
                    <li>
                        <a href="{{ route('company.index') }}"><i class="fa fa-building-o"></i> <span class="nav-label">Companies</span></a>
                    </li>
                    <li>
                        <a href="{{ route('ads_company.index') }}"><i class="fa fa-plus-circle"></i> <span class="nav-label">Ads Companies</span></a>
                    </li>
                    <li>
                        <a href="{{ route('ads_position.index') }}"><i class="fa fa-adn"></i> <span class="nav-label">Ads Position</span></a>
                    </li>
                    <li>
                        <a href="{{ route('jobs.index') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Jobs</span></a>
                    </li>
                    

                    

                    
                    
                    <li>
                        <a href="#"><i class="fa fa-brands fa-font-awesome"></i><span class="nav-label">Users</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">


                            <li><a href="{{ route('users.index') }}">list User</a></li>


                        </ul>
                    </li>



                </ul>

            </div>
        </nav>