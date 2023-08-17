$(function() {
  var id, suite, price;
  var flag = 0;
  var req = $("h1#suites").html();
  var date = $('input[name="fecha"]').val();
  $('input[name="date"]').val(date);
  $("button.select_btn").click(function(){
    id = 0;
    if(flag == 0){
      suite = 0;
      price = 0;
    }
    flag += 1;
    // $("select").css({"display":"none"});
    // $("button.select_btn").css({"display":""})
    $(this).css({"display":"none"});
    price += Number($(this).attr('id'));
    id = $(this).next().attr('id');
    $(this).next().css({"display":""});
    $("div#booking").css({"display":""});
    suite += 1;
    $("h1#suites").html(suite + req);
    $("h1#total_price").html("USD $" + price);
    $('input[name="id"]').val(id);
    $('input[name="suite"]').val(suite);
    $('input[name="total_price"]').val(price);
  });
  $('select').change(function(){ 
      var id;
      var value = $(this).val();
      var dis = $(this).next().html();
      var dis_array = dis.split(" Suites USD $");
      var pre_suite = Number(dis_array[0]);
      var pre_price = Number(dis_array[1]);
      if(value == '0'){
          flag -= 1;
          if(flag == 0){
            $("div#booking").css({"display":"none"});
          }
          $(this).css({"display":"none"});
          $(this).prev().css({"display":""});
          suite = suite - pre_suite;
          price = price - pre_price;
          id = 0;
          $(this).val('1');
          var one = Number($(this).prev().attr('id'));
          $(this).next().html("1 Suites USD $" + one );
      } else{
          id = $(this).attr('id');
          var suite_price = Number($(this).prev().attr('id'));
          var current_price = Number(suite_price) * Number(value);
          suite = suite + Number(value) - pre_suite;
          price = price + current_price  - pre_price;
          $(this).next().html(value +" Suites USD $" + current_price);
      }
      $("h1#suites").html(suite + req);
      $("h1#total_price").html("USD $" + price);
      $('input[name="id"]').val(id);
      $('input[name="suite"]').val(suite);
      $('input[name="total_price"]').val(price);
  });
  $("input.wine").change(function() {
      var result = $(this).parent().parent().next().next().next();
      if(this.checked) {
          let init = result.html();
          init += ", Wine- USD $1200";
          result.html(init);
      } else{
          let init = result.html();
          init = init.replace(", Wine- USD $1200", "");
          result.html(init);
      }
  });
  $("input.romantic").change(function() {
      var result = $(this).parent().parent().next().next().next();
      if(this.checked) {
          let init = result.html();
          init += ", Romantic- USD $1900";
          result.html(init);
      } else{
          let init = result.html();
          init = init.replace(", Romantic- USD $1900", "");
          result.html(init);
      }
  });
});