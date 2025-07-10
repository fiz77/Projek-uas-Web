let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};


setTimeout(() => {
   document.querySelectorAll('.message.auto-hide').forEach(msg => {
      msg.style.opacity = '0';
      setTimeout(() => msg.remove(), 500);
   });
}, 2000);


document.querySelector('#close-edit').onclick = () =>{
   document.querySelector('.edit-form-container').style.display = 'none';
   window.location.href = '/ketjeh/admin/index.php';
};



