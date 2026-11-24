(function(){
 const navbar=document.getElementById('navbar');
 const menu=document.getElementById('mobileMenuBtn');
 const links=document.getElementById('neoLinks');
 const slides=[...document.querySelectorAll('.neo-hero-slide')];
 const dots=[...document.querySelectorAll('#neoSliderDots button')];
 let active=0, timer=null;
 function showSlide(index){if(!slides.length)return;active=(index+slides.length)%slides.length;slides.forEach((s,i)=>s.classList.toggle('active',i===active));dots.forEach((d,i)=>d.classList.toggle('active',i===active));}
 function startSlider(){if(slides.length<2)return;clearInterval(timer);timer=setInterval(()=>showSlide(active+1),6500)}
 dots.forEach((dot)=>dot.addEventListener('click',()=>{showSlide(Number(dot.dataset.slide));startSlider()}));startSlider();
 window.addEventListener('scroll',()=>navbar.classList.toggle('scrolled',window.scrollY>15),{passive:true});
 if(menu&&links){menu.addEventListener('click',()=>{const opened=links.classList.toggle('open');menu.setAttribute('aria-expanded',String(opened));menu.textContent=opened?'✕':'☰'});links.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{links.classList.remove('open');menu.setAttribute('aria-expanded','false');menu.textContent='☰'}));}
 const revealObserver=('IntersectionObserver' in window)?new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-visible');revealObserver.unobserve(entry.target)}}),{threshold:.12}):null;
 document.querySelectorAll('.neo-reveal').forEach(el=>{if(revealObserver)revealObserver.observe(el);else el.classList.add('is-visible')});
 // Restrained 3D tilt for desktop pointers; disabled on touch devices.
 if(matchMedia('(hover:hover) and (pointer:fine)').matches){document.querySelectorAll('.neo-category,.neo-product').forEach(card=>{card.addEventListener('mousemove',e=>{const r=card.getBoundingClientRect(),x=(e.clientX-r.left)/r.width-.5,y=(e.clientY-r.top)/r.height-.5;card.style.transform=`translateY(-8px) rotateX(${(-y*5).toFixed(2)}deg) rotateY(${(x*5).toFixed(2)}deg)`});card.addEventListener('mouseleave',()=>{card.style.transform=''})})}
 // Let the existing language switcher continue to control .lang-ar/.lang-en.
})();
