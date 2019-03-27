<?php 
include_once "./scripts/callApi.php" ;
$get_data = callAPI('GET', 'http://localhost:8088/Gym-Website/Back-end/api/controllers/activity/read.php', false);
$response = json_decode($get_data, true);
$data = $response['records'];
?>

<div class="content-wrapper">
    <!-- Main content --> 
    <section class="content container-fluid">
         <h3> Gym : </h3>
         <table class="table table-responsive">
           <thead>
             <tr>
               <th> IdActivity </th>
               <th>Name Activity</th>
               <th>Description</th>
               <th>ID Day</th>
               <th>ID activity Type</th>
               <th>Modify</th>
             </tr>
            </thead>
            <tbody>
            <?php
            foreach($data as $key=>$val){
              ?>
              <tr> 
                <td> <?php echo $val["idActivity"] ?> </td>
                <td><?php echo $val["nameActivity"] ?> </td>
                <td><?php echo $val["description"] ?> </td>
                <td><?php echo $val["idDay"] ?> </td>
                <td><?php echo $val["idActType"] ?> </td>
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
                    <div class="form-group">
                      <label for ="title"> Name activity</label>
                      <input type="text" class="form-control" name="nameAct" id="title">
                    </div>
                    <div class="form-group">
                        <label for ="des"> description</label>
                        <input class="form-control" name="description" id="local" >
                    </div>    
                    <div class="form-group">
                        <label for ="des"> id Day </label>
                        <input class="form-control" name="idDay" id="local" >
                    </div>    
                    <div class="form-group">
                        <label for ="des"> Id Activity Type</label>
                        <input class="form-control" name="idActType" id="local" >
                    </div>    
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