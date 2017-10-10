<?php $this->load->view('/templates/header'); ?>

<?php  
  //echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
 ?>  
 <h1><span style="color:#B22222;text-align:center;"> username or password error </span></h1>
<form method="post" action="<?php echo base_url(); ?>Home/login_validation">  
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Your username" required>
        </div>
        <?php echo form_error('username'); ?>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
        </div>
        <?php echo form_error('password'); ?>
        <div class="form-group">
          <input type="submit" class="btn btn-default" value="login">
        </div>
      </form>

<?php $this->load->view('/templates/footer'); ?>