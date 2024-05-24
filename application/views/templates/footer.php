    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?=base_url();?>design/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?=base_url();?>design/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=base_url();?>design/assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="<?=base_url();?>design/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=base_url();?>design/assets/js/custom.js"></script>
  <script src="<?=base_url();?>design/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?=base_url();?>design/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url();?>design/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=base_url();?>design/assets/js/page/datatables.js"></script>
  <script>
    $('.addUser').click(function(){
      document.getElementById('user_id').value = '';
      document.getElementById('user_name').value = '';
      document.getElementById('user_password').value = '';
      document.getElementById('user_fullname').value = '';      
    });
    $('.editUser').click(function(){
      var data = $(this).data('id');
      var id = data.split('_');
      document.getElementById('user_id').value = id[0];
      document.getElementById('user_name').value = id[1];
      document.getElementById('user_password').value = id[2];
      document.getElementById('user_fullname').value = id[3];      
    });
    $('.addFish').click(function(){
      document.getElementById('fish_id').value = '';
      document.getElementById('fish_description').value = '';
      document.getElementById('fish_category').value = '';
      document.getElementById('fish_feed_usage').value = '';      
    });
    $('.editFish').click(function(){
      var data = $(this).data('id');
      var id = data.split('_');
      document.getElementById('fish_id').value = id[0];
      document.getElementById('fish_description').value = id[1];
      document.getElementById('fish_category').value = id[2];
      document.getElementById('fish_feed_usage').value = id[3];      
    });

    $('.addFeeds').click(function(){
      document.getElementById('feeds_id').value = '';
      document.getElementById('feeds_description').value = '';
      document.getElementById('feeds_quantity').value = '';
      document.getElementById('feeds_alert').value = '';      
      document.getElementById('feeds_quantity').disabled = false;
    });
    $('.editFeeds').click(function(){
      var data = $(this).data('id');
      var id = data.split('_');
      document.getElementById('feeds_id').value = id[0];
      document.getElementById('feeds_description').value = id[1];
      document.getElementById('feeds_quantity').value = id[2];
      document.getElementById('feeds_alert').value = id[3];      
      document.getElementById('feeds_quantity').disabled = true;
    });
  </script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>