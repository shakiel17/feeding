<div class="main-content">
        <section class="section">
          <div class="section-body">            
            <div class="row">
              <div class="col-12">
                <?php
                if($this->session->success){
                    ?>
                    <div class="alert alert-success"><?=$this->session->success;?></div>
                    <?php
                }
                ?>              
                <?php
                if($this->session->failed){
                    ?>
                    <div class="alert alert-danger"><?=$this->session->failed;?></div>
                    <?php
                }
                ?>              
                <div class="card">
                  <div class="card-header">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><h4>Notification History</h4></td>
                            <td align="right"><a href="#" class="btn btn-primary addUser" data-toggle="modal" data-target="#ManageUser"><i class="fas fa-plus"></i> New User</a></td>
                        </tr>
                    </table>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Shift</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                            foreach($users as $user){
                                echo "<tr>";
                                    echo "<td>$x.</td>";
                                    echo "<td>$user[message]</td>";
                                    echo "<td>$user[datearray]</td>";
                                    echo "<td align='center'>$user[timearray]</td>";
                                    echo "<td>".date('h:i A',strtotime($user['applicable_time']))." - ".date('h:i A',strtotime('1 hour',strtotime($user['applicable_time'])))."</td>";
                                    ?>
                                    <td align="center">
                                        <a href="<?=base_url();?>remove_notification/<?=$user['id'];?>" class="btn btn-danger" onclick="return confirm('Do you wish to remove this notification?'); return false;">Remove</a>
                                    </td>
                                    <?php
                                echo "</tr>";
                                $x++;
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>                      
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>