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