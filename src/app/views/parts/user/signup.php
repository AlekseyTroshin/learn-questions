<form action="/user/signup" method="post" class="form-signin">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
        <input type="name" name="name" class="form-control bblrr-0 mb--1" id="signUpName" placeholder="name@example.com">
        <label for="signUpName">Name</label>
    </div>
    <div class="form-floating">
        <input type="email" name="email" class="form-control br-0 mb--1" id="signUpEmail" placeholder="name@example.com">
        <label for="signUpEmail">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control  br-0 mb--1" id="signUpPassword"
               placeholder="name@example.com">
        <label for="signUpPassword">Password</label>
    </div>
    <div class="form-floating">
        <input type="password" name="confirmPassword" class="form-control btlrr-0 mb-3" id="signUpConfirmPassword"
               placeholder="Confirm Password">
        <label for="signUpConfirmPassword">Confirm Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
</form>