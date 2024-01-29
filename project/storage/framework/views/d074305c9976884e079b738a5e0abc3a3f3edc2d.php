    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.gs.menubuilder')); ?>">
            <i class="fas fa-compass"></i>
            <span><?php echo e(__('Menu Builder')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.referral.index')); ?>">
            <i class="fas fa-cogs"></i>
            <span><?php echo e(__('Referral')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manage_plan" aria-expanded="true" aria-controls="collapseTable">
            <i class="fab fa-telegram-plane"></i>
            <span><?php echo e(__('Manage Plan')); ?></span>
        </a>
        <div id="manage_plan" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.plans.index')); ?>"><?php echo e(__('All Plans')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.plans.create')); ?>"><?php echo e(__('Create Plan')); ?></a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invest_properties" aria-expanded="true" aria-controls="collapseTable">
            <i class="fa fa-home"></i>
            <span><?php echo e(__('Invests')); ?></span>
        </a>
        <div id="invest_properties" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.invests.index')); ?>"><?php echo e(__('Invests')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.invest.properties.index')); ?>"><?php echo e(__('Properties')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#property_contract" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-sticky-note"></i>
            <span><?php echo e(__('Property Contracts')); ?> </span>
        </a>
        <div id="property_contract" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.property.contracts.rents')); ?>"><?php echo e(__('Rent')); ?> <span class="badge badge-danger"></span></a>
                <a class="collapse-item" href="<?php echo e(route('admin.property.contracts.sells')); ?>"><?php echo e(__('Sell')); ?> <span class="badge badge-danger"></a>
                <a class="collapse-item" href="<?php echo e(route('admin.property.order.index')); ?>"><?php echo e(__('Orders')); ?> </span></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manage_properties" aria-expanded="true" aria-controls="collapseTable">
            <i class="fa fa-home"></i>
            <span><?php echo e(__('Manage Properties')); ?></span>
        </a>
        <div id="manage_properties" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.properties.index')); ?>"><?php echo e(__('All Properties')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.categories.index')); ?>"><?php echo e(__('Categories')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.locations.index')); ?>"><?php echo e(__('Locations')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.attributes.index')); ?>"><?php echo e(__('Attributes')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.dynamic.from.create')); ?>"><?php echo e(__('Requirement Form')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.schedules.index')); ?>"><?php echo e(__('Schedules')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.properties.enquiries.index')); ?>">
            <i class="fas fa-envelope-open-text"></i>
            <span><?php echo e(__('Manage Contacts')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.property.review.index')); ?>">
            <i class="fab fa-rev"></i>
            <span><?php echo e(__('Property Reviews')); ?>  <span class="badge badge-danger"><?php echo e(DB::table('property_reviews')->whereView(0)->count()); ?></span></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.agent.verification.index')); ?>">
            <i class="fas fa-user-check"></i>
            <span><?php echo e(__('Agents')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-user"></i>
            <span><?php echo e(__('Manage Customers')); ?></span>
        </a>
        <div id="customer" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.user.index')); ?>"><?php echo e(__('User List')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.kyc.info','user')); ?>"><?php echo e(__('User KYC Info')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.manage.module')); ?>"><?php echo e(__('User KYC Modules')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.user.bonus')); ?>"><?php echo e(__('Referral Bonus')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.transactions.index')); ?>">
            <i class="fas fa-chart-line"></i>
            <span><?php echo e(__('Transactions')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdraw" aria-expanded="true" aria-controls="collapseTable">
            <i class="fab fa-cc-mastercard"></i>
            <span><?php echo e(__('Withdraws')); ?></span>
        </a>
        <div id="withdraw" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.withdraw.index')); ?>"><?php echo e(__('Withdraw Request')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin-withdraw-method-index')); ?>"><?php echo e(__('Withdraw Method')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.deposits.index')); ?>">
            <i class="fas fa-piggy-bank"></i>
            <span><?php echo e(__('Deposits')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-newspaper"></i>
            <span><?php echo e(__('Manage Blog')); ?></span>
        </a>
        <div id="blog" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.cblog.index')); ?>"><?php echo e(__('Categories')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.blog.index')); ?>"><?php echo e(__('Posts')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-cogs"></i>
            <span><?php echo e(__('General Settings')); ?></span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.gs.logo')); ?>"><?php echo e(__('Logo')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.fav')); ?>"><?php echo e(__('Favicon')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.load')); ?>"><?php echo e(__('Loader')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.contents')); ?>"><?php echo e(__('Website Contents')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.cookie')); ?>"><?php echo e(__('Cookie Concent')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.customcss')); ?>"><?php echo e(__('Custom css')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.footer')); ?>"><?php echo e(__('Footer')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.error.banner')); ?>"><?php echo e(__('Error Banner')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.maintenance')); ?>"><?php echo e(__('Website Maintenance')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#homepage" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-igloo"></i>
            <span><?php echo e(__('Home Page Manage')); ?></span>
        </a>
        <div id="homepage" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.ps.hero')); ?>"><?php echo e(__('Hero Section')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.review.index')); ?>"><?php echo e(__('Testimonial Section')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.ps.download')); ?>"><?php echo e(__('Download apps Section')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.ps.call')); ?>"><?php echo e(__('Call To Action Section')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.ps.heading')); ?>"><?php echo e(__('Section Heading')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.ps.customization')); ?>"><?php echo e(__('Homepage Customization')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#email_settings" aria-expanded="true" aria-controls="collapseTable">
            <i class="fa fa-envelope"></i>
            <span><?php echo e(__('Email Settings')); ?></span>
        </a>
        <div id="email_settings" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.mail.index')); ?>"><?php echo e(__('Email Template')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.mail.config')); ?>"><?php echo e(__('Email Configurations')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.group.show')); ?>"><?php echo e(__('Group Email')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sms_gateways" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-sms"></i>
            <span><?php echo e(__('SMS Settings')); ?></span>
        </a>
        <div id="sms_gateways" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.gs.nexmo')); ?>"><?php echo e(__('Nexmo')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.gs.twilio')); ?>"><?php echo e(__('Twilio')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.sms.index')); ?>"><?php echo e(__('SMS Template')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.user.message')); ?>">
            <i class="fas fa-vote-yea"></i>
            <span><?php echo e(__('Messages')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_gateways" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-newspaper"></i>
            <span><?php echo e(__('Payment Settings')); ?></span>
        </a>
        <div id="payment_gateways" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.currency.index')); ?>"><?php echo e(__('Currencies')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.payment.index')); ?>"><?php echo e(__('Payment Gateways')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.role.index')); ?>">
            <i class="fa fa-crop"></i>
            <span><?php echo e(__('Manage Roles')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.staff.index')); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span><?php echo e(__('Manage Staff')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.manage.kyc.user','user')); ?>">
            <i class="fas fa-child"></i>
            <span><?php echo e(__('Manage KYC Form')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#langs" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-language"></i>
            <span><?php echo e(__('Language Manage')); ?></span>
        </a>
        <div id="langs" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.lang.index')); ?>"><?php echo e(__('Website Language')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.tlang.index')); ?>"><?php echo e(__('Admin Panel Language')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.font.index')); ?>">
            <i class="fas fa-font"></i>
            <span><?php echo e(__('Fonts')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-edit"></i>
            <span><?php echo e(__('Menu Page Settings')); ?></span>
        </a>
        <div id="menu" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.ps.contact')); ?>"><?php echo e(__('Contact Us Page')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.page.index')); ?>"><?php echo e(__('Other Pages')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seoTools" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-wrench"></i>
            <span><?php echo e(__('SEO Tools')); ?></span>
        </a>
        <div id="seoTools" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.seotool.analytics')); ?>"><?php echo e(__('Google Analytics')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.social.links.index')); ?>"><?php echo e(__('Social Links')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.sitemap.index')); ?>">
            <i class="fa fa-sitemap"></i>
            <span><?php echo e(__('Sitemaps')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.cache.clear')); ?>">
            <i class="fas fa-sync"></i>
            <span><?php echo e(__('Clear Cache')); ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sactive" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-at"></i>
            <span><?php echo e(__('System Activation')); ?></span>
        </a>
        <div id="sactive" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin-activation-form')); ?>"><?php echo e(__('Activation')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin-generate-backup')); ?>"><?php echo e(__('Generate Backup')); ?></a>
            </div>
        </div>
    </li>


<?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/includes/admin/roles/super.blade.php ENDPATH**/ ?>