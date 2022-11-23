<nav id="" class="navbar shadow-lg" >
        <img id="navLogo" src="../resources/logo.png" alt="" class="ms-4 mt-1" >
        <div class="align-items-center me-4" onclick="nav(this.children[0].id)" style="cursor: pointer;">
            <img id="pdp" src="../resources/profile-icon.png" alt="" class="" >
            <span class="text-white ms-3 d-none d-sm-inline fw-semibold" style="font-size:16px;"> <?php echo $_SESSION['name'] ?>  </span>
        </div>
</nav>