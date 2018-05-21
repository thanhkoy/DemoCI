<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>

</head>
<body>
<?php
if (isset($_GET['id'])) {
    echo "<script> document.getElementById('rel').style.display = 'block'; </script>";
}
?>

<div class="container">
    <div class="row">
        <form action="index.php?f=search" method="post">
            <input type="text" name="name" placeholder="Enter User">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="display-4" align="center">User</p>
            <table class="table table-hover table-bordered" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
//                if (isset($searchPH)) {
//                    $list = $searchPH;
//                } else {
//                    $list = $listPH;
//                }

                foreach ($data as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><p><?php echo $value['name']; ?></p></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#edit"
                                    onclick="document.getElementById('ph_id').value = <?php echo $value['id']; ?> ;
                                        document.getElementById('ph_name').value = '<?php echo $value['name']; ?>';">
                                <i
                                    class="fa fa-edit"></i></button>
                        </td>
                        <td><a href="index.php/manage/delete/<?php echo $value['id']; ?>"><img src="assets/images/delete.png" width="20px" height="20px"></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">ADD</button>
        </div>
    </div>
</div>

<!-- Add User -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <form action="index.php/manage/add" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Edit User -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container">
                    <form action="index.php/manage/edit" method="post">
                        <input type="hidden" class="form-control" name="id" value="1" id="ph_id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="ph_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>