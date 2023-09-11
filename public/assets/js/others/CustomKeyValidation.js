function isAlpha(e){
    var keyCode = (e.which) ? e.which : e.keyCode
    if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
        return false;

    return true;
}

function isNum(e){
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
}

function isNumDot(e){
    var charCode = (e.which) ? e.which : e.keyCode;
    if(charCode==46){
        var txt = e.target.value;
        if ((txt.indexOf(".") > -1) || txt.length==0) {
            return false;
        }
    }else{
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    }
}

function isNumComma(key) {
            var keycode = (key.which) ? key.which : key.keyCode;
            if (keycode == 32 || keycode == 44) {
                return true;
            } else if (!(keycode == 8 || keycode == 45) && (keycode < 48 || keycode > 57)) {
                return false;
            }else {
                var parts = key.srcElement.value.split('.');
                if (parts.length > 1 && keycode == 46)
                    return false;
                return true;
            }
}

function isAlphaNum(e){
    var keyCode = (e.which) ? e.which : e.keyCode
    if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32 && (e.which < 48 || e.which > 57))
        return false;
}

function isAlphaNumCommaSlash(e){
    var keyCode = (e.which) ? e.which : e.keyCode
    if (e.which != 44 && e.which != 47 && e.which != 92 && (keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32 && (e.which < 48 || e.which > 57))
        return false;
}

function isDateFormatYYYMMDD(value){
    var regex = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))+$/;
    if (!regex.test(value) ) {
        return false;
    }else{
        return true;
    }
}
function isAlphaCheck(val){
    var alpha = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
    if (!val.match(alpha)) return false;
    return true;
}
function isNumCheck(val){
    var numbers = /^[-+]?[0-9]+$/;
    if (!val.match(numbers)) return false;
    return true;
}
function isAlphaNumCheck(val){
    var regex = /^[a-z0-9]+$/i;
    if (!val.match(regex)) return false;
    return true;
}
function isAlphaNumCommaSlashCheck(val){
    var regex = /^[a-z\d\\/,\s]+$/i;
    if (!val.match(regex)) return false;
    return true;
}
function isNumDotCheck(val){
    var regex = /^[1-9]\d*(((,\d{3}){1})?(\.\d{1,8})?)$/;
    if (!val.match(regex)) return false;
    return true;
}
function isDateFormatYYYMMDDCheck(val){
    var regex = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))+$/;
    if (!regex.test(val) ) {
        return false;
    }else{
        return true;
    }
}
function isDateFormatYYYMMCheck(val){
    var regex = /^\d{4}-\d{2}$/;
    if (!regex.test(val) ) {
        return false;
    }else{
        var YYMM = val.split("-");
        if(YYMM[0]>2020) {
            return false
        } else if(YYMM[1]>12) {
            return false
        }
        return true;
    }
}