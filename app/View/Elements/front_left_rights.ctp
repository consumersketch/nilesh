<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">
					
<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				
				<li class="sidebar-toggler-wrapper">
					<div class="sidebar-toggler">
					</div>
					
				</li>
				
				
				<li class="<?php echo strtolower($this->params['controller']) == 'mails' ? 'active open' : '' ?>">
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">My Mails</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo Router::url(array("controller"=>"Mails","action"=>"inbox")) ?>">
							<i class="icon-home"></i>
							Inbox</a>
						</li>
						<li>
							<a href="<?php echo Router::url(array("controller"=>"Mails","action"=>"outbox")) ?>">
							<i class="icon-home"></i>
							Outbox</a>
						</li>
					</ul>
				</li>
				<li class="<?php echo strtolower($this->params['controller']) == 'photos' ? 'active open' : '' ?>">
					<a href="javascript:;">
					<i class="icon-puzzle"></i>
					<span class="title">My Photos</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo Router::url(array("controller"=>"Photos","action"=>"add")) ?>">
							<i class="icon-plus"></i>
							Add</a>
						</li>
						<li>						
							<a href="<?php echo Router::url(array("controller"=>"Photos","action"=>"view")) ?>">
							<i class="icon-home"></i>
							View</a>
						</li>
					</ul>
				</li>
			</ul>					
</div>
</div>

