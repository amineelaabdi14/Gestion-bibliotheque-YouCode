
document.getElementsByTagName('form')[0].reset();

function createAccount ()
{   
    hideLoginError();
    emailError.innerText="";
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=password]').innerText="CONFIRM EMAIL";
    document.querySelector('label[for=password]').setAttribute('for','confirmEmail');

    document.querySelector('input[name=password]').setAttribute('type','email');
    document.querySelector('input[name=password]').setAttribute('name','confirmEmail');
    document.querySelector('input[name=confirmEmail]').setAttribute('onkeyup','ckeckConfirmEmail()');

    document.querySelector('a[onclick="createAccount()"]').innerText="I already create an account";

    document.querySelector('button[name=signMeIn]').innerText="Sign Up";
    document.querySelector('button[name=signMeIn]').setAttribute("name","signMeUp");

    document.querySelector('a[onclick="createAccount()"]').setAttribute("onclick","alrMember()")
}
function alrMember()
{   
    hideLoginError();
    emailError.innerText="";
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=confirmEmail]').innerText="PASSWORD";
    document.querySelector('label[for=confirmEmail]').setAttribute('for','password');
    
    document.querySelector('input[name=confirmEmail]').setAttribute('type','password');
    document.querySelector('input[name=confirmEmail]').setAttribute('name','password');
    document.querySelector('input[name=password]').removeAttribute('onkeyup');

    document.querySelector('a[onclick="alrMember()"]').innerText="Create an account";

    document.querySelector('button[name=signMeUp]').innerText="Sign In";
    document.querySelector('button[name=signMeUp]').setAttribute("name","signMeIn");

    document.querySelector('a[onclick="alrMember()"]').setAttribute("onclick","createAccount()")
}
function validateEmail() {
    
    let email=document.querySelector('input[name=email]').value;
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
   if(email.match(pattern)&&email!="")
   {
        emailError.innerText="";
        document.querySelector('button[type=submit]').disabled=false;
   }
   else{
   
    emailError.innerText="The email address format is incorrect";
   }
    
  }

  function hideLoginError()
  { if(document.getElementById('loginErrorAlert')!=null)
    {
    document.getElementById('loginErrorAlert').setAttribute('class','d-none');
    }
  }

  function ckeckConfirmEmail(){
    let email=document.querySelector('input[name=email]').value;
    let confirmEmail=document.querySelector('input[name=confirmEmail]').value;
    if(email!=confirmEmail)
    {
        emailError.innerText="You must enter the same email address";
    }
    else{
        emailError.innerText="";
        document.querySelector('button[type=submit]').disabled=false;
    }
  }