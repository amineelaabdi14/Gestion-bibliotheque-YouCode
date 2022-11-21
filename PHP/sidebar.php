<div id="sideBar" class="MyNavigation position-absolute start-0 d-flex flex-column justify-content-between"style="">
            <ul id="sideList" class="d-flex align-items-start flex-column p-0 ps-md-2">
                <li class="liLinks text-white btn mb-3 mt-4 d-flex flex-column flex-md-row align-items-center" onclick="nav(this.children[0].className)"><i class="fa-solid fa-user b- fs-5"></i><span class="ms-3 d-none d-md-inline fw-semibold">Profile</span></li> 

                <li class="liLinks text-white btn mb-3 mt-1 d-flex flex-column flex-md-row align-items-center" onclick="nav(this.children[0].className)" style="background-color:#038DFE;"><i class="fa-solid fa-chart-line fs-5"></i><span class="ms-3 d-none d-md-inline fw-semibold">Dashboard</span></li> 

                <li class="liLinks text-white btn mb-3 mt-1 d-flex flex-column flex-md-row align-items-center" onclick="nav(this.children[0].className)"><i class="fa-solid fa-table-columns fs-5"></i><span class="ms-3 d-none d-md-inline fw-semibold">Products List</span></li>
            </ul>
            <a id="signOutBtn" href="signout.php?signout=1" class="d-block">
                <div class=" setRedColor d-flex flex-column flex-md-row justify-content-center align-items-center mb-5">
                    <i class=" setRedColor fa-solid fa-right-from-bracket fs-5  m-auto m-md-0"></i>
                    <span id="signOutText" class="setRedColor d-none d-md-inline ms-3" style="opacity: 0.9;">Sign Out</span>
                </div>
            </a>
            
</div>