
//  LOGIN FORM

var loginbtn = document.querySelector('#loginbtn');
var loginablak = document.querySelector('.loginablak');
var loginclose = document.querySelector('.login-close');
var loginclose1 = document.querySelector('.megsem-btn');
var logform = document.querySelector('#logform');


loginbtn.addEventListener('click',function(){
    loginablak.classList.add('login-active');
});

loginclose.addEventListener('click',function(){
    logform.reset();
    loginablak.classList.remove('login-active');
});

loginclose1.addEventListener('click',function(){
    logform.reset();
    loginablak.classList.remove('login-active');
});




//             REGISZTRÁCIÓ

var regablak = document.querySelector('.regablak');
var regbtn = document.querySelector('#regbtn');
var regclose = document.querySelector('.reg-close');
var regclose1 = document.querySelector('.rmegsem-btn');
var regform = document.querySelector('#regform');

regbtn.addEventListener('click',function(){
    regablak.classList.add('login-active');
});

regclose.addEventListener('click',function(){
    regform.reset();
    regablak.classList.remove('login-active');
});

regclose1.addEventListener('click',function(){
    regform.reset();
    regablak.classList.remove('login-active');
});




















































































