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
                <?=form_open(base_url()."remove_expired",array("onsubmit" => "return confirm('Do you wish to remove expired feeds?');return false;"));?>
                <div class="card">
                  <div class="card-header">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><h4>Expired Feeds</h4></td>
                            <td align="right"><button type="submit" class="btn btn-danger">Remove Expired</button></td>
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
                            <th>Qty (in grams)</th>
                            <th>Expiration</th>                            
                          </tr>
                        </thead>
                        <tbody>                        
                            <?php
                            $date=date('Y-m-d');
                            $query=$this->Feeding_model->db->query("SELECT s.description,SUM(st.quantity) as soh,st.expiration,s.code,st.refno FROM stocktable st INNER JOIN stocks s ON s.code=st.stock_id WHERE st.expiration <= '$date' GROUP BY refno,stock_id HAVING soh > 0");
                            if($query->num_rows() >0){
                                $items=$query->result_array();
                                $x=1;
                                foreach($items as $item){
                                    echo "<input type='checkbox' name='refno[]' value='$item[refno]' checked style='display:none;'>";
                                    echo "<input type='checkbox' name='code[]' value='$item[code]' checked style='display:none;'>";
                                    echo "<input type='checkbox' name='expiration[]' value='$item[expiration]' checked style='display:none;'>";
                                    echo "<input type='checkbox' name='soh[]' value='$item[soh]' checked style='display:none;'>";
                                    echo "<tr>";
                                        echo "<td>$x.</td>";
                                        echo "<td>$item[description]</td>";
                                        echo "<td>$item[soh]</td>";
                                        echo "<td>$item[expiration]</td>";
                                    echo "</tr>";
                                    $x++;
                                }
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?=form_close();?>       
                <div class="card">
                  <div class="card-header">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><h4>List of Removed Expired Feeds</h4></td>
                            <td align="right"></td>
                        </tr>
                    </table>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="table-2">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>RRNo</th>
                            <th>Description</th>
                            <th>Qty (in grams)</th>
                            <th>Expiration</th>                            
                          </tr>
                        </thead>
                        <tbody>                        
                            <?php
                            $date=date('Y-m-d');
                            $query=$this->Feeding_model->db->query("SELECT s.description,SUM(st.quantity) as soh,st.expiration,s.code,st.refno FROM expired st INNER JOIN stocks s ON s.code=st.stock_id WHERE st.expiration <= '$date' GROUP BY refno,stock_id");
                            if($query->num_rows() >0){
                                $items=$query->result_array();
                                $x=1;
                                foreach($items as $item){
                                   
                                    echo "<tr>";
                                        echo "<td>$x.</td>";
                                        echo "<td>$item[refno]</td>";
                                        echo "<td>$item[description]</td>";
                                        echo "<td>$item[soh]</td>";
                                        echo "<td>$item[expiration]</td>";
                                    echo "</tr>";
                                    $x++;
                                }
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