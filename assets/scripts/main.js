// GENERAL -------------------------
window.addEventListener('load', function () {
  document.querySelector('body').classList.add('loaded');
})


// HEADER
if (document.querySelector('header.main-header') !== null) {
  document.querySelector('body main').classList.add('margin-active');
}


// FOOTER -------------------------
if (document.querySelector('.footer-copyright') !== null) {
  var footer = document.querySelector('.footer-copyright');
  var year = new Date();
  footer.innerHTML = 'Copyright &#169 ' + year.getFullYear() + ' <a href="https://rowinschmidt.nl/" target="_blank">Rowin Schmidt</a>';
}



// CONFIRM ACCOUNT -------------------------
if (document.querySelector('.confirm-darkmode input') !== null) {
  var toggleDarkmode = document.querySelector('.confirm-darkmode input');
  toggleDarkmode.onclick = function() {

    if (toggleDarkmode.checked == true){
      document.querySelector('body').classList.add('darkmode');
      document.querySelector('.toggle-slider-text').textContent = 'Donker hè?';
    } else {
      document.querySelector('body').classList.remove('darkmode');
      document.querySelector('.toggle-slider-text').textContent = 'Betreed de duisternis..';
    }
  }

  document.querySelector('#password-confirm').addEventListener("keyup", event => {
    var password = document.querySelector('#password').value;
    var passwordConfirm = document.querySelector('#password-confirm').value;

    if(password == passwordConfirm) {
      console.log("Wachtwoorden komen overeen");
      document.querySelector("#confirm-submit").disabled = false;
    }
    else {
      console.log("Wachtwoorden komen niet overeen");
      document.querySelector("#confirm-submit").disabled = true;
    }
  });
}



// LOGIN -------------------------
if (document.querySelector('.overlay') !== null) {
  // OVERLAY PASSWORD RESET TOGGLE
  var overlay = document.querySelector('.overlay');
  var overlay_close = document.querySelector('.overlay .overlay-close');
  var overlay_activate_login = document.querySelector('form .password-reset');

  overlay_activate_login.onclick = function() {
    overlay.classList.add('active');
  };
  overlay.onclick = function() {
    overlay.classList.remove('active');
  };
  overlay_close.onclick = function() {
    overlay.classList.remove('active');
  };

  // GENERATE RANDOM SKIN COLOR + HAIR COLOR
  function randomColorLogin() {
    var skinColors = ['FDA57D', 'efbc97', 'cc8a69', '8c5834', '593225'];
    var hairColors = ['F55F44', 'a07b5d', '72351c', '513420', '231105'];
    var randomColor = Math.floor(Math.random() * 5);

    var skinColor = document.querySelectorAll('main.login-page section .login-illustration svg .skin');
    for (var i = 0; i < skinColor.length; ++i) {
      var item = skinColor[i];  
      item.style.fill = skinColors[randomColor];
    }

    var hairColor = document.querySelectorAll('main.login-page section .login-illustration svg .hair');
    for (var i = 0; i < hairColor.length; ++i) {
      var item = hairColor[i];  
      item.style.fill = hairColors[randomColor];
    }
  }
  randomColorLogin();  

}



// REGISTER  -------------------------
if (document.querySelector('.register-page #username') !== null) {
  // USERNAME - REPLACE SPACE WITH DASH
  // https://stackoverflow.com/questions/1983648/replace-spaces-with-dashes-and-make-all-letters-lower-case
  var username_input = document.querySelector('.register-page #username');
  username_input.addEventListener("keyup", event => {
    var username_input_value = username_input.value.replace(/\s+/g, '-');
    username_input.value = username_input_value;
  });

  // GENERATE RANDOM SKIN + HAIR COLOR
  function randomColorLogin() {
    var skinColors = ['FDA57D', 'efbc97', 'cc8a69', '8c5834', '593225'];
    var hairColors = ['F55F44', 'a07b5d', '72351c', '513420', '231105'];
    var randomColor = Math.floor(Math.random() * 5);

    var skinColor = document.querySelectorAll('main.register-page section .register-illustration svg .skin');
    for (var i = 0; i < skinColor.length; ++i) {
      var item = skinColor[i];  
      item.style.fill=skinColors[randomColor];
      // console.log('Huidskleur: #' + skinColors[randomColor]);
    }

    var hairColor = document.querySelectorAll('main.register-page section .register-illustration svg .hair');
    for (var i = 0; i < hairColor.length; ++i) {
      var item = hairColor[i];  
      item.style.fill=hairColors[randomColor];
      // console.log('Haarkleur: #' + hairColors[randomColor]);
    }
  }
  randomColorLogin();  
}



