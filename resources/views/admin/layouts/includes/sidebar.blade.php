<div class="sidebar" data-color="rose" data-background-color="black"
    data-image="{{ asset('assets/img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
            EC
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Education Center
        </a>
    </div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item  {{ Request::routeIs('admin.exams') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.exams') }}">
                    <i class="material-icons">sticky_note_2</i>
                    <p> Exams </p>
                </a>
            </li>
            <li
                class="nav-item  {{(Request::routeIs('admin.categories')|| Request::routeIs('admin.syllabi') )? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#syllabus">
                    <i class="material-icons">category</i>
                    <p> Syllabus
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{(Request::routeIs('admin.categories')||  Request::routeIs('admin.syllabi') )? 'show' : '' }}"
                    id="syllabus">
                    <ul class="nav">
                        <li class="nav-item  {{ Request::routeIs('admin.categories') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.categories') }}">
                                <i class="material-icons">category</i>
                                <p> Categories </p>
                            </a>
                        </li>
                        <li class="nav-item  {{ Request::routeIs('admin.syllabi') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.syllabi') }}">
                                <i class="material-icons">backpack</i>
                                <p> Syllabus </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item  {{(Request::routeIs('admin.about')|| Request::routeIs('admin.mission') )? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#about">
                    <i class="material-icons">about</i>
                    <p> About
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{(Request::routeIs('admin.about')||  Request::routeIs('admin.mission') )? 'show' : '' }}"
                    id="about">
                    <ul class="nav">
                        <li class="nav-item  {{ Request::routeIs('admin.about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.about') }}">
                                <i class="material-icons">category</i>
                                <p> About </p>
                            </a>
                        </li>
                        <li class="nav-item  {{ Request::routeIs('admin.mission') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.mission') }}">
                                <i class="material-icons">backpack</i>
                                <p> Mission and Vision </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item  {{ Request::routeIs('admin.team') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.team') }}">
                    <i class="material-icons">groups</i>
                    <p> Team </p>
                </a>
            </li>
            <li class="nav-item  {{ Request::routeIs('admin.generalSettings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.generalSettings') }}">
                    <i class="material-icons">settings</i>
                    <p> General Settings </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">image</i>
                    <p> Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/pricing.html">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Pricing </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/rtl.html">
                                <span class="sidebar-mini"> RS </span>
                                <span class="sidebar-normal"> RTL Support </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/timeline.html">
                                <span class="sidebar-mini"> T </span>
                                <span class="sidebar-normal"> Timeline </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/login.html">
                                <span class="sidebar-mini"> LP </span>
                                <span class="sidebar-normal"> Login Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/register.html">
                                <span class="sidebar-mini"> RP </span>
                                <span class="sidebar-normal"> Register Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/lock.html">
                                <span class="sidebar-mini"> LSP </span>
                                <span class="sidebar-normal"> Lock Screen Page </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/user.html">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal"> User Profile </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/pages/error.html">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal"> Error Page </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>