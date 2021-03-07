$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
const notification = (type, message) => {
  $("#messageToast").html(message);

  if (type == "success") {
    $(".toast-body").removeClass("bg-danger");
    $("#iconMessage").removeClass("fa-exclamation-circle");
    $(".toast-body").addClass("bg-success");
    $("#iconMessage").addClass("fa-check-circle");
    $(".toast").toast("show");
  } else if (type == "error") {
    $(".toast-body").removeClass("bg-success");
    $("#iconMessage").removeClass("fa-check-circle");
    $(".toast-body").addClass("bg-danger");
    $("#iconMessage").addClass("fa-exclamation-circle");
    $(".toast").toast("show");
  }
};
const requestPost = (data) => {
  $.ajax({
    url: "controllers/index.php",
    method: "POST",
    data: data,
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if(res.error){
        notification('error', 'Error al envió del correo');
      }else{
        notification('success', 'Correo enviado exitosamente');
      }
    },
    error: function (error) {
      console.log(error);
      notification('error', 'Error al envió del correo');
    },
  });
};

$("#saveData").click((e) => {
  e.preventDefault();
  showDataInModal();
  $("#modalForm").modal("show");
});
$("#sendEmail").click((e) => {
  e.preventDefault();  
  requestPost({ data: getDataForm(), emailClient: getEmailToSend() });
});
