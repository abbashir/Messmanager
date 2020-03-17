<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>

        {{--<li>--}}
            {{--<a href="#memberSetting" data-toggle="collapse">--}}
                {{--<i class="fa fa-fw fa-users"></i> Member Setting--}}
            {{--</a>--}}
            {{--<ul id="memberSetting" class="list-unstyled collapse">--}}

                {{--<li><a href="{{route('admin.member.all')}}"><i class="far fa-circle"></i> All Member</a></li>--}}
                {{--<li><a href="{{route('admin.member.inactive')}}"><i class="far fa-circle"></i> Inactive Member</a></li>--}}

            {{--</ul>--}}
        {{--</li>--}}

{{--        <li>--}}
{{--            <a href="#Campaigns" data-toggle="collapse">--}}
{{--                <i class="fas fa-eye"></i> Campaigns--}}
{{--            </a>--}}
{{--            <ul id="Campaigns" class="list-unstyled collapse">--}}

{{--                <li><a href="{{route('admin.campaign_category.index')}}"><i class="far fa-circle"></i> Campaigns Category</a></li>--}}
{{--                <li><a href="{{route('admin.campaign.pending')}}"><i class="far fa-circle"></i> Pending Campaigns</a></li>--}}
{{--                <li><a href="{{route('admin.campaign.all')}}"><i class="far fa-circle"></i> In-progress Campaigns</a></li>--}}
{{--                <li><a href="{{route('admin.campaign.log')}}"><i class="far fa-circle"></i> Campaigns Log</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="#Withdraw" data-toggle="collapse">--}}
{{--                <i class="fa fa-fw fa-arrow-down"></i> Withdraw System--}}
{{--            </a>--}}
{{--            <ul id="Withdraw" class="list-unstyled collapse">--}}

{{--                <li><a href="{{route('admin.withdraw.index')}}"><i class="far fa-circle"></i> Withdraw Methods</a></li>--}}
{{--                <li><a href="{{route('admin.show.withdraw.request')}}"><i class="far fa-circle"></i> Withdraw Requests</a></li>--}}
{{--                <li><a href="{{route('admin.show.withdraw.log')}}"><i class="far fa-circle"></i> Withdraw Log</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}
{{--        <li id="memberSetting"><a href="{{route('admin.member.all')}}"> <i class="fa fa-fw fa-users"> </i> All Member</a></li>--}}



{{--        <li>--}}
{{--            <a href="#blog" data-toggle="collapse">--}}
{{--                <i class="fab fa-blogger"></i> Announcement--}}
{{--            </a>--}}
{{--            <ul id="blog" class="list-unstyled collapse">--}}
{{--                <li><a href="{{route('admin.blogCategory.index')}}"><i class="fa fa-fw fa-list"></i> Category</a>--}}
{{--                </li>--}}
{{--                <li><a href="{{route('admin.post.index')}}"><i class="fa fa-fw fa-list"></i> Announcement</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}


{{--        <li>--}}
{{--            <a href="#Gateways" data-toggle="collapse">--}}
{{--                <i class="fas fa-dollar-sign"></i> Deposits--}}
{{--            </a>--}}
{{--            <ul id="Gateways" class="list-unstyled collapse">--}}
{{--                <li><a href="{{route('admin.gateway')}}"><i class="fas fa-dollar-sign"></i> Gateways</a></li>--}}
{{--                <li><a href="{{route('admin.all.deposit.history')}}"><i class="fas fa-dollar-sign"></i> Deposit History</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}




{{--        <li>--}}
{{--            <a href="#frontEndSetting" data-toggle="collapse">--}}
{{--                <i class="fas fa-desktop fa-fw"></i> FrontEnd Settings--}}
{{--            </a>--}}
{{--            <ul id="frontEndSetting" class="list-unstyled collapse">--}}

{{--                <li><a href="{{route('admin.banner')}}"><i class="fab fa-product-hunt"></i> Banner</a></li>--}}
{{--                <li><a href="{{route('admin.slider')}}"><i class="fab fa-product-hunt"></i> Slider</a></li>--}}
{{--                <li><a href="{{route('admin.aboutSettings')}}"><i class="fas fa-info fa-fw"></i> About</a></li>--}}
{{--                <li><a href="{{route('admin.OurTeam.index')}}"><i class="fas fa-user"></i> Best Worker</a></li>--}}

{{--                <li><a href="{{route('admin.contact')}}"><i class="fas fa-address-book"></i> Contact</a></li>--}}
{{--                <li><a href="{{route('admin.social_setting')}}"><i class="fas fa-share-alt"></i> Social Settings</a></li>--}}
{{--                <li><a href="{{route('admin.counter')}}"><i class="fab fa-product-hunt"></i> Counter</a></li>--}}
{{--                <li><a href="{{route('admin.term')}}"><i class="fab fa-product-hunt"></i> Term</a></li>--}}
{{--                <li><a href="{{route('admin.policy')}}"><i class="fab fa-product-hunt"></i> Policy</a></li>--}}
{{--                <li><a href="{{route('admin.faq.index')}}"><i class="fab fa-product-hunt"></i> Faq setting</a></li>--}}
{{--                <li><a href="{{route('admin.login.signup')}}"><i class="fab fa-product-hunt"></i> Login + signup</a></li>--}}
{{--                <li><a href="{{route('admin.com-info.index')}}"><i class="fas fa-info fa-fw"></i> company info</a></li>--}}

{{--                <li><a href="{{route('admin.footerSettings')}}"><i class="fab fa-simplybuilt"></i> Footer</a></li>--}}

{{--            </ul>--}}
{{--        </li>--}}

        <li id="activeLang"><a href="{{route('borders.index')}}"> <i class="fa fa-fw fa-users"> </i> Manage Border</a></li>
{{--        <li id="active_ad"><a href="{{route('admin.advertisement')}}"> <i class="fab fa-adversal"></i> Advertisement</a></li>--}}

        <li>
            <a href="#meals" data-toggle="collapse">
                <i class="fas fa-cog fa-cutlery"></i> Meal
            </a>
            <ul id="meals" class="list-unstyled collapse">
                <li><a href="{{route('meal.create')}}"> <i class="fa fa-fw fa-cog"> </i> Add Meal</a></li>
                <li><a href="{{route('meal.index')}}"> <i class="fa fa-fw fa-cog"> </i> My Added Meal</a></li>

            </ul>
        </li>
        <li>
            <a href="#ledger" data-toggle="collapse">
                <i class="fas fa-cog fa-cutlery"></i> Ledger
            </a>
            <ul id="ledger" class="list-unstyled collapse">
                <li><a href="{{route('ledger.index')}}"> <i class="fa fa-fw fa-cog"> </i>Ledger List</a></li>

            </ul>
        </li>
        <li>
            <a href="#expenses" data-toggle="collapse">
                <i class="fas fa-cog fa-cutlery"></i> Expense
            </a>
            <ul id="expenses" class="list-unstyled collapse">
                <li><a href="{{route('expense.create')}}"> <i class="fa fa-fw fa-cog"> </i>Create Expenses</a></li>
                <li><a href="{{route('expense.index')}}"> <i class="fa fa-fw fa-cog"> </i>Expenses List</a></li>
            </ul>
        </li>

    </ul>

</div>

