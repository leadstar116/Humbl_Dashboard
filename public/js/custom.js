/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function readURL(input, target) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      console.log(e.target.result);
      $('.' + target).attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#avatarFile").change(function () {
  readURL(this, 'img_profile');
});
$("#backgroundFile").change(function () {
  readURL(this, 'img_profile_back');
});
$('#checkbox_agree').click(function () {
  if (this.checked) {
    $('.register-btn').prop('disabled', false);
  } else {
    $('.register-btn').prop('disabled', true);
  }
});
$('.btn-add-department').click(function () {
  $('.department-list').append("<li><input type=\"text\" name=\"department[]\" placeholder=\"Department\" required><a class=\"btn-remove-department\"><i aria-hidden=\"true\" class=\"fa fa-trash\"></i></a></li>");
});
$(document).on('click', '.btn-remove-department', function () {
  $(this).closest('li').remove();
});
$('.profile-reset-btn').click(function () {
  $('.profile-complete input').val('');
  $('.profile-complete textarea').val('');
  $('.profile-complete .department-list').empty();
});
$('.btn-add-staff').click(function () {
  var optionValues = '';
  $('.department-select:first option').each(function () {
    if ($(this).val() == '') {
      optionValues += "<option value=\"\" disabled selected>Department</option>";
    } else {
      optionValues += "<option value='" + $(this).val() + "'>" + $(this).text() + "</option>";
    }
  });
  $('.staff-body').append("<div class=\"form-group row\">\n        <div class=\"col-md-3\">\n            <input type=\"text\" placeholder=\"First Name\" name=\"first_name[]\" required>\n        </div>\n        <div class=\"col-md-3\">\n            <input type=\"text\" placeholder=\"Last Name\" name=\"last_name[]\" required>\n        </div>\n        <div class=\"col-md-3\">\n            <input type=\"text\" placeholder=\"name@example.com\" name=\"email[]\" required>\n        </div>\n        <div class=\"col-md-3\">\n            <select name=\"department[]\" class=\"department-select\" required>" + optionValues + "\n            </select>\n            <a class=\"btn-remove-staff\"><i aria-hidden=\"true\" class=\"fa fa-trash\"></i></a>\n        </div>\n    </div>\n    ");
});
$(document).on('click', '.btn-remove-staff', function () {
  if ($('.staff-body div.form-group').length > 1) {
    $(this).closest('div.form-group').remove();
  }
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/Work/Workspace/Mitchell/Mark/Dashboard/resources/js/custom.js */"./resources/js/custom.js");


/***/ })

/******/ });