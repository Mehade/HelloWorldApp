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
                         if($this->session->userdata('user_id') != NULL){
                             echo '<strong>NAME: </strong> '.$this->session->userdata('user_name').'<br/>';
                             echo '<strong>EMAIL: </strong> <a href="mailto:">'.$this->session->userdata('user_email').'</a><br/>';
                             echo '<strong>PHONE NO: </strong> '.$this->session->userdata('user_contact').'</a><br/>';
                             echo '<strong>BILLING ADDRESS: </strong> '.$this->session->userdata('billing_address').'<br/>';
                             echo '<strong>SHIPPING ADDRESS: </strong> '.$this->session->userdata('shipping_address').'<br/>';
                         }
                         ?>
                      
                     </address>
                   </div>

                   <hr />
                   
                   <h4>My Recent Purchases</h4>

                     <table class="table table-striped tcart">
                       <thead>
                         <tr>
                           <th>Date</th>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Price</th>
                           <th>Status</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>25-08-12</td>
                           <td>4423</td>
                           <td>HTC One</td>
                           <td>$530</td>
                           <td>Completed</td>
                         </tr>
                         <tr>
                           <td>15-02-12</td>
                           <td>6643</td>
                           <td>Sony Xperia</td>
                           <td>$330</td>
                           <td>Shipped</td>
                         </tr>
                         <tr>
                           <td>14-08-12</td>
                           <td>1283</td>
                           <td>Nokia Asha</td>
                           <td>$230</td>
                           <td>Processing</td>
                         </tr>                                               
                       </tbody>
                     </table>
               </div>
            </div>
            
            <div class="sep-bor"></div>
         </div>
      </div>
      
      
<?php
echo $this->load->view('footer');
?>