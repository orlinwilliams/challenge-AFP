//----------------data-----------------------------
const inputs = document.querySelectorAll("#registerForm input");

const getDataForm = () => {
  const name = $("#nameComplete").val();
  const idNumber = $("#idNumber").val();
  const dateOfBirth = $("#dateOfBirth").val();
  const address = $("#address").val();
  const phone = $("#phone").val();
  const email = $("#email").val();
  return { name, idNumber, dateOfBirth, address, phone, email };
};
const getEmailToSend = () => {
  const mainEmail = $("#mainEmail").val();
  const emailCc = $("#emailCc").val();
  return { mainEmail, emailCc };
};

//---------------validations-----------
const regex = {
  name: /^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/,
  email: /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/,
  phone: /^([0-9])*$/,
  idNumber: /^([0-9])*$/,
};
const inputsValidate = (data) => {
  if (!regex.name.test(data.name)) return false;
  if (!regex.idNumber.test(data.idNumber) || data.idNumber.length == 0) return false;
  if (data.address.length < 2) return false;
  if (data.dateOfBirth.length < 2) return false;
  if (!regex.phone.test(data.phone)) return false;
  if (!regex.email.test(data.email)) return false;
  return true;
};

const inputsEmailValidate = (data) => {
  if (!regex.email.test(data.mainEmail)) return false;
  return true;
};
const emailValidate = () => {
  if (inputsEmailValidate(getEmailToSend()))
    $("#sendEmail").prop("disabled", false);
  else $("#sendEmail").prop("disabled", true);
};
const validate = () => {
  if (inputsValidate(getDataForm())) $("#saveData").prop("disabled", false);
  else $("#saveData").prop("disabled", true);
};
inputs.forEach((el) => {
  el.addEventListener("keyup", validate);
  el.addEventListener("blur", validate);
});
$("#mainEmail").keyup(emailValidate);
$("#mainEmail").blur(emailValidate);

const showDataInModal = () => {
  const currentData = getDataForm();
  $("#showName").val(currentData.name);
  $("#showIdNumber").val(currentData.idNumber);
  $("#showDateOfBirth").val(currentData.dateOfBirth);
  $("#showAddress").val(currentData.address);
  $("#showPhone").val(currentData.phone);
  $("#showEmail").val(currentData.email);
};
