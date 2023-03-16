class FormValidation{
formValues={
    email:"",
    password:"",

}
errorValues={
  emailErr:"",
  
  passwordErr:"",
}
showErrorMsg(index,msg){
    const form_group=document
    .getElementsByClassName('form-group')[index]//[0] frist index value
     // error cls add 
     form_group.classList.add('error')
     //error msg display
     form_group.getElementsByTagName('span')[0].textContent=msg
}
showSuccessMsg(index){
    const form_group=document
    .getElementsByClassName('form-group')[index]
    // alredy add in error class so in this group to remove the error class
form_group.classList.remove('error')
form_group.classList.add('success')
    
}
geInputs(){
    // id name 

this.formValues.email=document
.getElementById('email').value.trim()

this.formValues.password=document
.getElementById('password').value.trim()


}
// ValidateUsername(){
//    if(this.formValues.username===""){
// this.errorValues.usernameErr=
// "* please Enter your name. "
//  //display
//  this.showErrorMsg(0, this.errorValues.usernameErr)
//    }else if(this.formValues.username.length<=4){
//     this.errorValues.usernameErr="* Username must be atleast 5 characters"
//     this.showErrorMsg(0,this.errorValues.usernameErr)
//    }
// else if(this.formValues.username.length>14){
//  this.errorValues.usernameErr="* Username should not exceds 14 characters" 
//  this.showErrorMsg(0,this.errorValues.usernameErr)  
// }
// else{
//     this.errorValues.usernameErr=""// no error its empty
//     this.showSuccessMsg(0)
// }
//  }

validateEmail(){
    //abc@gmail.co.in
    const regExp = /^([a-zA-Z0-9-_\.]+)@([a-zA-Z0-9]+)\.([a-zA-Z]{2,10})(\.[a-zA-Z]{2,8})?$/
    if(this.formValues.email === ""){
        this.errorValues.emailErr = "* Please Enter Valid Email"
        this.showErrorMsg(0,this.errorValues.emailErr)
    } else if(!(regExp.test(this.formValues.email))){
        this.errorValues.emailErr = "* Invalid Email"
        this.showErrorMsg(0,this.errorValues.emailErr)
    } else {
        this.errorValues.emailErr = ""
        this.showSuccessMsg(0)
    }
}

// ValidatePhonenumber(){
// const phoneno=/^\d{10}$/
// if(this.formValues.phonenumber===""){
//   this.errorValues.phonenumberErr="* Please Enter valid number"
//   this.showErrorMsg(2,this.errorValues.phonenumberErr)

// }else if(phoneno.test(this.formValues.phonenumber)){
//  this.errorValues.phonenumberErr=""
//  this.showSuccessMsg(2)   
// }
// else{
//     this.errorValues.phonenumberErr="* Invalid phone Number"
//      this.showErrorMsg(2,this.errorValues.phonenumberErr)

// }

// }

validatePassword(){
    if(this.formValues.password === ""){
        this.errorValues.passwordErr = "* Please Provide a Password"
        this.showErrorMsg(1,this.errorValues.passwordErr)
    } else if(this.formValues.password.length <= 4){
        this.errorValues.passwordErr = "* Password must be atleast 5 Characters"
        this.showErrorMsg(1,this.errorValues.passwordErr)
    } else if(this.formValues.password.length > 10){
        this.errorValues.passwordErr = "* Password should not exceeds 10 Characters"
        this.showErrorMsg(1,this.errorValues.passwordErr)
    } else {
        this.errorValues.passwordErr = ""
        this.showSuccessMsg(1)
    }
}
// ValidateConfirmpassword(){

//     if(this.formValues.confirmpassword===""){
//         this.errorValues.passwordErr="*Invalid confirm password"
//         this.showErrorMsg(4,this.errorValues.confirmpasswordErr)
//     }
//     else if( this.formValues.confirmpassword===this.formValues.password
//         &&this.errorValues.passwordErr === ""){
//         this.errorValues.confirmpasswordErr=""
//     this.showSuccessMsg(4)    
//     } else if(this.errorValues.passwordErr){
//         this.errorValues.confirmpasswordErr = "* An error occurred in Password Field"
//         this.showErrorMsg(4,this.errorValues.confirmpasswordErr)
//     } else {
//         this.errorValues.confirmpasswordErr = "* Password Must Match"
//         this.showErrorMsg(4,this.errorValues.confirmpasswordErr)
//     }

// }
alertMessage(){
    //extract
    const { emailErr ,
 passwordErr}= this.errorValues
    if(emailErr === "" 
    && passwordErr === ""){
        swal("Registration Successful","ThankYou , "+this.formValues.email,"success").then(() => {
            //alert okay click after that clear in inputmethod
            console.log(this.formValues)
            this.removeInputs()
        })
    } else {
        swal("Give Valid Inputs","Click ok to Continue" ,"error")
    }
}
//  register success input valid data remove
removeInputs(){
    const form_groups = document.getElementsByClassName('form-group')
//collection of data in html so connect
    Array.from(form_groups).forEach(element => {
        element.getElementsByTagName('input')[0].value = ""
        element.getElementsByTagName('span')[0].textContent = ""
        element.classList.remove('success')
    })
}
} 

const ValidateUserInputs = new FormValidation()

document.getElementsByClassName('form')[0].addEventListener('submit' , event => {
    event.preventDefault()
    ValidateUserInputs.getInputs()//page don't refer()
    ValidateUserInputs.validateEmail()
    ValidateUserInputs.validatePassword()
  
    ValidateUserInputs.alertMessage()
})