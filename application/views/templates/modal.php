    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leaving so soon?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h1>Do you wish to logout?</h1>
              </div>
              <div class="modal-footer bg-whitesmoke br">
              <?=form_open(base_url()."logout");?>
                <button type="submit" class="btn btn-primary">Yes, I will go</button>
                <?=form_close();?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I will stay</button>                
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="ManageUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <?=form_open(base_url()."save_user");?>
            <input type="hidden" name="id" id="user_id">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage User Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required id="user_name">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required id="user_password">
                  </div>
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" required id="user_fullname">
                  </div>
                  <div class="form-group">
                    <label>Contact No.</label>
                    <input type="text" class="form-control" name="contactno" required id="user_contactno">
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
              </div>
            </div>
            <?=form_close();?>
          </div>
        </div>

        <div class="modal fade" id="ManageFish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <?=form_open(base_url()."save_fish");?>
            <input type="hidden" name="id" id="fish_id">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Fish Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="fish_description" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control" name="category" required id="fish_category">
                  </div>
                  <div class="form-group">
                    <label>Feeds Usage</label>
                    <input type="text" class="form-control" name="feed_usage" required id="fish_feed_usage">
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
              </div>
            </div>
            <?=form_close();?>
          </div>
        </div>

        <div class="modal fade" id="ManageFeeds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <?=form_open(base_url()."save_feeds");?>
            <input type="hidden" name="id" id="feeds_id">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Feeds Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="feeds_description" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Qauntity (in grams)</label>
                    <input type="text" class="form-control" name="quantity" required id="feeds_quantity">
                  </div>
                  <div class="form-group">
                    <label>Critical Level (in grams)</label>
                    <input type="text" class="form-control" name="stockalert" required id="feeds_alert">
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Submit</button>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
              </div>
            </div>
            <?=form_close();?>
          </div>
        </div>
        