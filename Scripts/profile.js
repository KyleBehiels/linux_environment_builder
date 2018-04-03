/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(()=>{
   $('#login_btn').click(()=>{
       $('#login_form').toggleClass('hidden', false);
       $('#signup_form').toggleClass('hidden', true);
   });
   $('#signup_btn').click(()=>{
       $('#signup_form').toggleClass('hidden', false);
       $('#login_form').toggleClass('hidden', true);
   });
});

function show_new_env_form(){
  $('#new_env_form').toggleClass('hidden');
}

function submit_package_form(){
  $('#package_form')[0].submit();
}
