(function(){
  var navbar=document.getElementById('navbar');
  var menu=document.getElementById('mobileMenuBtn');
  var links=document.getElementById('neoLinks');
  if(navbar){
    var onScroll=function(){navbar.classList.toggle('scrolled',window.scrollY>15)};
    window.addEventListener('scroll',onScroll,{passive:true});onScroll();
  }
  if(menu&&links){
    menu.addEventListener('click',function(){
      var opened=links.classList.toggle('open');
      menu.setAttribute('aria-expanded',String(opened));
      menu.textContent=opened?'\u2715':'\u2630';
    });
    links.querySelectorAll('a').forEach(function(a){
      a.addEventListener('click',function(){
        links.classList.remove('open');
        menu.setAttribute('aria-expanded','false');
        menu.textContent='\u2630';
      });
    });
  }
})();