// PASSWORD RESET (APPEND MAIL IN OVERLAY) -------------------------
// MOET NOG EERST GECHECKT WORDEN BINNEN DATABASE ENZ....
if (document.querySelector('.login-page #mail') !== null) {
  var mail_input = document.querySelector('.login-page #mail');
  mail_input.addEventListener("keyup", event => {
    var mail_input_value = mail_input.value;
    document.querySelector('.login-page .overlay-content p strong').textContent = mail_input_value;
    console.log(mail_input_value);
  });
}



// UPLOAD -------------------------
if (document.querySelector('.upload-shot') !== null) {
  var loadFile = function(event) {
    // PREVIEW IMAGE
    // https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
    // https://stackoverflow.com/questions/43708127/javascript-get-the-filename-and-extension-from-input-type-file/43708268
    var uploadFile = event.target.files;
    var uploadPreview = document.querySelector('#upload-preview');
    var uploadPreviewSwap = document.querySelector('.upload-file-swap');

    uploadPreview.src = URL.createObjectURL(uploadFile[0]);
    var uploadFileName = uploadFile[0].name;
    console.log("Bestand geüpload: " + uploadFileName);
    var uploadPreviewLabel = document.querySelector('#upload-file-name');
    uploadPreviewLabel.innerHTML = "Je gekozen bestand: <strong>" + uploadFileName + "</strong>";
    uploadPreview.alt = "Bestand geüpload: " + uploadFileName;
    uploadPreview.style.display = "block";
    uploadPreviewSwap.style.opacity = "1";
    uploadPreviewSwap.style.visibility = "visible";
    uploadPreview.onload = function() {
      URL.revokeObjectURL(uploadPreview.src) // CLEAR MEMORY
    }

    // UPLOAD PROGRESS INDICATOR
    // https://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    function _(el) {
      return document.getElementById(el);
    }
    
    _("progress-bar").setAttribute('upload-status', '');
    setTimeout(function() {
      _("progress-bar").classList.add("visible");
    }, 100);

    setTimeout(function() {
      var file = _("upload-file").files[0];
      // alert(file.name+" | "+file.size+" | "+file.type);
      var formdata = new FormData();
      formdata.append("upload_file", file);
      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener("progress", progressHandler, false);
      ajax.addEventListener("load", completeHandler, false);
      ajax.addEventListener("error", errorHandler, false);
      ajax.addEventListener("abort", abortHandler, false);
      ajax.open("POST", "proces-upload");
      ajax.send(formdata);
      
      // MAX FILE SIZE CHECK
      if(file.size > 2000000){
        alert("Dit bestand is groter dan 2mb. Oege staat helaas niet meer toe..");
        _("progress-bar").classList.remove("visible");
        _("progress-bar").classList.add("failed");
        document.querySelector(".uploaden").disabled = true;
        setTimeout(function() {
          _("progress-bar").classList.remove("failed");
        }, 150);
      } else {
        document.querySelector(".uploaden").disabled = false;
      }

      function progressHandler(event) {
        _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progress-bar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
      }

      function completeHandler(event) {
        // _("status").innerHTML = event.target.responseText;
        // _("progress-bar").value = 0; //wil clear progress bar after successful upload
        _("progress-bar").classList.add("completed");
        _("progress-bar").setAttribute('upload-status', 'Je bestand ' + uploadFileName + ' is geüpload!');
        setTimeout(function() {
          _("progress-bar").classList.remove("visible");
        }, 4500);
      }
      
      function errorHandler(event) {
        // _("status").innerHTML = "Upload Failed";
        _("progress-bar").classList.add("failed");
        _("progress-bar").setAttribute('upload-status', 'De upload ging niet helemaal goed.. Je bestand is te groot!');
        setTimeout(function() {
          _("progress-bar").classList.remove("visible");
        }, 4500);
      }
      
      function abortHandler(event) {
        // _("status").innerHTML = "Upload Aborted";
        _("progress-bar").setAttribute('upload-status', 'De upload ging niet helemaal goed.. Je bestand is te groot!');
        _("progress-bar").classList.add("failed");
        setTimeout(function() {
          _("progress-bar").classList.remove("visible");
        }, 4500);
      }
    }, 500);

    

    // ON CHANGE FILE - RESET PROGRESS BAR
    document.querySelector('.upload-file-swap').onclick = function() {
      document.querySelector('#progress-bar').classList.remove('visible', 'completed');
    };
  };

  // MAX FILE SIZE PROMPT
  // var uploadField = document.getElementById("upload-file");
  // uploadField.onchange = function() {
  //   if(this.files[0].size > 2000000){
  //     console.log("Dit bestand is groter dan 2mb. Oege staat helaas niet meer toe..");
  //     this.value = "";
  //   };
  // };

  // OTHER STUDENTS SLIDER
  var toggleStudents = document.querySelector('.toggle-other-students input');
  toggleStudents.onclick = function() {

    if (toggleStudents.checked == true){
      document.querySelector('#upload-other-students').classList.add('visible');
      document.querySelector('.toggle-slider-text').textContent = 'Wie dan allemaal?';
      document.querySelector('#upload-other-students').focus();
    } else {
      document.querySelector('#upload-other-students').classList.remove('visible');
      document.querySelector('.toggle-slider-text').textContent = 'Zijn er anderen bij betrokken?';
    }
  }
}



