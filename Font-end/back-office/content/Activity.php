
<?php 
include_once "../scripts/callApi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  //delete
  if (!empty(trim($_POST["id"]))) {
      $idActivity = array (
        'idActivity'=> trim($_POST["id"])
      );
      $make_call = callAPI('POST', 'http://localhost:8088/Gym-Website/Back-end/api/controllers/activity/delete.php', json_encode($idActivity));
  } 
}

?>

<div class="content-wrapper">
    <!-- Main content --> 
    <?php $activities = ["IdActivity","Name Activity","Description","ID Day","ID activity Type","ID Trainer", "Modify"] ?>
    <section class="content container-fluid">
         <h3> Activities: </h3>
         <table class="table table-responsive">
           <thead>
             <tr>
             <?php
                foreach($activities as $act){
                  ?>
               <th> <?php echo ("$act")?></th> 
               <?php  } ?> 
             </tr>
             
            </thead>
            <tbody>
              <?php
              $get_data = callAPI('GET','http://localhost:8088/Gym-Website/Back-end/api/controllers/activity/read.php', false);
              $response = json_decode($get_data, true);
              $data = $response['records'];
                foreach($data as $key=>$val){
              ?>
              <tr> 
                <td> <?php echo $val["idActivity"] ?> </td>
                <td><?php echo $val["nameActivity"] ?> </td>
                <td><?php echo $val["description"] ?> </td>
                <td><?php echo $val["idDay"] ?> </td>
                <td><?php echo $val["idActType"] ?> </td>
                <td><?php echo $val["idTrainer"] ?> </td>
                <td> 
                  <button class=" btn btn-info" >Edit</button>/
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <button type="submit" name="id" class=" btn btn-info" value=<?php echo $val["idActivity"] ?> > Delete </button></td>
                  </form>
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
                foreach($activities as $act){
                  ?>
                    <div class="form-group">
                      <label for ="<?php echo ("$act") ?>"><?php echo ("$act") ?></label>
                      <input type="text" class="form-control" name="<?php echo ("$act") ?>" id="<?php echo ("$act") ?>">
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