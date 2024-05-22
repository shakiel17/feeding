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