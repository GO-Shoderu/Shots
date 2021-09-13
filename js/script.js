$(document).ready(function(){

  //this code if for editing the profile
  // ###########################################################

  $('button').on('click', edit);

  function edit() {
    if ($(this).attr('data-index') == 'editName') {

      $(this).parent().addClass("row");

      var tpe = $(this).parent().find('b').text();

      $(this).parent().find('b').remove();
      var alter = $(this).parent().find('span').text();
      alter = alter.trim();
      $(this).parent().find('span').remove();

      var replaceEdit = '<div class="col-8"><input type="text" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right update" data-index="updateName">Update</button></div>';

      $(this).parent().append(replaceEdit);
      $(this).remove();

      $('button').on('click', update);

    }else if ($(this).attr('data-index') == 'editSurname') {

      $(this).parent().addClass("row");

      var tpe = $(this).parent().find('b').text();

      $(this).parent().find('b').remove();
      var alter = $(this).parent().find('span').text();
      alter = alter.trim();
      $(this).parent().find('span').remove();

      var replaceEdit = '<div class="col-8"><input type="text" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right update" data-index="updateSurname">Update</button></div>';

      $(this).parent().append(replaceEdit);
      $(this).remove();

      $('button').on('click', update);

    }else if ($(this).attr('data-index') == 'editEmail') {

      $(this).parent().addClass("row");

      $(this).parent().find('b').remove();
      var alter = $(this).parent().find('span').text();
      alter = alter.trim();

      alert(" Edit Email button clicked and email is " + alter);

      $(this).parent().find('span').remove();

      var replaceEdit = '<div class="col-8"><input type="email" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right update" data-index="updateEmail">Update</button></div>';

      $(this).parent().append(replaceEdit);
      $(this).remove();

      $('button').on('click', update);

    }else if ($(this).attr('data-index') == 'editDate') {

      $(this).parent().addClass("row");

      $(this).parent().find('b').remove();
      var alter = $(this).parent().find('span').text();
      alter = alter.trim();
      $(this).parent().find('span').remove();

      var replaceEdit = '<div class="col-8"><input type="date" value="' + alter + '" class="form-control"></div><div class="col"><button class="btn btn-dark float-right update" data-index="updateDate">Update</button></div>';

      $(this).parent().append(replaceEdit);
      $(this).remove();

      $('button').on('click', update);

    }
  }

  function update() {

    if ($(this).attr('data-index') == 'updateName') {

      var parent = $(this).parent().parent();

      var inp = $(this).parent().parent().find('input').val();

      var email = $("#loginEmail").val();

      $('button').on('click', ajaxing(email, inp, 1));

      var replaceUpdate = '<b style="color:white;">Name:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right" data-index="editName">Edit</button>';

      $(this).parent().parent().removeClass("row");
      $(this).parent().parent().children().remove();

      parent.append(replaceUpdate);

      $('button').on('click', edit);

    }else if ($(this).attr('data-index') == 'updateSurname') {

      var parent = $(this).parent().parent();

      var inp = $(this).parent().parent().find('input').val();

      var email = $("#loginEmail").val();

      $('button').on('click', ajaxing(email, inp, 2));

      var replaceUpdate = '<b style="color:white;">Surname:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right" data-index="editSurname">Edit</button>';

      $(this).parent().parent().removeClass("row");
      $(this).parent().parent().children().remove();

      parent.append(replaceUpdate);

      $('button').on('click', edit);

    }else if ($(this).attr('data-index') == 'updateEmail') {

      var parent = $(this).parent().parent();

      var inp = $(this).parent().parent().find('input').val();

      var email = $("#loginEmail").val();

      $('button').on('click', ajaxing(email, inp, 3));

      var replaceUpdate = '<b style="color:white;">Email:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right" data-index="editEmail">Edit</button>';

      $(this).parent().parent().removeClass("row");
      $(this).parent().parent().children().remove();

      parent.append(replaceUpdate);

      $('button').on('click', edit);

    }else if ($(this).attr('data-index') == 'updateDate') {

      var parent = $(this).parent().parent();

      var inp = $(this).parent().parent().find('input').val();

      var email = $("#loginEmail").val();

      $('button').on('click', ajaxing(email, inp, 4));

      var replaceUpdate = '<b style="color:white;">Birth date:</b> <span>' + inp + '</span> <button class="btn btn-dark float-right" data-index="editDate">Edit</button>';

      $(this).parent().parent().removeClass("row");
      $(this).parent().parent().children().remove();

      parent.append(replaceUpdate);

      $('button').on('click', edit);

    }

  }

  function ajaxing(email, inp, val){

    var user = $("#loginUser").val();

    if (val == 1) {

      $.ajax({

          type: "POST",
          url: "updateProfile.php",
          data: {email:email, name:inp},

      }).done(data => {

          if(data=="Valid"){
            alert('now following');
          }

      });

    }else if (val == 2) {

      $.ajax({

          type: "POST",
          url: "updateProfile.php",
          data: {email:email, surname:inp},

      }).done(data => {

          if(data=="Valid"){
            alert('now following');
          }

      });

    }else if (val == 3) {

      $.ajax({

          type: "POST",
          url: "updateProfile.php",
          data: {email:email, inputEmail:inp, userid:user},

      }).done(data => {

      });

    }else if (val == 4) {

      $.ajax({

          type: "POST",
          url: "updateProfile.php",
          data: {email:email, date:inp},

      }).done(data => {

      });

    }

    return false;
  }

  //#################################################################
  //the top is for editing profiles

  //this code below is for the follow functionality
  //-----------------------------------------------
  $('.follow').click(function(run){

    var fllw = $(this).text();

    var appnd = "<a href='' style='color:red;' class='dropdown-item unfollow'>Unfollow</a>";
    $(this).parent().append(appnd);

    var post = $(this).parent().find("input").val();

    $(this).remove();

    var email = $("#loginEmail").val();
    var pass = $("#loginPass").val();
    var user = $("#loginUser").val();

    // console.log("Post No: " + post);

    $.ajax({

        type: "POST",
        url: "follow.php",
        data: {email:email, pass:pass, post:post, user:user},

    }).done(data => {

    });

    return false;
  });
  //------------------------------------------------

  //this code below is for the unfollow functionality at homepage
  //-----------------------------------------------
  $('.unfollowHome').click(function(run){

    // alert("Other user: " + $(this).next().val() + "Yours: " + $(this).next().next().val());


    var other = $(this).next().val();
    var mine = $(this).next().next().val();

    $.ajax({

        type: "POST",
        url: "unfollow.php",
        data: {other:other, mine:mine},

    }).done(data => {

    });

    window.location.href = "homepage.php";

    return false;
  });
  //------------------------------------------------

  //this code below is for the unfollow functionality on global page
  //-----------------------------------------------
  $('.unfollow').click(function(run){

    // var fllw = $(this).text();
    //
    // var appnd = "<a href='' class='dropdown-item follow'>Follow</a>";
    // $(this).parent().append(appnd);
    //
    // var post = $(this).parent().find("input").val();
    //
    // $(this).remove();

    window.location.href = "homepage.php";

    // var email = $("#loginEmail").val();
    // var pass = $("#loginPass").val();
    // var user = $("#loginUser").val();
    //
    // // console.log("Post No: " + post);
    //
    // $.ajax({
    //
    //     type: "POST",
    //     url: "follow.php",
    //     data: {email:email, pass:pass, post:post, user:user},
    //
    // }).done(data => {
    //
    // });

    return false;
  });
  //------------------------------------------------
    //this code below is for the comment functionality
    //-----------------------------------------------
    $('.comment').click(function(run){

      // alert(" Comment button clicked ");
      var nme = $(this).parent().find("#loginName").val();

      var comment = $(this).parent().find("input").val();

      var appnd = '<p><b>' + nme + '</b> &nbsp;' + comment +' </p>"';

      $(this).parent().parent().append(appnd);

      var email = $(this).parent().find("#loginEmail").val();
      var pass = $(this).parent().find("#loginPass").val();
      var user = $(this).parent().find("#loginUser").val();
      var imgId = $(this).parent().find("#imgId").val();

      $.ajax({

          type: "POST",
          url: "comment.php",
          data: {email:email, pass:pass, user:user, imgId:imgId, comment:comment},

      }).done(data => {

      });

    });
    //------------------------------------------------

    //this code below is image to post link on the profile functionality
    //-----------------------------------------------
    $('.profBut').click(function(){

      var pt = $(this).find("input").val();

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "posted.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "pt";
      postInput.value = pt;

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

    });
    //------------------------------------------------

    //this code below is for toggle between All Images and Album header in the profile
    //-------------------------------------------------------

    $('#allImages').click(function(run){

      //stop normal link behaviour
      return false;
    });
    //
    $('#album').click(function(run){

      //stop normal link behaviour
      return false;
    });
    //
    $('#useless').click(function(run){

      //stop normal link behaviour
      return false;
    });

    //-------------------------------------------------------

    //this code is for adding image from the profile
    //----------------------------------------------------------------
    $('.addImage').click(function(){

      // var pt = $(this).find("input").val();

      // var postedPage = document.createElement("form");
      // postedPage.method = "POST";
      // postedPage.action = "profileAddImage.php";
      //
      // var postInput = document.createElement("input");
      // postInput.type = "hidden";
      // postInput.name = "pt";
      // postInput.value = "0";
      //
      // postedPage.appendChild(postInput);
      //
      // document.body.appendChild(postedPage);
      //
      // postedPage.submit();

      window.location.href = "homepage.php";

    });
    //----------------------------------------------------------------

    //this code is for adding image from the profile
    //----------------------------------------------------------------
    $('.addAlbum').click(function(){

      // var pt = $(this).find("input").val();

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "profileAddAlbum.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "pt";
      postInput.value = "0";

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

    });
    //----------------------------------------------------------------

    $('.picToUpload').click(function(){

      // alert($(this).parent().parent().parent().find("#formControlSelect").val());

      if ($(this).parent().parent().parent().find("#formControlSelect").val() == "Create Album") {

        window.location.href = "profileAddAlbum.php";
        return false;

      } else {

      }

      // return false;
    });

    $('.alBut').click(function(){

      // alert($(this).find("#pt").val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "albumContent.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "pt";
      postInput.value = $(this).find("#pt").val();

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

    });

    $('.ownProfile').click(function(){

      // alert("Own profile selected: " + $(this).parent().parent().parent().find("#ownId").val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "profile.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "ownId";
      postInput.value = $(this).parent().parent().parent().find("#ownId").val();

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

      return false;
    });

    $('.otherProfile').click(function(){

      // alert("Other profile selected: " + $(this).parent().parent().parent().find("#otherId").val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "profile.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "otherId";
      postInput.value = $(this).parent().parent().parent().find("input").val();

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

      return false;
    });

    $('.otherProfil').click(function(){

      // alert("Other profile selected: " + $(this).next().val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "profile.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "otherId";
      postInput.value = $(this).next().val();

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

      return false;
    });

    $('#gotoOtherAlb').click(function(){

      // alert("Other profile selected: " + $(this).parent().find("#otherId").val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "profileAlbum.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "otherId";
      postInput.value = $(this).parent().find("#otherId").val();

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

      return false;
    });

    $('#gotoOtherProfile').click(function(){

      // alert("Other profile selected: " + $(this).parent().find("#otherId").val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "profile.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "otherId";
      postInput.value = $(this).parent().find("#otherId").val();

      postedPage.appendChild(postInput);

      document.body.appendChild(postedPage);

      postedPage.submit();

      return false;
    });

    $('.OalBut').click(function(){

      // alert($(this).find("#pt").val());

      var postedPage = document.createElement("form");
      postedPage.method = "POST";
      postedPage.action = "albumContent.php";

      var postInput = document.createElement("input");
      postInput.type = "hidden";
      postInput.name = "pt";
      postInput.value = $(this).find("#pt").val();

      postedPage.appendChild(postInput);

      var postInpu = document.createElement("input");
      postInpu.type = "hidden";
      postInpu.name = "otherId";
      postInpu.value = $(this).find("#otherId").val();

      postedPage.appendChild(postInpu);

      document.body.appendChild(postedPage);

      postedPage.submit();

    });

    //this code below is for the delete functionality
    //-----------------------------------------------
    $('.deleteAcc').click(function(run){

      // alert($(this).find("#dele").val());

      var delet = $(this).find("#dele").val();


      $.ajax({

          type: "POST",
          url: "delete.php",
          data: {del:delet},

      }).done(data => {

      });

      window.location.href = "index.php";

      return false;
    });
    //------------------------------------------------

});
