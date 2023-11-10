<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";


?>

<body>
    <?php
  include "header.php";
  ?>



    <?php
include "sidebar.php";
?>

<?php
if(isset($_POST['add_category'])){
$fname=$_POST['fname'];

$q="insert into category (category_name,shop_id) values ('$fname','1') ";

mysqli_query($con,$q);
}
?>



<?php
if(isset($_POST['edit_category'])){
$name=$_POST['category_name'];
$name1=$_POST['category_id'];

$q="update category set category_name='$name' where category_id='$name1'";

mysqli_query($con,$q);
}
?>


<?php
if(isset($_POST['delete_category'])){
$name1=$_POST['category_id'];


$q="delete from category where category_id='$name1'";

mysqli_query($con,$q);
}
?>




    <main id="main" class="main">


        <!-- Button trigger modal -->
       

        <!--Add Modal -->
        <form id="register" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">What do you want to add?</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                   
                <label>Enter Category you want to add</label>
                <br>
                <input type="text"name="fname"id="name"placeholder="Enter Category">
                <br><br>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_category" value="add_category">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
</form>





 <!--Edit Modal -->
 <form id="register" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit what you want to edit</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                   
                <label>Edit</label>
                <br>
                <input type="text"name="category_name"id="edit_category_name"placeholder="Enter Category">
                <input type="hidden"name="category_id"id="edit_category_id"placeholder="Enter id">
                <br><br>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_category" value="edit_category">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
</form>



<!--Delete Modal -->
<form id="register" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden"name="category_id"id="delete_category_id"placeholder="Enter id">
                    <button type="submit" class="btn btn-primary" name="delete_category" value="delete_category">YES</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                       
                    </div>
                </div>
            </div>
        </div>
</form>

        <div class="pagetitle">
            <h1>Category<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Category
        </button></h1>
            
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="category.php">Home
                        </a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">



            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $d="select * from category";

                     $result=mysqli_query($con,$d);

                     while($x=mysqli_fetch_array($result)){

                     ?>
                    <tr>
                        <th scope="row"><?php echo $x['category_id']?></th>
                        <td><?php echo $x['category_name']?> </td>
                        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="editModal('<?php echo $x['category_id']?>','<?php echo $x['category_name']?>')">
            Edit
        </button></td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteModal('<?php echo $x['category_id']?>')">
            Delete
        </button></td>

                    </tr>
                    <?php

                     }
                     ?>
                </tbody>
                     
            </table>
        </section>




    </main><!-- End #main -->
    <?php
  include "footer.php";
  ?>


    <?php
  include "script.php";
  ?>

</body>
<script>
  function editModal(x,y){
    $('#edit_category_name').val(y);
    $('#edit_category_id').val(x); 
  }
</script>



<script>
  function deleteModal(x){
    $('#delete_category_id').val(x); 
  }
</script>

</html>