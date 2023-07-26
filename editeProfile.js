// disable and enable fields

function enableFields() {
    var fields = document.querySelectorAll("input");
    
    for (var i = 0; i < fields.length; i++) {
      fields[i].disabled = false;
    }
  }



function disAbleFields() {
    var fields = document.querySelectorAll("input");
    
    for (var i = 0; i < fields.length; i++) {
      fields[i].disabled = true;
    }
  }



  //update profile VALIDATION
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
const nameRegex = /[a-zA-Zء-ي]/;
const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const numperRegex = /^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/;
let name1 = document.getElementById("name1");
let name1_msg = document.getElementById("name1_msg");
let name2 = document.getElementById("name2");
let name2_msg = document.getElementById("name2_msg");

let email = document.getElementById("email");
let email_msg = document.getElementById("email_msg");
let phone = document.getElementById("phone");
let phone_msg = document.getElementById("phone_msg");
let password = document.getElementById("password");
let password_msg = document.getElementById("password_msg");
let repassword = document.getElementById("repassword");
let repassword_msg = document.getElementById("repassword_msg");
let name1Check = false;
let name2Check = false;
let phoneCheck = false;
let repasswordCheck = false;
let emailCheck = false;
let passwordCheck = false;


btncheck(
    emailCheck,
    passwordCheck,
    repasswordCheck,
    phoneCheck,
    name1Check,
    name2Check
  );
  
  
  function validation() 
  {
  
    name1.addEventListener("input", () => {
      if (nameRegex.test(name1.value)) {
        name1_msg.innerHTML = "";
        name1.style.borderBottom = "3px solid green";
        name1Check = true;
      } else {
        name1_msg.innerHTML = "الاسم يجب ان يحتوي حروف فقط";
        name1_msg.style.color = "red";
        name1.style.borderBottom = "3px solid red";
        name1Check = false;
      }
      btncheck(
        emailCheck,
        passwordCheck,
        repasswordCheck,
        phoneCheck,
        name1Check,
        name2Check
      );
    });
    name2.addEventListener("input", () => {
      if (nameRegex.test(name2.value)) {
        name2_msg.innerHTML = "";
        name2.style.borderBottom = "3px solid green";
        name2Check = true;
      } else {
        name2_msg.innerHTML = "الاسم يجب ان يحتوي حروف فقط";
        name2_msg.style.color = "red";
        name2.style.borderBottom = "3px solid red";
        name2Check = false;
      }
      btncheck(
        emailCheck,
        passwordCheck,
        repasswordCheck,
        phoneCheck,
        name1Check,
        name2Check
      );
    });
    email.addEventListener("input", () => {
      console.log(emailRegex.test(email.value));
      if (emailRegex.test(email.value)) {
        email_msg.innerHTML = "";
        email.style.borderBottom = "3px solid green";
        emailCheck = true;
      } else {
        email_msg.innerHTML = "ايميل غير صحيح";
        email_msg.style.color = "red";
        email.style.borderBottom = "3px solid red";
        emailCheck = false;
      }
      btncheck(
        emailCheck,
        passwordCheck,
        repasswordCheck,
        phoneCheck,
        name1Check,
        name2Check
      );
    });
  
    password.addEventListener("input", () => {
      if (passwordRegex.test(password.value)) {
        password.style.borderBottom = "3px solid green";
        password_msg.innerHTML = "كلمة المرور قوية";
        password_msg.style.color = "green";
        passwordCheck = true;
      } else {
  
         password_msg.innerHTML = "كلمة المرور غير صحيحة , كلمة المرور يجب أن لا تقل عن 6 ارقام (1 حرف كبير ,1 حرف صغير , رمز وارقام)";
        password_msg.style.color = "red";
        password.style.borderBottom = "3px solid red";
        passwordCheck = false;
      }
      btncheck(
        emailCheck,
        passwordCheck,
        repasswordCheck,
        phoneCheck,
        name1Check,
        name2Check
      );
    });
  
    repassword.addEventListener("input", () => {
      if (repassword.value === password.value) {
        repassword_msg.style.color = "green";
        repassword_msg.innerHTML = "كلمة المرور متطابقة";
        repassword.style.borderBottom = "3px solid green";
        repasswordCheck = true;
      } else {
        repassword_msg.innerHTML = "كلمة المرور غير متطابقة";
        repassword_msg.style.color = "red";
        repassword.style.borderBottom = "3px solid red";
        repasswordCheck = false;
      }
      btncheck(
        emailCheck,
        passwordCheck,
        repasswordCheck,
        phoneCheck,
        name1Check,
        name2Check
      );
    });
    phone.addEventListener("input", () => {
      if (numperRegex.test(phone.value)) {
        phone_msg.style.color = "green";
        phone_msg.innerHTML = "";
        phone.style.borderBottom = "3px solid green";
        phoneCheck = true;
      } else {
        phone_msg.innerHTML = "رقم الهاتف غير صحيح , يجب ان يحتوي على ارقام فقط";
        phone_msg.style.color = "red";
        phone.style.borderBottom = "3px solid red";
        phoneCheck = false;
      }
      btncheck(
        emailCheck,
        passwordCheck,
        repasswordCheck,
        phoneCheck,
        name1Check,
        name2Check
      );
    });
  }
  
  validation();
  
  
  // check all inputs 
  function btncheck(email, password, repass, name1, name2, phone) 
  {
    let sign = document.getElementById("sign-btn");
    if (email && password && repass && name1 && name2 && phone) {
      sign.removeAttribute("disabled");
      sign.style.cursor = "pointer";
  
    } else {
      sign.setAttribute("disabled", "disabled");
      sign.style.cursor = "not-allowed";
    }
  }
  