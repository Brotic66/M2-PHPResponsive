Element.implement({
shake : function(radius,duration){
radius = radius || 3;
duration = duration || 500;
duration = (duration/50).toInt() - 1;
var parent = this.getParent();
if(parent != $(document.body) && parent.getStyle('position')=='static'){
parent.setStyle('position','relative');
}
var position = this.getStyle('position');
if(position=='static'){
this.setStyle('position','relative');
position = 'relative';
}
if(Browser.Engine.trident){
parent.setStyle('height',parent.getStyle('height'));
}
var coords = this.getPosition(parent);
if(position == 'relative' && !Browser.Engine.presto){
coords.x -= parent.getStyle('paddingLeft').toInt();
coords.y -= parent.getStyle('paddingTop').toInt();
}
var morph = this.retrieve('morph');
if (morph){
morph.cancel();
var oldOptions = morph.options;
}
var morph = this.get('morph',{
duration:50,
link:'chain'
});
for(var i=0 ; i < duration ; i++){
morph.start({
top:coords.y+$random(-radius,radius),
left:coords.x+$random(-radius,radius)
});
}
morph.start({
top:coords.y,
left:coords.x
}).chain(function(){
if(oldOptions){
this.set('morph',oldOptions);
}
}.bind(this));
return this;
}
});