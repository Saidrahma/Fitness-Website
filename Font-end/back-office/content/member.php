
<?php 
include_once "../scripts/callApi.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  //delete
  if (!empty(trim($_POST["id"]))) {
      $idMember = array (
        'idMembre'=> trim($_POST["id"])
      );
      $make_call = callAPI('POST', 'http://localhost/Gym-Website/Back-end/api/controllers/member/delete.php', json_encode($idMember));
  } 
}
?>

<div class="content-wrapper">
    <!-- Main content --> 
    <?php $members = ["IdMember","Name Member","Address Member","Date de naiss", "Modify"] ?>
    <section class="content container-fluid">
         <h3> Members: </h3>
         <table class="table table-responsive">
           <thead>
             <tr>
             <?php
                foreach($members as $member){
                  ?>
               <th> <?php echo ("$member")?></th> 
               <?php  } ?> 
             </tr>
             
            </thead>
            <tbody>
              <?php
              $get_data = callAPI('GET','http://localhost/Gym-Website/Back-end/api/controllers/member/read.php', false);
              $response = json_decode($get_data, true);
              $data = $response['records'];
                foreach($data as $key=>$val){
              ?>
              <tr> 
                <td> <?php echo $val["idMembre"] ?> </td>
                <td><?php echo $val["nameMembre"] ?> </td>
                <td><?php echo $val["addressMembre"] ?> </td>
                <td><?php echo $val["DateNais"] ?> </td>
                <td> 
                  <button class=" btn btn-info" >Edit</button>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <button type="submit" name="id" class=" btn btn-info" value=<?php echo $val["idMembre"] ?> > Delete </button></td>
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
                <h4 class="modal-title" id="myModalLabel">New Member </h4>
              </div>
              

              <form action="addNewMember.php" method="post"> 
                  <div class="modal-body">
 
                    <div class="form-group">
                      <label >Name</label>
                      <input type="text" class="form-control" name="name">

                    </div>

                    <div class="form-group">
                      <label >Address</label>
                      <input type="text" class="form-control" name="address">

                    </div>

                    <div class="form-group">
                      <label >Birthday</label>
                      <input type="date" class="form-control" name="birthday">

                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                  </div> 
            </form>
            </div>
          </div>
        </div>



    </section>
    <!-- /.content -->
  </div>