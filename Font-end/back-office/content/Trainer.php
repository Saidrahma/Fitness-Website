
<?php 
include_once "../scripts/callApi.php";

?>

<div class="content-wrapper">
    <!-- Main content --> 
    <?php $trainers = ["Id Trainer","Name Trainer","Adress Trainer", "Modify"] ?>
    <section class="content container-fluid">
         <h3> Trainers : </h3>
         <table class="table table-responsive">
           <thead>
             <tr>
             <?php
                foreach($trainers as $trainer){
                  ?>
               <th> <?php echo ("$trainer")?></th> 
               <?php  } ?> 
             </tr>
             
            </thead>
            <tbody>
              <?php
              $get_data = callAPI('GET','http://localhost/Gym-Website/Back-end/api/controllers/Trainer/read.php', false);
              $response = json_decode($get_data, true);
              $data = $response['records'];
                foreach($data as $key=>$val){
              ?>
              <tr> 
                <td> <?php echo $val["idTrainer"] ?> </td>
                <td><?php echo $val["nameTrainer"] ?> </td>
                <td><?php echo $val["addressTrainer"] ?> </td>
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
                <h4 class="modal-title" id="myModalLabel">New Trainer </h4>
              </div>
              

              <form method="post" action=""> 
                  <div class="modal-body">
                  <?php
                foreach($trainers as $trainer){
                  ?>
                    <div class="form-group">
                      <label for ="<?php echo ("$trainer") ?>"><?php echo ("$trainer") ?></label>
                      <input type="text" class="form-control" name="<?php echo ("$trainer") ?>" id="<?php echo ("$trainer") ?>">
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