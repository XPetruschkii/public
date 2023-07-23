const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const submitBtn = document.querySelector("button[type='submit']");
const errorDiv = document.getElementById("error");

// disable submit button on page load
submitBtn.disabled = true;

// add event listeners to email and password input fields
emailInput.addEventListener("input", checkInputs);
passwordInput.addEventListener("input", checkInputs);

function checkInputs() {
  const emailValue = emailInput.value.trim();
  const passwordValue = passwordInput.value.trim();

  // check email input for validity
  if (emailValue.length >= 5 && emailValue.includes("@")) {
    emailInput.classList.remove("error");
  } else {
    emailInput.classList.add("error");
  }

  // check password input for validity
  if (passwordValue.length >= 5) {
    passwordInput.classList.remove("error");
  } else {
    passwordInput.classList.add("error");
  }

  // enable/disable submit button based on input validity
  if (emailValue.length >= 5 && emailValue.includes("@") && passwordValue.length >= 5) {
    submitBtn.disabled = false;
    errorDiv.innerHTML = "";
  } else if (emailValue.length < 5 && passwordValue.length < 5) {
    submitBtn.disabled = true;
    errorDiv.innerHTML = "Email and password should be at least 5 characters long and include an '@' symbol.";
  } else if (emailValue.length < 5) {
    submitBtn.disabled = true;
    errorDiv.innerHTML = "Email should be at least 5 characters long and include an '@' symbol.";
  } else if (passwordValue.length < 5) {
    submitBtn.disabled = true;
    errorDiv.innerHTML = "Password should be at least 5 characters long.";
  } else {
    submitBtn.disabled = true;
    errorDiv.innerHTML = "";
  }
}
