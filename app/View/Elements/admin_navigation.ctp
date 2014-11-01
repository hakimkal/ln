                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                           <div class="profile selected1 selected2"   alt="" ><a href="<?php echo $this->Html->url('/login');?>">My Profile</a></div>
                            <div class="profile selected2" id="tab2" alt="tab2.html" onClick="show_tab(this.id)">All Users</div>
                            <div class="profile selected2" ><a href="<?php echo $this->Html->url('/myListing');?>">Listed Properties</a></div>
  <div class="profile selected2" ><a href="<?php echo $this->Html->url('/listAPro');?>">Add a Property</a></div>
                            
                            <div class="language-switcher">
                                <div class="current en"><a href="#" lang="en">English</a></div><!-- /.current -->
                                <div class="options">
                                    <ul>
                                        <li style="width:80px;"><a href="<?php echo $this->Html->url('/logout');?>">Log Out</a></li>
                                    </ul>
                                </div><!-- /.options -->
                            </div><!-- /.language-switcher -->

                               <div class="language-switcher">
                                <div class="current settings" style="width:180px;"><a href="#">English</a></div><!-- /.current -->
                                <div class="options">
                                    <ul>
                                        <li style="width:180px;"><a href="<?php echo $this->Html->url('/property_types/add');?>">New Property Type </a></li>
                                       <li style="width:180px;"><a href="<?php echo $this->Html->url('/property_types/');?>">List Property Types </a></li>
                                <li style="width:180px;"><a href="<?php echo $this->Html->url('/property_contract_types/add');?>">New  Contract Type </a></li>
                                <li style="width:180px;"><a href="<?php echo $this->Html->url('/property_contract_types/');?>">List Contract Types </a></li>
                              <li style="width:180px;"><a href="<?php echo $this->Html->url('/property_amenities/add');?>">New  Amenity </a></li>
                                <li style="width:180px;"><a href="<?php echo $this->Html->url('/property_amenities/');?>">List Amenities </a></li>
                                
                                    </ul>
                                </div><!-- /.options -->
                            </div><!-- /.language-switcher -->
                            <form method="get" class="site-search" action="#">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Search" type="text" name="">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append -->
                            </form><!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->