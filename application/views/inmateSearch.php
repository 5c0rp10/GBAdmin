<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Inmate Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>inmate/addNew"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <form action="<?php echo base_url() ?>/inmate/inmateListing" method="POST" id="searchList">
      <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="name">Name</label>
                    </div>
                  </div>
                  <div class="col-md-1">
                      <div class="form-group">
                          <input type="text" name="name" value="<?php echo $sname; ?>" class="form-control input-sm" style="width: 150px;" placeholder="Name"/>
                      </div>
                    </div>
              </div>
              <div class="row">
                  <div class="col-md-1">
                      <div class="form-group">
                          <label for="address">Address</label>
                      </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <input type="text" name="address" value="<?php echo $saddress; ?>" class="form-control input-sm" style="width: 150px;" placeholder="Address"/>
                        </div>
                      </div>
                </div>
          </div>
          <button class="btn btn-sm btn-default searchList" type="submit"><i class="fa fa-search"> Search</i></button>

                  </form>

                                      </div>


        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                </form>
                <div class="box-header">
                    <h3 class="box-title">Inmate List</h3>
                    <div class="box-tools">

                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>DOJ</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($inmateRecords))
                    {
                        foreach($inmateRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->inm_id ?></td>
                      <td><?php echo $record->inm_name ?></td>
                      <td><?php echo $record->inm_gender ?></td>
                      <td><?php echo $record->inm_dob ?></td>
                      <td><?php echo $record->inm_doj ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-primary" href="<?php echo base_url().'inmatePdf/pdf/'.$record->inm_id; ?>" title="View"><i class="fa fa-eye"></i></a> 
                          <a class="btn btn-sm btn-primary" href="" title="Download PDF"><i class="fa fa-download"></i></a> |
                          <a class="btn btn-sm btn-info" href="" title="Edit"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->inm_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>

                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common_inmate.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
