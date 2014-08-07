/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//document.ready(function() {
if (localStorage.getItem('minifymenu') == '1') {

    var c = document.getElementsByTagName("body")[0];
    c.className += ' minified' ;
}


jQuery(document).ready(function() {

    jQuery('.minifyme').click(function() {
        if (localStorage.getItem('minifymenu') == '1') {

            localStorage.setItem('minifymenu', '0');
        } else {
            localStorage.setItem('minifymenu', '1');
        }

    });

});