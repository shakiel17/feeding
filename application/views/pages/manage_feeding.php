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
                            <td><h4>Fish Feeding</h4></td>
                            <td align="right"></td>
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
                            <th>Description</th>
                            <th>Category</th>
                            <th>Feeds Usage (in grams)</th>
                            <th>No. of feeding (today)</th>
                            <th>Feeds</th>
                            <th width="15%">Feeds (in grams)</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>                        
                            <?php
                            $x=1;
                            foreach($items as $user){
                                $date=date('Y-m-d');
                                $fed=$this->Feeding_model->getAllDispensingByFishDate($user['id'],$date);                                
                                $totalfeed=0;
                                if(count($fed) > 0){
                                  foreach($fed as $r){
                                    $totalfeed += $r['quantity'];
                                  }
                                }                                
                                if(($totalfeed/$user['feed_usage']) == 2){                                    
                                    $stat="disabled";
                                    $st=2;
                                }else if(($totalfeed/$user['feed_usage']) == 1){
                                    $stat="";
                                    $st=1;
                                }else{
                                    $stat="";
                                    $st=0;
                                }             
                                echo "<tr>";
                                    echo "<td>$x.</td>";
                                    echo "<td>$user[description]</td>";
                                    echo "<td>$user[category]</td>";
                                    echo "<td align='center'>$user[feed_usage]</td>";                                                                        
                                    echo "<td>$st</td>";                 
                                    ?>
                                    <?=form_open(base_url()."submit_feeding",array("onsubmit" => "return confirm('Do you wish to submit feeding?');return false;"));?>
                                    <?php
                                    echo "<td>
                                    <select name='stock_id' class='form-control' required>
                                        <option value=''>Select Feeds</option>
                                        ";
                                    $feeds=$this->Feeding_model->getAllFeeds();
                                    foreach($feeds as $i){
                                        echo "<option value='$i[code]'>$i[description]</option>";
                                    }
                                        echo "
                                    </select>
                                    </td>";                   
                                    ?>
                                    
                                    <input type="hidden" name="fish_id" value="<?=$user['id'];?>">
                                    <td><input type="text" name="quantity" class="form-control" value="<?=$user['feed_usage'];?>" required></td>
                                    <td align="center">
                                        <button type="submit" class="btn btn-success" title="Execute Feeding" <?=$stat;?>><i class="fas fa-fill"></i></a>                                        
                                    </td>
                                    <?=form_close();?>
                                    <?php
                                echo "</tr>";
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