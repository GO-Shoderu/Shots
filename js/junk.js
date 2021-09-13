$('button').eq(2).on('click', edit);

function edit() {
  $(this).parent().addClass("row");

  var tpe = $(this).parent().find('b').text();

  $(this).parent().find('b').remove();
  var alter = $(this).parent().find('span').text();
  $(this).parent().find('span').remove();

  var replaceEdit = '<div class="col-8"><input type="text" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right">Update</button></div>';

  $(this).parent().append(replaceEdit);
  $(this).remove();

  $('button').eq(2).on('click', update);
}

function update() {
  var parent = $(this).parent().parent();

  var inp = $(this).parent().parent().find('input').val();

  var replaceUpdate = '<b>Name:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right">Edit</button>';

  $(this).parent().parent().removeClass("row");
  $(this).parent().parent().children().remove();

  parent.append(replaceUpdate);

  $('button').eq(2).on('click', edit);
}

$('button').eq(3).on('click', edit1);

function edit1() {
  $(this).parent().addClass("row");

  var tpe = $(this).parent().find('b').text();

  $(this).parent().find('b').remove();
  var alter = $(this).parent().find('span').text();
  $(this).parent().find('span').remove();

  var replaceEdit = '<div class="col-8"><input type="text" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right">Update</button></div>';

  $(this).parent().append(replaceEdit);
  $(this).remove();

  $('button').eq(3).on('click', update1);
}

function update1() {
  var parent = $(this).parent().parent();

  var inp = $(this).parent().parent().find('input').val();

  var replaceUpdate = '<b>Surname:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right">Edit</button>';

  $(this).parent().parent().removeClass("row");
  $(this).parent().parent().children().remove();

  parent.append(replaceUpdate);

  $('button').eq(3).on('click', edit1);
}

$('button').eq(4).on('click', edit2);

function edit2() {
  $(this).parent().addClass("row");

  var tpe = $(this).parent().find('b').text();

  $(this).parent().find('b').remove();
  var alter = $(this).parent().find('span').text();
  $(this).parent().find('span').remove();

  var replaceEdit = '<div class="col-8"><input type="email" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right">Update</button></div>';

  $(this).parent().append(replaceEdit);
  $(this).remove();

  $('button').eq(4).on('click', update2);
}

function update2() {
  var parent = $(this).parent().parent();

  var inp = $(this).parent().parent().find('input').val();

  var replaceUpdate = '<b>Email:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right">Edit</button>';

  $(this).parent().parent().removeClass("row");
  $(this).parent().parent().children().remove();

  parent.append(replaceUpdate);

  $('button').eq(4).on('click', edit2);
}


$('button').eq(5).on('click', edit3);

function edit3() {
  $(this).parent().addClass("row");

  var tpe = $(this).parent().find('b').text();

  $(this).parent().find('b').remove();
  var alter = $(this).parent().find('span').text();
  $(this).parent().find('span').remove();

  var replaceEdit = '<div class="col-8"><input type="date" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right">Update</button></div>';

  $(this).parent().append(replaceEdit);
  $(this).remove();

  $('button').eq(5).on('click', update3);

}

function update3() {
  var parent = $(this).parent().parent();

  var inp = $(this).parent().parent().find('input').val();

  var replaceUpdate = '<b>Birth date:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right">Edit</button>';

  $(this).parent().parent().removeClass("row");
  $(this).parent().parent().children().remove();

  parent.append(replaceUpdate);

  $('button').eq(5).on('click', edit3);

}
