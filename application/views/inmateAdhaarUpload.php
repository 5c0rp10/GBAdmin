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
                        <h3 class="box-title">Upload Inmate Aadhar</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <div class="box-body">


                    <label for="aadhar">Aadhar</label>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                    <?php echo form_open_multipart('inmate/do_upload_aadhar');?>

                    <input type="file" name="aadhar" size="20" />

                    </br>

                    <input type="submit"  class="btn btn-primary" value="Upload" />

                    </form>

                            </div>
                          </div>
                      </div>
            </div>


                </div>
            </div>

        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
