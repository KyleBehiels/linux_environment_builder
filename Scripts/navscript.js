/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('logout_btn').on('click', ()=>{
    location.reload();
});

function nav_post(value){
    $('#navigation_form_input').attr('value', value);
    $('#navigation_form').submit();
    $('#nav_options').each(()=>{
       $(this).toggleClass("active", false);
    });
    $('#'+value).toggleClass("active", true);
}

