<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
<style>
    p {
        margin: 0 0 0px;
    }

    .circle {
        width: 100px;
        height: 100px;
        line-height: 50px;
        border-color:#0d7e39;
        border: 2px; 
        border-radius: 50%;
        font-size: 50px;
        color:#0d7e39;


        text-align: center

    }
</style>
<div class="container" style="padding-top: 150px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="">
                <?php if($this->session->flashdata('msg_success')) { ?>
                    <div class="alert alert-success">
                     <?php echo $this->session->flashdata('msg_success'); ?>       
                 </div>
             <?php } ?>
             <?php if($this->session->flashdata('msg_error')) { ?>
                <div class="alert alert-danger">
                 <?php echo $this->session->flashdata('msg_error'); ?>       
             </div>
         <?php } ?>


         <?php $attributes = array("name" => "loginform", "role" => "form" );
         echo form_open("users/login", $attributes);?>
         <div class="panel-heading">
            <h3 class="panel-title " style="margin-left:80px;"><strong style="font-size:21px;"><svg width="130" height="130">
                <circle cx="60" cy="60" r="50" stroke="#0d7e39" stroke-width="2" fill="white" />
                Sorry, your browser does not support inline SVG.
                <text fill="#0d7e39" font-size="24" font-family="Verdana"
                x="20" y="70">LOGO</text>
            </svg></h3>
            <h3 class="panel-title" style="margin-left:100px;"><strong style="font-size:21px;">L o g i n</strong></h3>
        </div>
        <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
            <label class="control-label" for="inputError"><?php echo form_error('email'); ?></label>
            <input  placeholder="Username" name="email"  style="
            outline: 0;
            border-style: double;
            border-width: 0 0 2px;width: 100%; height: 34px;font-size: revert;">
        </div>
        <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
            <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
            <input  placeholder="Password" name="password" style="
            outline: 0;
            border-style: double;
            border-width: 0 0 2px;width: 100%; height: 34px;font-size: revert;">
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block"  style="background-color:#0d7e39;">Login</button>
        </div>
        <?php echo form_close(); ?>


    </div>
</div>
</div>
</div>
