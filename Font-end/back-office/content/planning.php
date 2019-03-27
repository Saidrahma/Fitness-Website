
<?php 
include_once "../scripts/callApi.php";

?>

<div class="content-wrapper">
    <!-- Main content --> 
    <?php $plannings = ["Id Day ","Day", "Modify"] ?>
    <section class="content container-fluid">
         <h3> Planning: </h3>
         <table class="table table-responsive">
           <thead>
             <tr>
             <?php
                foreach($plannings as $plan){
                  ?>
               <th> <?php echo ("$plan")?></th> 
               <?php  } ?> 
             </tr>
             
            </thead>
            <tbody>
              <?php
              $get_data = callAPI('GET','http://localhost:8088/Gym-Website/Back-end/api/controllers/planning/read.php', false);
              $response = json_decode($get_data, true);
              $data = $response['records'];
                foreach($data as $key=>$val){
              ?>
              <tr> 
                <td> <?php echo $val["idDay"] ?> </td>
                <td><?php echo $val["day"] ?> </td>
                
                <td> 
                  <button class=" btn btn-info" >Edit</button>/
                  <button class=" btn btn-info" > Delete </button></td>
              </tr>
              <?php  } ?>
            </tbody>

         </table>

         <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                 Add new
            </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Gym </h4>
              </div>
              

              <form method="post" action=""> 
                  <div class="modal-body">
                  <?php
                foreach($plannings as $plan){
                  ?>
                    <div class="form-group">
                      <label for ="<?php echo ("$plan") ?>"><?php echo ("$plan") ?></label>
                      <input type="text" class="form-control" name="<?php echo ("$plan") ?>" id="<?php echo ("$plan") ?>">
                    </div>
                  <?php  } ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                  </div> 
            </form>
            </div>
          </div>
        </div>



    </section>
    <!-- /.content -->
  </div>