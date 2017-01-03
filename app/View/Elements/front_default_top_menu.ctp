<div class="top-menu">
<ul class="nav navbar-nav pull-right">
<li class="dropdown dropdown-user">
    <?php if (isset($authUser)) { ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
		<span class="username">
		My Profile </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
             <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'edit',
                $authUser['id'], 'admin' => true, 'plugin' => false)); ?>">Edit Profile </a>
        </li>
        <li>
            <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'dashboard', 'admin' => true, 'plugin' => false)); ?>">Dashboard</a>
        </li>
        <li>
         <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'logout', 'admin' => true, 'plugin' => false)); ?>">Log Out</a>
        </li>
    </ul>
    <?php } ?>

    <?php if (isset($front_auth_User)) { ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <span class="username">
					<?php echo	'My Profile'; ?> </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'profile', 'admin' => false, 'plugin' => false
             )); ?>"> <?php echo $this->General->first_letter_capitalized
            ($front_auth_User['full_name']); ?> (Edit)</a>
        </li>
        <li>
            <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'dashboard', 'admin' => false, 'plugin' => false)); ?>">Dashboard</a>
        </li>
        <li>
            <a href="<?php echo Router::url(array('controller' => 'Users', 'action' => 'logout', 'admin' => false, 'plugin' => false)); ?>"> Log Out </a>
        </li>
    </ul>
    <?php } ?>

</li>
</ul>
</div>