// OVERVIEW -------------------------
if (document.querySelector('.overview-shots .overview-shots-content') !== null) {  
  // CLOSE UPLOAD (SHOT) OVERLAY ON CLICK
  document.querySelector('main section.overview-shots .overview-shots-overlay-background').onclick = function() {
    document.querySelector('main section.overview-shots .overview-shots-overlay').classList.remove('visible');
    document.querySelector('body').classList.remove('no-scroll');
    setTimeout(function() {
      document.querySelector('main section.overview-shots .overview-shots-overlay').scrollTop = 0;
    }, 450);
  };
  
  // CLOSE UPLOAD (SHOT) OVERLAY ON ESCAPE KEY
  document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
      document.querySelector('main section.overview-shots .overview-shots-overlay').classList.remove('visible');
      document.querySelector('body').classList.remove('no-scroll');
      setTimeout(function() {
        document.querySelector('main section.overview-shots .overview-shots-overlay').scrollTop = 0;
      }, 450);
    }
  };  

  // SWITCH OVERVIEW LAYOUT ON CLICK
  document.querySelector('main section.overview-shots .overview-shots-navigation button').onclick = function() {
    this.classList.toggle('three-inline');
    document.querySelector('main section.overview-shots .overview-shots-content').classList.toggle('three-inline');
  };
  
  // SUBMIT FORM ON CLICK CATEGORY ITEM
  $('main section.overview-featured .overview-featured-nav form input[type="radio"]').on('change', function() {
    $(this).parents('form').submit();
  });

  // ADD CLASS WHEN CATEGORY IS SELECTED
  var categoryItems = document.querySelectorAll('main section.overview-featured .overview-featured-nav form label');
  for (var i = 0; i < categoryItems.length; i++) {
    categoryItems[i].onclick = function() {
      this.classList.add('active');
        // https://stackoverflow.com/questions/10383875/how-to-select-element-which-is-not-this
        $('main section.overview-featured .overview-featured-nav form label.active').not(this).removeClass('active');
    };
  }







// // ADD CLASS (SELECTED) WHEN SELECTING TRAIN
// // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_active_element
// var scheduleItems = document.querySelectorAll('.schedule-item');
// var ScheduleButtons = document.querySelector('.schedule-buttons');
// var toTrackButton = document.querySelector('.schedule-buttons button');

// for (var i = 0; i < scheduleItems.length; i++) {
//   scheduleItems[i].addEventListener('click', function() {
//     var selectedItem = document.querySelectorAll('.schedule-item.selected');
//     selectedItem[0].className = selectedItem[0].className.replace(' selected', '');
//     this.className += ' selected';

//     // SHOW BUTTON WHEN ITEM IS SELECTED
//     if (this.classList.contains('selected')) {
//       ScheduleButtons.classList.add('visible');
//       var selectedTrainTrack = this.getAttribute('data-track'); // https://stackoverflow.com/questions/33760520/get-data-attributes-in-javascript-code
//       toTrackButton.textContent = 'Naar perron ' + selectedTrainTrack;
//       toTrackButton.setAttribute('data-track', selectedTrainTrack);
//     }
//   });
// }


  // // GET VALUE AFTER # (UPLOAD-ID)
  // // https://stackoverflow.com/questions/573145/get-everything-after-the-dash-in-a-string-in-javascript
  // document.querySelector(".shot-' . $upload_id . '").onclick = function() {
  //   setTimeout(function() {
  //     var currentURL = window.location.href;
  //     var shotURL = currentURL.split("#").pop();
  //     console.log(shotURL);
  //   }, 100);
  // };
}








// if (document.querySelector('main section.overview-shots .overview-shots-content-item .shot-info .shot-actions li') !== null) {
//   // SHOT PIN BUTTON TOGGLE
//   var shotPinButton = document.querySelector('main section.overview-shots .overview-shots-content-item .shot-info .shot-actions li.shot-pin');
//   shotPinButton.onclick = function() {
//     if (this.classList.contains('active')) {
//       this.classList.remove('active');
//     } else {this.classList.add('active');}
//   };
//   // SHOT HEART BUTTON TOGGLE
//   var shotHeartButton = document.querySelector('main section.overview-shots .overview-shots-content-item .shot-info .shot-actions li.shot-heart');
//   shotHeartButton.onclick = function() {
//     if (this.classList.contains('active')) {
//       this.classList.remove('active');
//     } else {this.classList.add('active');}
//   };
// }
















