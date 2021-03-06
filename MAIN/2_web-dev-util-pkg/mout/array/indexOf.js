"use strict";
exports.__esModule = true;
/**
 * Array.indexOf
 */
function indexOf(arr, item, fromIndex) {
    if (fromIndex === void 0) { fromIndex = 0; }
    if (arr == null) {
        return -1;
    }
    var len = arr.length;
    var i = fromIndex < 0 ? len + fromIndex : fromIndex;
    while (i < len) {
        // we iterate over sparse items since there is no way to make it
        // work properly on IE 7-8. see #64
        if (arr[i] === item) {
            return i;
        }
        i++;
    }
    return -1;
}
exports["default"] = indexOf;
