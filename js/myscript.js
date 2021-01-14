//save job js
$(document).ready(function() {
  $('.applyjob').click(function (e) {
    e.preventDefault();
    var company = $(this).attr('val');
    var jobId = $(this).attr('val2');
    $.get('applyjob?company='+company, 'jobId='+jobId, function (data) {
        $('#applyjob').modal('show')
            .find('#applyjobContent')
            .html(data);
    });
});
});

//view jon js
$(document).ready(function() {
  $('.viewjob').click(function (e) {
    e.preventDefault();
    var companyId = $(this).attr('val');
    var jobId = $(this).attr('val2');
    $.get('viewjob?companyId='+companyId, 'jobId='+jobId, function (data) {
        $('#viewjob').modal('show')
            .find('#viewjobContent')
            .html(data);
    });
});


});


  function displayModal(){
      $('myModal').modal('show')    
    }
