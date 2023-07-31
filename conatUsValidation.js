
const nameRegex = /[a-zA-Zء-ي]/;
const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;



let email = document.getElementById("emailcontactUs");
let subject = document.getElementById("topiccontactUs");
let message = document.getElementById("messagecontactUs");

let email_msg = document.getElementById("email_msg");
let subject_msg = document.getElementById("subject_msg");
let message_msg = document.getElementById("message_msg");



let emailCheck = true;
let subjectCheck = true;
let messageCheck = true;




btncheck(
    emailCheck,
    subjectCheck,
    messageCheck
  );


  function validation() 
{

    subject.addEventListener("input", () => {
    if (nameRegex.test(subject.value)) {
        subject_msg.innerHTML = "";
      subject.style.borderBottom = "3px solid green";
      subjectCheck = true;
    } else {
        subject_msg.innerHTML = "الموضوع يجب ان يحتوي حروف فقط";
        subject_msg.style.color = "red";
      subject.style.borderBottom = "3px solid red";
      subjectCheck = false;
    }
    btncheck(
        emailCheck,
        subjectCheck,
        messageCheck
    );
    
});
  message.addEventListener("input", () => {
    if (nameRegex.test(message.value)) {
        message_msg.innerHTML = "";
        message.style.borderBottom = "3px solid green";
        messageCheck = true;
    } else {
        message_msg.innerHTML = "الرسالة يجب ان يحتوي حروف فقط";
        message_msg.style.color = "red";
        message.style.borderBottom = "3px solid red";
      messageCheck = false;
    }
    btncheck(
        emailCheck,
        subjectCheck,
        messageCheck
    );
  });
  email.addEventListener("input", () => {
    console.log(emailRegex.test(email.value));
    if (emailRegex.test(email.value)) {
      email_msg.innerHTML = "";
      email.style.borderBottom = "3px solid green";
      emailCheck = true;
    } else {
      email_msg.innerHTML = "البريد الإلكتروني غير صحيح";
      email_msg.style.color = "red";
      email.style.borderBottom = "3px solid red";
      emailCheck = false;
    }
    btncheck(
        emailCheck,
    subjectCheck,
    messageCheck
    );
  });

 
} 
// end validation

validation();


// check all inputs 
function btncheck(email, subject, message) 
{
  console.log("here");
  let sign = document.getElementById("contctFormSubmit");
  if (email && subject && message ) {
    sign.removeAttribute("disabled");
    sign.style.cursor = "pointer";

  } else {
    sign.setAttribute("disabled", "disabled");
    sign.style.cursor = "not-allowed";
  }
}
