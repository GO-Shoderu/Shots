<form action="register.php" method="post">
    <div class="card">
        <div><h5 class="card-header">Register</h5></div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="fname">First name:</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="John"/>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="lname">Last name:</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Doe"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="email1">Email address:</label>
                    <input type="email" class="form-control" name="email1" id="email1" placeholder="john.doe@gmail.com"/>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="date">Date of birth:</label>
                    <input type="date" class="form-control" name="date" id="date"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="pass1">Create password:</label>
                    <input type="password" class="form-control" name="pass1" id="pass1" placeholder="********"/>
                </div>
                <div class="form-group col-lg-6 col-sm-12">
                    <label for="pass1">Confirm password:</label>
                    <input type="password" class="form-control" name="pass2" id="pass2" placeholder="********"/>
                </div>
            </div>

            <button class="btn btn-dark">Register <i class="fas fa-angle-right"></i></button>

        </div>
    </div>
</form>

<!-- the logo side -->
<div class="col-sm-6 col-12 verticalAlign">
  <!-- <div class = 'card border-0'> -->
    <!-- <div class='card-body'> -->
      <div class = 'row image'>
        <div class="col-sm-12" style = "background-image: url('./Logo/4x/Asset4x.png')">
          <!-- image comes here -->
        </div>
      </div>
    <!-- </div> -->
  <!-- </div> -->
</div>
