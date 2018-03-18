<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> VIP Management
        <small>Add / Edit VIP</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Upload VIP Photo</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <div class="box-body">


                    <label for="aadhar">Photo</label>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                    <?php echo form_open_multipart('vip/do_upload_photo');?>

                    <input type="file" name="photo" size="20" />

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
