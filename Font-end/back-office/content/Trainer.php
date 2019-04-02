
<?php 
include_once "../scripts/callApi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  //delete
  if (!empty(trim($_POST["id"]))) {
      $idTrainer = array (
        'idTrainer'=> trim($_POST["id"])
      );
      $make_call = callAPI('POST', 'http://localhost:8088/Gym-Website/Back-end/api/controllers/trainer/delete.php', json_encode($idTrainer));
  } 
}
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
              $get_data = callAPI('GET','http://localhost:8088/Gym-Website/Back-end/api/controllers/trainer/read.php', false);
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
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <button type="submit" name="id" class=" btn btn-info" value=<?php echo $val["idTrainer"] ?> > Delete </button></td>
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