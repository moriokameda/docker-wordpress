'use strict';

$(function() {
  var maxCount = 3
  var ajaxurl = '//localhost:8000/wp-admin/admin-ajax.php';

  $.ajax({
    method: 'GET',
    url: ajaxurl,
    contentType: 'application/json',
    data : {
      'action': 'get_today_count',
    },
  }).then(function (response) {
    console.log(response);
    var todayCount = maxCount - parseInt(response);
    if (todayCount < 0) {
      todayCount = 3;
    }
    $(".count").text(todayCount);
  }).catch(function (error) {
    console.log(error);
  });

  $("#confirmbtn").on("click", function() {
    var todayForm = new Date();
    var y = todayForm.getFullYear();
    var m = ("00" + (todayForm.getMonth() + 1)).slice(-2);
    var d = ("00" + todayForm.getDate()).slice(-2);
    var today = y + '/' + m + '/' + d;
    // ajax通信
    $.ajax({
      type: 'POST',
      url: ajaxurl,
      data: {
        'action': 'set_count',
        'today' : today,
      },
    // 成功時
    }).then(function (response) {
      console.log(response);
      location.href = "https://1lejend.com/stepmail/kd.php?no=aeetylTa";
    // 失敗時
    }).catch(function (error) {
      console.log(error);
    });
  })
});
