$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

const requestPost = (data) => {
  $.ajax({
    url: "controllers/index.php",
    method: "POST",
    data: data,
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
  //console.log({ data: getDataForm(), emailClient: getEmailToSend() });  
  requestPost({ data: getDataForm(), emailClient: getEmailToSend() });
});
