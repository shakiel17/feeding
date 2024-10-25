

<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url();?>main">
              <span class="logo-name">Fish Feeding</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="<?=base_url();?>main" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
            </li>
            <?php
            if($this->session->admin_login){
            ?>
            <li class="dropdown">
              <a href="<?=base_url();?>manage_fish" class="nav-link"><i
                  class="fas fa-fish"></i><span>Fish</span></a>              
            </li>
            <li class="dropdown">
              <a href="<?=base_url();?>manage_feeds" class="nav-link"><i
                  class="fab fa-bitbucket"></i><span>Feeds</span></a>
            </li>           
            <?php
            }
            ?>
            <li class="dropdown">
              <a href="<?=base_url();?>manage_feeding" class="nav-link"><i
                  class="fas fa-fill"></i><span>Feeding</span></a>
            </li>
            <?php
            if($this->session->admin_login){
            ?>
            <li class="dropdown"><a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-cog"></i><span>Purchases</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url();?>purchase_order">PO/PR</a></li>                                                      
              </ul>
            </li> 
            <li class="dropdown"><a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-file"></i><span>Reports</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url();?>manage_report">Monthly Report</a></li>
                  <li><a class="nav-link" href="<?=base_url();?>manage_expired">Expired Feeds</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-cogs"></i><span>Settings</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url();?>manage_user">User Management</a></li>                  
                  <li><a class="nav-link" href="<?=base_url();?>manage_notification">Notification</a></li>                  
              </ul>
            </li>            
            <?php
            }
            ?>
          </ul>
        </aside>
      </div>