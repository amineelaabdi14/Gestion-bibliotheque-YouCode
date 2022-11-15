function createAccount ()
{   
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=password]').innerText="CONFIRM EMAIL";
    document.querySelector('label[for=password]').setAttribute('for','confirmEmail');

    document.querySelector('input[name=password]').setAttribute('type','text');
    document.querySelector('input[name=password]').setAttribute('name','confirmEmail');

    document.querySelector('a[onclick="createAccount()"]').innerText="I already create an account";

    document.querySelector('button[name=signMeIn]').innerText="Sign Up";
    document.querySelector('button[name=signMeIn]').setAttribute("name","signMeUp");

    document.querySelector('a[onclick="createAccount()"]').setAttribute("onclick","alrMember()")
}
function alrMember()
{   
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=confirmEmail]').innerText="PASSWORD";
    document.querySelector('label[for=confirmEmail]').setAttribute('for','password');
    
    document.querySelector('input[name=confirmEmail]').setAttribute('type','password');
    document.querySelector('input[name=confirmEmail]').setAttribute('name','password');

    document.querySelector('a[onclick="alrMember()"]').innerText="Create an account";

    document.querySelector('button[name=signMeUp]').innerText="Sign In";
    document.querySelector('button[name=signMeUp]').setAttribute("name","signMeIn");

    document.querySelector('a[onclick="alrMember()"]').setAttribute("onclick","createAccount()")
}
function validateEmail(e) {
    let email=document.querySelector('input[name=email]').value;
    var dakchi = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
   if("amineelaabdi@gmail.com".match(dakchi))
   {
    alert('true');
   }
   else{
    e.preventDefault();
    alert('false');
   }
    
  }