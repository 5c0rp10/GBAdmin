<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Inmate Management
        <small>Add / Edit Inmate</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Inmate Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>/inmate/addNewInmate" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="30">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control required " id="address" value="<?php echo set_value('address'); ?>" name="address" maxlength="75">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aadharno">Aadhar Number</label>
                                        <input type="text" class="form-control required digits" id="aadharno" value="<?php echo set_value('aadharno'); ?>" name="aadharno" maxlength="12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="text" class="form-control required " id="dob" value="<?php echo set_value('dob'); ?>" name="dob" maxlength="10">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doj">Date of Joining</label>
                                        <input type="text" class="form-control required " id="doj" value="<?php echo set_value('doj'); ?>" name="doj" maxlength="10">
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="dor">Date of Release</label>
                                          <input type="text" class="form-control required " id="dor" value="<?php echo set_value('dor'); ?>" name="dor" maxlength="10">
                                      </div>
                                  </div>
                                </div>

                                          <label for="inm_cat">Choose Category</label>

                                          <div class="input" style="display:block;clear:both">
                                            <?php $options = array("" => "" );?>
                                            <?php foreach ($inm_cat as $key => $value) {
                                              $options[$value->inm_cat_id] = $value->inm_cat_name;
                                            } ?>
                                            <?php echo form_dropdown('inm_cat',$options,set_value('inm_cat'),$attributes = array()); ?>
                                  </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Next" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>

                </div>
            </div>

        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
