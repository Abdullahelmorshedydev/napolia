<!-- My account bar -->
<div id="myAccount" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my account</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <form class="theme-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <label for="review">Password</label>
                <input type="password" class="form-control" id="review" placeholder="Enter your password"
                    required="">
            </div>
            <a href="#" class="btn btn-solid btn-solid-sm btn-block ">Login</a>
            <h5 class="forget-class"><a href="forget_pwd.html" class="d-block">forget password?</a></h5>
            <h5 class="forget-class"><a href="register.html" class="d-block">new to store? Signup now</a></h5>
        </form>
    </div>
</div>
<!-- My account bar end-->
