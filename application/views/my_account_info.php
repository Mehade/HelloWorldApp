<?php
echo $this->load->view('header');
?>


<!-- Page title -->
      <div class="page-title">
         <div class="container">
            <h2><i class="icon-desktop color"></i>Account Information <small>You can change/view all of your informations</small></h2>
            <hr />
         </div>
      </div>
      <!-- Page title -->
      
      <!-- Page content -->
      
      <div class="account-content">
         <div class="container">
            
            <div class="row">
               <div class="col-md-3">
                  <div class="sidey">
                     <ul class="nav">
                         <li><a href="<?php echo base_url() ?>user/my_account_info">My Account</a></li>                                                                           
                         <li><a href="<?php echo base_url() ?>user/edit_profile">Edit Profile</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-9">
                  <h3><i class="icon-user color"></i> &nbsp;My Account</h3>
                  <!-- Your details -->
                   <div class="address">
                     <address>
                         
                         <?php                         
                             echo '<strong>NAME: </strong> '.$userInfo->user_name.'<br/>';
                             echo '<strong>EMAIL: </strong> <a href="mailto:">'.$userInfo->user_email.'</a><br/>';
                             echo '<strong>PHONE NO: </strong> '.$userInfo->user_contact.'</a><br/>';
                             echo '<strong>BILLING ADDRESS: </strong> '.$userInfo->billing_address.'<br/>';
                             echo '<strong>SHIPPING ADDRESS: </strong> '.$userInfo->shipping_address.'<br/>';                         
                         ?>
                      
                     </address>
                   </div>

                   <hr />
                   

               </div>
            </div>
            
            <div class="sep-bor"></div>
         </div>
      </div>
</div>
      
      
<?php
echo $this->load->view('footer');
?>