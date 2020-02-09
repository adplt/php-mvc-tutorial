$(function () {
  $('.show-add-modal').on('click', function() {
    $('#studentFormLabel').html('Add New Student');
    $('.modal-footer button[type=submit]').html('Add');
  });

  $('.show-update-modal').on('click', function() {
    $('#studentFormLabel').html('Update Student Data');
    $('.modal-footer button[type=submit]').html('Update');
    $('.modal-body form').attr('action', 'http://192.168.64.2/phpmvc/public/Student/update');

    const id = $(this).data('id');
    console.log('id: ', id);

    $.ajax({
      url: 'http://192.168.64.2/phpmvc/public/Student/getDetailResponse', // url method pada controller
      data: { // data yang mw dikirim
        id: id,
      },
      method: 'post', // nanti bakal masuk data'a di $_POST
      dataType: 'json', // return'a berupa json
      success: function (data) { // callback sukses
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#nik').val(data.nik);
        $('#email').val(data.email);
        $('#degree').val(data.degree);
      }
    });
  });

})
