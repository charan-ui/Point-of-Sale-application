<?php
include_once'connectdb.php';

session_start();

if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
    
    
    header('location:index.php');
}


include_once'header.php';

if(isset($_POST['btnsave'])){
    $category = $_POST['txtcategory'];
    

    
    if(empty($category)){
       $error = '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Field Is Empty!",
  text: "Please Fill Field",
  icon: "error",
  button: "Ok",
});


});

</script>' ;
        
        echo $error;
        
    }
    
    
    //if there is no error
    if(!isset($error)){
        
        $insert = $pdo->prepare("insert into tbl_category(category) values(:category)");
        
        $insert->bindParam(':category',$category);
        
        if($insert->execute()){
            echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Good Job!",
  text: "Added Category Successfully",
  icon: "success",
  button: "Ok",
});


});

</script>' ;
        }else{
            
            echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error",
  text: "Category Not added",
  icon: "error",
  button: "Ok",
});


});

</script>' ;
            
            
            
        }
        
        
    }
    
    
}//btnsave end here

if(isset($_POST['btnupdate'])){
    $updatedata = $_POST['txtcategory'];
    $id=$_POST['txtid'];
    
    if(empty($updatedata)){
        $errorupdate ='<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error",
  text: "Field is Empty: please enter category ",
  icon: "warning",
  button: "Ok",
});


});

</script>';
        
        echo $errorupdater;
        
    }
    
    if(!isset($errorupdater)){
        $update=$pdo->prepare("update tbl_category set category=:category where catid=".$id);
        $update->bindParam(':category',$updatedata);
        
        if($update->execute()){
           echo '<script type="text/javascript">
                  jQuery(function validation(){


swal({
  title: "Good Job",
  text: "category Updated",
  icon: "success",
  button: "Ok",
});


});

</script>';
                
        }else{
            
           echo'<script type="text/javascript">
                  jQuery(function validation(){


swal({
  title: "Error!",
  text: "category Not Updated",
  icon: "error",
  button: "Ok",
});


});

</script>'; 
            
            
            
        }
        
        
    }
    
    
    
}//btn update code end here

if(isset($_POST['btndelete'])){
    $delete = $pdo->prepare("delete from tbl_category where catid=".$_POST['btndelete']);
    
  
    
    if($delete->execute()){
         echo'<script type="text/javascript">
                  jQuery(function validation(){


swal({
  title: "Deleted!",
  text: "category Deleted",
  icon: "success",
  button: "Ok",
});


});

</script>'; 
        
        
        
        
        
    }else{
        
         echo'<script type="text/javascript">
                  jQuery(function validation(){


swal({
  title: "Error!",
  text: "category Not Deleted",
  icon: "error",
  button: "Ok",
});


});

</script>'; 
        
        
        
        
        
    }
    
    
    
}









?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Category Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <form role="form" action="" method="post">
              <?php
                  if(isset($_POST['btnedit'])){
                      
                      $update = $pdo->prepare("select * from tbl_category where catid=".$_POST['btnedit']);
                      $update->execute();
                      
                      if($update){
                          
                          $row=$update->fetch(PDO::FETCH_OBJ);
                          
                          echo'<div class="col-md-4">
                 <div class="form-group">
                  <label >Category</label>
                  
                  <input type="hidden" class="form-control" name="txtid" value="'.$row->catid.'" placeholder="Enter Category" >
                  
                  
                  <input type="text" class="form-control" name="txtcategory" value="'.$row->category.'" placeholder="Enter Category" >
                </div>
                
                <button type="submit" class="btn btn-info" name="btnupdate">Update</button>
              </div>';
                          
                          
                      }
                      
                      
                      
                  }else{
                      echo'<div class="col-md-4">
                 <div class="form-group">
                  <label >Category</label>
                  <input type="text" class="form-control" name="txtcategory" placeholder="Enter Category" >
                </div>
                
                <button type="submit" class="btn btn-warning" name="btnsave">Save</button>
              </div>';
                  }
                  
                  
                  
                  ?>
              
              
              
              
              
              <div class="col-md-8">
                  
                  <table  id = "tablecategory" class="table table-striped">
                      <thead>
                         <tr>
                             <th>#</th>
                             <th>CATEGORY </th>
                             <th>EDIT</th>
                             <th>DELETE</th>
                         </tr>
                         
                          
                      </thead>
                      
                      <tbody>
                               <?php
                                 $select=$pdo->prepare("select * from tbl_category order by catid desc");
                                 $select->execute();
                                  
                          
                          while($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo'<tr>
                           <td>'.$row->catid.'</td>
                           <td>'.$row->category.'</td>
                           <td>
                           <button type="submit" value= "'.$row->catid.'" class="btn btn-success" name="btnedit">Edit</button>
                           </td>
                           <td>
                           <button type="submit" value= "'.$row->catid.'" class="btn btn-danger" name="btndelete">Delete</button>
                           </td>
                           
                          </tr>';
                          }
                          
                          
                         
                          
                           
                          
                    ?>
                      
                     
                          
                      </tbody>  
                  </table>
                  
                  
              </div>

                 </form>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
              </div>
           
          </div>
        
        
        
        
        
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <script>
$(document).ready( function () {
    $('#tablecategory').DataTable();
} );

</script>
  
  
  

  <!-- Main Footer -->
  
 <?php
include_once'footer.php';

?>