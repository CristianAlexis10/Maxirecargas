var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.two',
 triggerHook: 0.7,
 reverse : true,
 // offset : 10,
})
.setClassToggle('.section--one','zoomIn')
.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.section--two',
 triggerHook: 0.7,
 reverse : true,
 // duration: 300
})
.setClassToggle('.two--text','slideInLeft')

.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.section--two',
 triggerHook: 0.7,
 reverse : true,
 offset : 300
})
.setClassToggle('.two--text2','slideInLeft')

.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene =  new ScrollMagic.Scene({
 triggerElement: '.three--rigth',
 triggerHook: 0.5,
 reverse : true,
 offset : 100
})
.setClassToggle('.imgAnimation','animateImgs')

.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene5 =  new ScrollMagic.Scene({
 triggerElement: '.three--rigth',
 triggerHook: 0.5,
 reverse : true,
 offset : 200
})
.setClassToggle('.imgAnimationServ','animateImgs')

.addTo(controller);
var controller =  new ScrollMagic.Controller();
var ourScene8 =  new ScrollMagic.Scene({
 triggerElement: '.three',
 triggerHook: 0.7,
 reverse : true,
})
.setClassToggle('.threeTitle','slideInLeft')

.addTo(controller);
var controller =  new ScrollMagic.Controller();
var ourScene9 =  new ScrollMagic.Scene({
 triggerElement: '.three',
 triggerHook: 0.7,
 reverse : true,
 offset : 200
})
.setClassToggle('.threeItem','slideInLeft')

.addTo(controller);

var controller =  new ScrollMagic.Controller();
var ourScene6 =  new ScrollMagic.Scene({
 triggerElement: '.mediafour',
 triggerHook: 0.7,
 reverse : true,
 offset : 50
})
.setClassToggle('.title','slideInLeft')

.addTo(controller);
var controller =  new ScrollMagic.Controller();
var ourScene7 =  new ScrollMagic.Scene({
 triggerElement: '.mediafour',
 triggerHook: 0.7,
 reverse : true,
 offset : 100
})
.setClassToggle('.img--ambiente','hambiente')

.addTo(controller);
var controller =  new ScrollMagic.Controller();
var ourScene7 =  new ScrollMagic.Scene({
 triggerElement: '.four--contact',
 triggerHook: 0.7,
 reverse : true,
 offset : 50
})
.setClassToggle('.four--contact','slideInLeft')

.addTo(controller);
