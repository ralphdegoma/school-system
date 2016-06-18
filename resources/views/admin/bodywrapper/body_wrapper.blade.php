@include('admin.modal-forms.security')
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo text-center">
            <a href="index.html">
             <img src="/assets/img/athena.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
          
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide">
                    </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-success">
                        7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><span class="bold">12 pending</span> notifications</h3>
                                <a href="extra_profile.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">just now</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-success">
                                        <i class="fa fa-plus"></i>
                                        </span>
                                        New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">3 mins</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">10 mins</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-warning">
                                        <i class="fa fa-bell-o"></i>
                                        </span>
                                        Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">14 hrs</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-info">
                                        <i class="fa fa-bullhorn"></i>
                                        </span>
                                        Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">2 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">3 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">4 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-warning">
                                        <i class="fa fa-bell-o"></i>
                                        </span>
                                        Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">5 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-info">
                                        <i class="fa fa-bullhorn"></i>
                                        </span>
                                        System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">9 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <li class="separator hide">
                    </li>
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-danger">
                        4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have <span class="bold">7 New</span> Messages</h3>
                                <a href="inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Lisa Wong </span>
                                        <span class="time">Just Now </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="../../assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Richard Doe </span>
                                        <span class="time">16 mins </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="../../assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Bob Nilson </span>
                                        <span class="time">2 hrs </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Lisa Wong </span>
                                        <span class="time">40 mins </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed auctor 40% nibh congue nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="../../assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Richard Doe </span>
                                        <span class="time">46 mins </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <li class="separator hide">
                    </li>
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-primary">
                        3 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li class="external">
                                <h3>You have <span class="bold">12 pending</span> tasks</h3>
                                <a href="page_todo.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">New release v1.2 </span>
                                        <span class="percent">30%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Application deployment</span>
                                        <span class="percent">65%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Mobile app release</span>
                                        <span class="percent">98%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Database migration</span>
                                        <span class="percent">10%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Web server upgrade</span>
                                        <span class="percent">58%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Mobile development</span>
                                        <span class="percent">85%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">New UI release</span>
                                        <span class="percent">38%</span>
                                        </span>
                                        <span class="progress progress-striped">
                                        <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile">
                        Nick </span>
                        <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                        <img alt="" class="img-circle" src="../../assets/admin/layout4/img/avatar9.jpg"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="extra_profile.html">
                                <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="page_calendar.html">
                                <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="inbox.html">
                                <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
                                3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="page_todo.html">
                                <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
                                7 </span>
                                </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="extra_lock.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="login.html">
                                <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
           
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="start ">
                    <a href="/">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="active open">
                    <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">Registrar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/sms/registrar/student-registration">
                            <i class="icon-user"></i>
                            Registration</a>
                        </li>
                        <li>
                            <a href="/sms/registrar/registered-list">
                            <i class="fa fa-list-alt"></i>
                            Registered List</a>
                        </li>
                        <li>
                            <a href="/sms/registrar/enrollment">
                            <i class="fa fa-share"></i>
                            Enrollment</a>
                        </li>
                        <li>
                            <a href="/sms/registrar/enrolled-student">
                            <i class="fa fa-list-alt"></i>
                            Enrolled List</a>
                        </li>
                    </ul>
                </li>
                 <li id="">
                    <a href="#">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Billing</span>
                    <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li id="schoolyearMenu">
                        <a href="/sms/billing/assessment">
                            <i class="fa fa-circle"></i>
                            Assessment</a>
                        </li>
                         <li id="gradelevelMenu">
                            <a href="/sms/billing/assign-fees">
                            <i class="fa fa-circle"></i>
                            Assign Fees </a>
                        </li>
                        <li id="gradelevelMenu">
                            <a href="/sms/billing/student-bill">
                            <i class="fa fa-circle"></i>
                            Grade Level </a>
                        </li>
                    </ul>
                </li>  
                <li id="setupMenu">
                    <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Setup</span>
                    <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li id="academicsMenu">
                            <a href="/sms/setup/academics">
                            Academics
                            <span class="arrow open"></span>
                            </a>
                             <ul class="sub-menu">
                                <li id="schoolyearMenu">
                                    <a href="/sms/setup/academics/school-year">
                                    <i class="fa fa-circle"></i>
                                    School Year </a>
                                </li>
                                 <li id="syMonthTemp">
                                    <a href="/sms/setup/academics/sy-month-template">
                                    <i class="fa fa-circle"></i>
                                    SY Month Template </a>
                                </li>
                                <li id="gradelevelMenu">
                                    <a href="/sms/setup/academics/grade-level">
                                    <i class="fa fa-circle"></i>
                                    Grade Level </a>
                                </li>
                                <li id="sectionMenu">
                                    <a href="/sms/setup/academics/section">
                                    <i class="fa fa-circle"></i>
                                    Section</a>
                                </li>
                                <li id="subjectMenu">
                                    <a href="/sms/setup/academics/subject">
                                    <i class="fa fa-circle"></i>
                                    Subject</a>
                                </li>
                                <li id="assignMenu">
                                    <a href="/sms/setup/academics/assign-subject">
                                    <i class="fa fa-circle"></i>
                                    Assign Subjects</a>
                                </li>
                                <li id="scheduleMenu">
                                    <a href="/sms/setup/academics/schedule">
                                    <i class="fa fa-circle"></i>
                                    Schedule</a>
                                </li>
                            </ul>
                        </li>
                        <li id="billingMenu">
                            <a href="#">
                            Billing
                            <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li id="feesMenu">
                                    <a href="#">
                                     <i class="fa fa-circle"></i>
                                     <span class="arrow open"></span>
                                    Setup Fees </a>
                                    <ul class="sub-menu">
                                      <li id="gradelevelfeeMenu">
                                        <a href="/sms/setup/billing/fee-category">
                                        <i class="fa fa-circle"></i>
                                          Fee Category</a>
                                      </li>
                                      <li id="gradelevelfeeMenu">
                                        <a href="/sms/setup/billing/fees">
                                        <i class="fa fa-circle"></i>
                                          Fees </a>
                                      </li>
                                    </ul>
                                </li>
                                <li id="gradelevelfeeMenu">
                                    <a href="/sms/setup/billing/grade-level-fees">
                                    <i class="fa fa-circle"></i>
                                    Grade Level Fees </a>
                                </li>
                                 <li id="paymenttypeMenu">
                                    <a href="/sms/setup/billing/payment-type-schedule">
                                    <i class="fa fa-circle"></i>
                                    Payment Type Schedule</a>
                                </li>
                                <!-- <li id="tuitionrefMenu">
                                    <a href="/sms/setup/billing/tuition-reference">
                                    <i class="fa fa-circle"></i>
                                    Tuition Reference </a>
                                </li> -->
                                <li id="duedatesMenu">
                                    <a href="/sms/setup/billing/due-dates">
                                    <i class="fa fa-circle"></i>
                                    Due Dates </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{substr_replace(Request::root(), "", -2)}}83" target="_blank">
                    <i class="fa fa-clock-o"></i>
                    <span class="title">Kronos</span>
                    </a>
                </li>
                <li>
                    <a href="{{substr_replace(Request::root(), "", -2)}}84" target="_blank">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="title">Pythagoras</span>
                    </a>
                </li>
                
              
               
               
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                             Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE HEAD -->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <!-- <h1>Blank Page <small>blank page</small></h1> -->
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->
                
                <!-- END PAGE TOOLBAR -->
            </div>
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
             <!--    <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Page Layouts</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Blank Page</a>
                </li> -->
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
         Powered by: WYRED INNOVATIONS
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>