<?php
/*
<div class="container" id="container">
     <div class="row main-form">
         <form class="" method="post" action="#">
         
         <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Your Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name"/>
                </div>
            </div>
         </div>

         <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"/>
                </div>
            </div>
         </div>

         <div class="form-group">
            <label for="username" class="cols-sm-2 control-label">Username</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                     <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username"/>
                </div>
            </div>
         </div>

         <div class="form-group">
            <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                     <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
                </div>
            </div>
         </div>

         <div class="form-group">
            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password"/>
                </div>
            </div>
         </div>

         <div class="form-group ">
            <a href="#" target="_blank" type="button" id="button-btn" class="btn btn-primary btn-lg ">
                Register
            </a>
         </div>
         
         </form>
     </div>
 </div>
*/
?>
     <div class="form-row align-items-center">
        <div class="col-8">
            <label class="sr-only" for="user_name">Name</label>
            <input type="text" class="form-control mb-2" name="user_name" placeholder="Иванов">
        </div>
        <div class="col-8">
            <label class="sr-only" for="user_email">email</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" name="user_email" placeholder="email">
            </div>
        </div>
        <div class="col-8">
            <label class="sr-only" for="user_phone">phone</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><img src="/img/volume-off.svg" alt=""></div>
                </div>
                <input type="text" class="form-control" name="user_phone" placeholder="phone">
            </div>
        </div>
        <div class="col-8">
            <label class="sr-only">Пароль</label>
            <div class="container">
                <div class="row">
                    <input type="password" class="form-control col-6" name="password" placeholder="***">
                    <input type="password" class="form-control col-6" name="repassword"  placeholder="***">
                </div>
            </div>
        </div>

    </div>
