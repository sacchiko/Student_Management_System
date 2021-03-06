<?php

require_once '../core/init.php'; 
require_once 'school-year.php';

$user = new User();
$student = new Student();
$instructor = new Instructor();

$location = basename($_SERVER['REQUEST_URI']);

if (($user->isLoggedIn() && !$user->hasPermission('Instructor')) || (!$user->isLoggedIn())) 
{
    Redirect::to('../');
}

$instructor->getInstructorByUserId($user->data()->user_id);
$data = $instructor->data();

if (Input::exists() && Input::get('save')) 
{
    if (Token::check(Input::get('token'))) 
    {
        if (Input::get('password') != '' || Input::get('repassword') != '') 
        {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'password' => array(
                    'name' => 'Password',
                    'required' => true,
                    'min' => 6
                ),
                'repassword' => array(
                    'name' => 'Re-type Password',
                    'required' => true,
                    'matches' => 'password'
                )
            ));

            if ($validate->passed()) 
            {
                try 
                {
                    $salt = Hash::salt(32);

                    $user->update(array(
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt
                    ), $user->data()->user_id);

                    Session::flash('success', 'Password has been updated successfully!');
                    Redirect::to($location);
                } 
                catch (Exception $e) 
                {
                    Session::flash('error', $get->Message());
                    Redirect::to($location);
                }
            } 
            else 
            {
                $errors = '';
                foreach ($validate->errors() as $error) 
                {
                    $errors .= $error . '<br>';
                }

                Session::flash('error', $errors);
                Redirect::to($location);
            }
        }
    }
}
?>
<?php include 'header.php'; ?>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Page content -->
        <div id="content">
            <?php include 'navbar.php'; ?>

            <div class="container-fluid" id="_content" style="display: none;">
                <div class="swipe-area"></div>
                <?php echo (Session::exists('result') ? Session::flash('result') : '') ?>
                <h4 class="c-green">Account Settings</h4>
                <hr>
                <form action="" method="post">
                    <div class="form-row mb-2">
                        <div class="col-xl-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->data()->username ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-xl-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-xl-3">
                            <label for="repassword">Re-type Password:</label>
                            <input type="password" class="form-control form-control-sm" id="repassword" name="repassword">
                        </div>
                    </div>

                    <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
                    <button type="submit" class="btn btn-primary col-xl-3" name="save" value="true">Save Changes</button>
                </form>
            </div>
            <a role="button" id="refresh" class="float text-light" onclick="window.location.reload()">
                <i class="fas fa-redo-alt icon-float"></i>
            </a>

            <div class="modal fade" id="successMessageModal" role="document">
                <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-green"><h6 class="text-light">Update Success</h6></div>
                        <div class="modal-body"><span class="text-green" id="success_message"></span></div>
                        <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="errorMessageModal" role="document">
                <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-crimson"><h6 class="text-light">Update Error</h6></div>
                        <div class="modal-body"><span class="text-crimson" id="error_message"></span></div>
                        <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    <?php include 'jsplugins.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php
            if (Session::exists('success')) { ?>
                $('#successMessageModal').modal('show');
                document.getElementById('success_message').innerHTML = "<?php echo Session::flash('success') ?>";
            <?php
            }

            if (Session::exists('error')) { ?>
                $('#errorMessageModal').modal('show');
                document.getElementById('error_message').innerHTML = "<?php echo Session::flash('error') ?>";
            <?php
            }
            ?>
        });
    </script>
</body>
</html>