 
 <?php $this->Html->addCrumb($type_of_users);?>
    <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
            <!-- New widget -->
            
          
          
          <div class="inner-spacer">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="1%">S/n</th>
                      <th width="55%" colspan="2">Staff</th>
                      <th width="19%">Email</th>
                       <th width="10%">Phone</th>
                     
                      <th class="text-center" width="10%">Edit</th>
                      <th  width="5%">Delete</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                   <?php for($i=0; $i< count($Users);$i++):?>
                    <tr>
                      <td width="1%"><span class="num"><?php echo $i+1;?></span></td>
                      <td colspan="2"><h5><?php echo $Users[$i]['User']['firstname']. '   '.$Users[$i]['User']['lastname'];?></h5>
                        <small><?php echo $Users[$i]['User']['sex']. ' , '. ucfirst($Users[$i]['User']['role']);?></small></td>
                      <td><?php echo $Users[$i]['User']['email'];?></td>
                      <td><?php echo $Users[$i]['User']['phone_number'];?></td>
                      <td class="text-center"><?php echo $this->Html->link('<i class="fa fa-edit (alias)"></i>',array('action'=>'edit',$Users[$i]['User']['id']),array( 'escape'=>false));?></td>
                    
                      <td class="text-center">
                      
                      <?php 
                      echo $this->Form->postLink ( '<i class="fa fa-times-circle"></i>', array (
                      		'action' => 'delete',
                      		 
                      		$Users[$i]['User']['id']
                      ), array ('escape'=>false,
                      		'class' => 'button small green square'
                      ), "Are you sure you wish to delete this user?" );
                      	
                      ?>
                      </td>
                    </tr>
                     <?php endfor;?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S/n</th>
                      <th colspan="2">Staff</th>
                      <th>Email</th>
                        <th>Phone</th>
                      <th class="text-center">Edit</th>
                      <th class="text-center">Delete</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>  
            
            
            
            
          </div>
          <!-- End .powerwidget --> 
          
        </div>
        <!-- /Inner Row Col-md-12 --> 
      </div>  
      
      