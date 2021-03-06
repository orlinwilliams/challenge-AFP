$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

const requestPost = (data) => {
  $.ajax({
    url: "clases/index.php?accion=2",
    method: "POST",
    data: {},
    success: function (res) {
      console.log(res);
    },
    error: function (error) {
      console.log(error);
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
  console.log(getDataForm());
  console.log(getEmailToSend());
  requestPost(getDataForm());
});

