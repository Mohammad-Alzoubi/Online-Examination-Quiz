<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active">
                <a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{route('quiz.create')}}"><i class="menu-icon icon-bullhorn"></i>Create Quiz </a>
            </li>
            <li>
                <a href="{{route('quiz.index')}}"><i class="menu-icon icon-inbox"></i>View Quiz<b class="label green pull-right"> 11</b> </a>
            </li>
        </ul>
        <!-- End Quiz-->

        <ul class="widget widget-menu unstyled">
            <li>
                <a href="{{route('question.create')}}"><i class="menu-icon icon-bullhorn"></i>Create Question </a>
            </li>
            <li>
                <a href="{{route('question.index')}}"><i class="menu-icon icon-inbox"></i>View Question<b class="label green pull-right"> 11</b> </a>
            </li>
        </ul>
        <!--End Question-->

        <ul class="widget widget-menu unstyled">
            <li>
                <a href="{{route('user.create')}}"><i class="menu-icon icon-group"></i>Create user </a>
            </li>
            <li>
                <a href="{{route('user.index')}}"><i class="menu-icon icon-user"></i>View user</a>
            </li>
        </ul>
        <!--End User-->

        <ul class="widget widget-menu unstyled">
            <li>
                <a href="{{route('user.exam')}}"><i class="menu-icon icon-book"></i>Assign Exam </a>
            </li>
            <li>
                <a href="{{route('view.exam')}}"><i class="menu-icon icon-book"></i>View User Exam</a>
            </li>
        </ul>
        <!--End Assign Exam-->

        <ul class="widget widget-menu unstyled">
            <li>
                <a href="{{route('result')}}"><i class="menu-icon icon-book"></i>Assign Exam </a>
            </li>
        </ul>
        <!--End Result-->

        <ul class="widget widget-menu unstyled">
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                    <i class="menu-icon icon-signout"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>
        </ul>
    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->
