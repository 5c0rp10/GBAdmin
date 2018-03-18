<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Sponser Management
        <small>Add / Edit Sponser</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Sponser Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>/sponsor/addNewSponsor" method="post" role="form">
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
                                        <label for="mobileno">Mobile Number</label>
                                        <input type="text" class="form-control required digits" id="mobileno" value="<?php echo set_value('mobileno'); ?>" name="mobileno" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="detail">Detail</label>
                                      <input type="text" class="form-control " id="detail" value="<?php echo set_value('detail'); ?>" name="detail" maxlength="2500">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                </div>
                              </div>
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
