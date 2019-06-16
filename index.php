<!DOCTYPE html>
<html>
    <head>
        <title>Tutorial CRUD Dengan AJAX JQuery PHP MySQL</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h2>CRUD Dengan AJAX JQuery PHP MySQL</h2>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-user">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat User Baru
                    </button>
                    <br /><br />
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">Daftar User</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Married</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <ul id="pagination" class="pagination-sm"></ul>
                </div>
            </div>

            <!-- Modal untuk tambah user -->
            <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
                        </div>

                        <div class="modal-body">
                            <form data-toggle="validator" action="api/create.php" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="user_name">Nama</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="user_email">Email</label>
                                    <input type="email" name="email" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Password</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>
                                <label class="control-label" for="">Gender</label>
                                <div class="radio">
                                <label><input type="radio" name="gender" value='Male'>Male</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="gender" value='Female'>Female</label>
                                </div>
                                <label class="control-label" for="">Marriage Status</label>
                                <div class="radio">
                                <label><input type="radio" name="ismarried" value='Yes'>Yes</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="ismarried" value='No'>No</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="user_address">Alamat</label>
                                    <input type="text" name="address" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn crud-submit btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk edit user -->
            <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                        </div>
                        <div class="modal-body">
                            <form data-toggle="validator" action="api/update.php" method="put">
                                <input type="hidden" name="id" class="user_id">
                                <div class="form-group">
                                    <label class="control-label" for="user_name">Nama</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="user_email">Email</label>
                                    <input type="email" name="email" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Password</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>
                                <label class="control-label" for="">Gender</label>
                                <div class="radio">
                                <label><input type="radio" name="gender" value='Male'>Male</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="gender" value='Female'>Female</label>
                                </div>
                                <label class="control-label" for="">Marriage Status</label>
                                <div class="radio">
                                <label><input type="radio" name="ismarried" value='Yes'>Yes</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="ismarried" value='No'>No</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="user_address">Alamat</label>
                                    <input type="text" name="address" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success crud-edit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/ajax.js"></script>
    </body>
</html>