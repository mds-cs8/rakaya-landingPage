const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

let password = document.getElementById("password");
let password_msg = document.getElementById("password_msg");

let repassword = document.getElementById("repassword");
let repassword_msg = document.getElementById("repassword_msg");

let passwordCheck = false;
let repasswordCheck = false;





btncheck(
    passwordCheck,
    repasswordCheck,
);



function validation() 
{
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
                passwordCheck,
                repasswordCheck,
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
                passwordCheck,
                repasswordCheck,
            );


      });

    }

    validation() ;


    
// check apasswords
function btncheck( password, repass) 
{
    let sign = document.getElementById("reset-btn");
    if (password && repass ) {
      sign.removeAttribute("disabled");
      sign.style.cursor = "pointer";
  
    } else {
      sign.setAttribute("disabled", "disabled");
      sign.style.cursor = "not-allowed";
    }
  }