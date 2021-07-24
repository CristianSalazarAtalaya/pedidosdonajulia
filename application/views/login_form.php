<html>
<head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login_style.css">
    </head>
    
    <body>
    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Login form creation starts-->

    <div class="container">
            <?php echo form_open('user/login'); ?>
            <div class="form-group">
                <label for="user">username</label>
                <input type="username" class="form-control" value="<?php echo set_value('username'); ?>" id="username" name="username"  placeholder="Enter username">
                <?php echo form_error('email'); ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                <?php echo form_error('password'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="form-group">
                <a href="<?php echo site_url('client/register');?>">  Registrate</a>
            </p>
            <?php echo $this->session->flashdata('login_error'); ?>
            
            <?php echo $this->session->flashdata('login_succ'); ?>
            <?php form_close(); ?>
        </div>
        
    <!-- Login form creation ends -->
</body>
</html>