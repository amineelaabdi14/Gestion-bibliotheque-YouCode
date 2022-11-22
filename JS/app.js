
// document.getElementsByTagName('form')[0].reset();
let TempChecker=true;
function createAccount ()
{   TempChecker=false;
    document.querySelector('button[type=submit]').style.filter="saturate(0%)";
    emailError.innerText="The email address format is incorrect";
    comfirEmailError.innerText="";
    emailError.innerText="";
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=password]').innerText="CONFIRM EMAIL";
    document.querySelector('label[for=password]').setAttribute('for','confirmEmail');

    document.querySelector('input[name=password]').setAttribute('type','email');
    document.querySelector('input[name=password]').setAttribute('name','confirmEmail');
    document.querySelector('input[name=confirmEmail]').setAttribute('oninput','checkConfirmEmail()');

    document.querySelector('a[onclick="createAccount()"]').innerText="I already create an account";

    document.querySelector('button[name=signMeIn]').innerText="Sign Up";
    document.querySelector('button[name=signMeIn]').setAttribute("name","signMeUp");

    document.querySelector('a[onclick="createAccount()"]').setAttribute("onclick","alrMember()")

    fullName.innerHTML=`<label for="fullname" class="MyLabels">Full Name</label><br><input type="text" name="fullName" id="" class="MyInputs">`;
    document.getElementById('LoginformContainer').style.height="500px";                 
}
function alrMember()
{   
    TempChecker=true;
    document.querySelector('button[type=submit]').style.filter="saturate(0%)";
    emailError.innerText="The email address format is incorrect";
    fullName.innerHTML="";
    comfirEmailError.innerText="";
    emailError.innerText="";
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=confirmEmail]').innerText="PASSWORD";
    document.querySelector('label[for=confirmEmail]').setAttribute('for','password');
    
    document.querySelector('input[name=confirmEmail]').setAttribute('type','password');
    document.querySelector('input[name=confirmEmail]').setAttribute('name','password');
    document.querySelector('input[name=password]').removeAttribute('oninput');

    document.querySelector('a[onclick="alrMember()"]').innerText="Create an account";

    document.querySelector('button[name=signMeUp]').innerText="Sign In";
    document.querySelector('button[name=signMeUp]').setAttribute("name","signMeIn");

    document.querySelector('a[onclick="alrMember()"]').setAttribute("onclick","createAccount()");

    document.getElementById('LoginformContainer').style.height="400px";  
}
function validateEmail() {
    
    let email=document.querySelector('input[name=email]').value;
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(email.match(pattern))
    {    
        emailError.innerText="";
        if(TempChecker==true)
        {
            document.querySelector('button[type=submit]').disabled=false;
            document.querySelector('button[type=submit]').style.filter="saturate(100%)";
        }
    }
   else
   {
        document.querySelector('button[type=submit]').disabled=true;
        document.querySelector('button[type=submit]').style.filter="saturate(0%)";
        emailError.innerText="The email address format is incorrect";
   }
   if(document.querySelector('form[method=POST]').children[1].children[2].getAttribute('name')=="confirmEmail")
    {
        checkConfirmEmail();
    }
    
  }


function checkConfirmEmail(){
let email=document.querySelector('input[name=email]').value;
let confirmEmail=document.querySelector('input[name=confirmEmail]').value;
if(email!=confirmEmail)
{
    comfirEmailError.innerText="You must enter the same email address";
    document.querySelector('button[type=submit]').disabled=true;
    document.querySelector('button[type=submit]').style.filter="saturate(0%)";
}
else{
    comfirEmailError.innerText="";
    document.querySelector('button[type=submit]').disabled=false;
    document.querySelector('button[type=submit]').style.filter="saturate(100%)";
}
}

function nav(Dir){
    let direction =Dir;
    if(direction=="pdp")
    {   
       location.href="../PHP/profile.php";
    }
    else if(direction=="fa-solid fa-user b- fs-5")
    {   
        window.location.href="../PHP/profile.php";
    }
    else if(direction=="fa-solid fa-chart-line fs-5")
    {   
        window.location.href="../PHP/dashboard.php";
    }
    else if(direction=="fa-solid fa-table-columns fs-5")
    {
        window.location.href="../PHP/productslist.php";
    }

}
function showAddModal(){
    document.getElementById('addModal').style.display="block";
}


function showactions(element)
{   
    let MyElement=element;
    MyElement.children[3].removeAttribute("style");
    MyElement.style.backgroundColor="#38383d";
}


function hideactions(element)
{   
    let MyElement=element;
    MyElement.children[3].setAttribute("style","visibility: hidden;");
    MyElement.style.backgroundColor="#18181b";
}

function navToProducts()
{
    window.location.href="../PHP/productslist.php";
}
