<?php
$current_url = current_url(); 
?>

<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="submenu <?= $current_url == base_url() ? 'active' : '' ?>">
                            <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{$url}" class="<?= $current_url == base_url() ? 'active' : '' ?>">Admin Dashboard</a></li>
                                <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
                                <li><a href="student-dashboard.html">Student Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-tasks"></i> <span> Complaints</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="students.html">Student List</a></li>
                                <li><a href="add-student.html">Student Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu <?= ($current_url == base_url('departments') || $current_url == base_url('add-department')) ? 'active' : '' ?>">
                            <a href="#" ><i class="fas fa-building"></i> <span> Departments</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{$url}departments" class="<?= $current_url == base_url('departments') ? 'active' : '' ?>">Department List</a></li>
                                <li><a href="{$url}add-department" class="<?= $current_url == base_url('add-department') ? 'active' : '' ?>">Department Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-columns"></i> <span> Programmes </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{$url}program">Programme List</a></li>
                                <li><a href="{$url}add-program">Programme Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Courses</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="subjects.html">Courses List</a></li>
                                <li><a href="add-subject.html">Courses Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-graduation-cap"></i> <span> Students</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="blog.html">Student List</a></li>
                                <li><a href="add-blog.html">Student Add</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="teachers.html">Lecturer List</a></li>
                                <li><a href="add-teacher.html">Lecturer Add</a></li>
                            </ul>
                        </li>
                        
                        
                        <li class="submenu">
                            <a href="#"><i class="fas fa-envelope"></i> <span>Notifications</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="invoices.html">General Notifications</a></li>
                                <li><a href="invoice-grid.html">Students</a></li>
                                <li><a href="add-invoice.html">Lecturers</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="settings.html"><i class="fas fa-cog"></i> <span>System Settings</span></a>
                        </li>
                        <!-- here -->
                        
                    </ul>
                </div>
            </div>
        </div>