
<?php 
include_once "../scripts/callApi.php";

?>

<div class="content-wrapper">
    <!-- Main content --> 
    <?php $members = ["IdMember","Name Member","Address Member","username","password","Date de naiss", "Modify"] ?>
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
              $get_data = callAPI('GET','http://localhost:8088/Gym-Website/Back-end/api/controllers/member/read.php', false);
              $response = json_decode($get_data, true);
              $data = $response['records'];
                foreach($data as $key=>$val){
              ?>
              <tr> 
                <td> <?php echo $val["idMembre"] ?> </td>
                <td><?php echo $val["nameMembre"] ?> </td>
                <td><?php echo $val["addressMembre"] ?> </td>
                <td><?php echo $val["username"] ?> </td>
                <td><?php echo $val["password"] ?> </td>
                <td><?php echo $val["DateNais"] ?> </td>
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
                <h4 class="modal-title" id="myModalLabel">New Member </h4>
              </div>
              

              <form method="post" action=""> 
                  <div class="modal-body">
                  <?php
                foreach($members as $memberact){
                  ?>
                    <div class="form-group">
                      <label for ="<?php echo ("$member") ?>"><?php echo ("$member") ?></label>
                      <input type="text" class="form-control" name="<?php echo ("$member") ?>" id="<?php echo ("$memberact") ?>">
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